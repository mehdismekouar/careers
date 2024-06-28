<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        if (!session()->has('referral_url')) {
            session()->put('referral_url', url()->previous('/'));
        }

        return view('auth.edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $validationArray = [
            'name' => 'required',
            'email' => 'required|email|max:254|unique:users,email,' . $user->id,
        ];

        if (!empty($request->password) || !empty($request->password_confirmation)) {
            $validationArray['password'] = ['required', 'confirmed', Password::defaults()];
        }

        $validatedUser = $request->validate($validationArray);

        $userFields = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $userFields['password'] = $request->password;
        }

        $user->update($userFields);

        $referralUrl = session()->get('referral_url');
        session()->forget('referral_url');

        return redirect($referralUrl)->with('success', 'Account updated successfully');
        ;
    }
}
