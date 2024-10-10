<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loadHomePage() 
    {
        // check if user is logged in or not
        if ( auth()->check() ) {
            $name = auth()->user()->name;
        } else {
            $name = 'Guest';
        }
        
        return view("home" , [ 'name' => $name ]);
    }
}
