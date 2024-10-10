<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loadLoginPage()
    {
        return view("login");
    }

    public function doLogin( Request $request )
    {
        // validate the input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        // do the password check
        if ( auth()->attempt($validatedData) ) {
            // regenerate session tokens
            $request->session()->regenerate();
            return redirect("/");
        } else {
            return back()->withErrors([
                'email'=> "email or password provided is not correct, please try again"
            ]);
        }
    }
}
