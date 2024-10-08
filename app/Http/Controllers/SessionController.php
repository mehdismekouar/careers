<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
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

        logger('remember: '.$request->remember);

        if (! Auth::attempt($validated, (bool) $request->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Credentials mismatch',
                'password' => 'Credentials mismatch',
            ]);
        }

        request()->session()->regenerate(true);

        return redirect()->intended('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
