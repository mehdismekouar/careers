<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Credentials mismatch',
                'password' => 'Credentials mismatch',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        // dd(Auth::user());
        Auth::logout();

        return redirect('/');
    }
}
