<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // logout the user
        auth()->logout();

        // invalidate existing & regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect back to home page
        return redirect('/');
    }
}
