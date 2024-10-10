<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function loadSignUpPage()
    {
        return view('signup');
    }

    public function doSignUp(Request $request)
    {
        // 2. retrieve from the form
        // retrieve the value from the email field.
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $confirm_password = $request->input('confirm_password');

        /* 
            3. check error 
            - all fields are required
            - password same
            - password is at least 8 characters
            - email is not reuse
        */
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        // 4. create user account
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']) // hash the password
        ]);

        // 5. login the user
        auth()->login( $user );

        // 6. redirect
        return redirect("/");
    }
}
