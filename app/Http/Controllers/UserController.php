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
        return view('auth.edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $validationArray = [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|max:70|unique:users,email,'.$user->id,
        ];

        if (! empty($request->password) || ! empty($request->password_confirmation)) {
            $validationArray['password'] = ['required', 'confirmed', Password::defaults()];
        }

        $validatedUser = $request->validate($validationArray);

        $userFields = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (! empty($request->password)) {
            $userFields['password'] = $request->password;
        }

        $user->update($userFields);

        return redirect(url()->previous())->with('success', 'Account updated successfully');

    }
}
