<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Storage;


class EmployerController extends Controller
{
    public function index(Employer $employer)
    {
        return view('results', ['jobs' => $employer->jobs()->with(['employer', 'tags'])->paginate(12)]);
    }

    public function edit(Employer $employer)
    {
        if (!session()->has('referral_url')) {
            session()->put('referral_url', url()->previous());
        }

        return view('auth.edit', ['employer' => $employer]);
    }

    public function update(Request $request, Employer $employer)
    {

        $validationArray = [
            'name' => 'required',
            'email' => 'required|email|max:254|unique:users,email,' . $employer->user->id,
            'employer' => 'required|min:5',
        ];

        switch (true) {
            case (request()->password || request()->password_confirmation):
                $validationArray['password'] = ['required', 'confirmed', Password::defaults()];

            case (request()->logo):
                $validationArray['logo'] = ['required', 'mimes:png,jpg,webp,svg', 'dimensions:min_width=100,min_height=100', 'max:2048'];
        }

        $validatedUser = request()->validate($validationArray);

        switch (true) {
            case (request()->logo):
                $logoPath = request()->logo->store('logos');
                Storage::delete(['file', 'logos/' . $employer->logo]);

                $employerFields['logo'] = basename($logoPath);

            case (request()->password):
                $userFields['password'] = request()->password;
        }

        $userFields = [
            'name' => request()->name,
            'email' => request()->email,
        ];

        $employerFields['name'] = request()->employer;

        $employer->update($employerFields);
        $employer->user->update($userFields);

        $referralUrl = session()->get('referral_url');
        session()->forget('referral_url');

        return redirect($referralUrl)->with('success', 'Update successful!');
    }
}
