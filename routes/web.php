<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReviewController;


// Home
Route::get('/', [ HomeController::class, 'loadHomePage' ]);


// SignUp Page
Route::get('/signup', [ SignUpController::class, 'loadSignUpPage' ]);

// SignUp Logic
Route::post('/signup', [ SignUpController::class, 'doSignUp' ]);


// Login Page
Route::get('/login', [ LoginController::class, 'loadloginPage' ]);

// Login Logic
Route::post('/login', [ LoginController::class, 'dologin' ]);

// Logout
Route::get('/logout', [ LogoutController::class, 'logout' ]);



// Ticket routes
/*
- GET `/tickets` (index)
- GET `/tickets/create` (create)
- POST `/tickets` (store)
- GET `/tickets/{ticket}` (show)
- GET `/tickets/{ticket}/edit` (edit)
- PUT/PATCH `/tickets/{ticket}` (update)
- DELETE `/tickets/{ticket}` (destroy)
*/
Route::resource("tickets", TicketController::class);


// User routes
/*
- GET `/users` (index)
- GET `/users/{user}/edit` (edit)
- PUT/PATCH `/users/{user}` (update)
- DELETE `/users/{user}` (destroy)
*/
Route::resource("users", UserController::class);


// Receipt routes
/*
- GET `/receipts` (index)
- POST `/receipts` (store)
- DELETE `/receipts/{receipt}` (destroy)
*/
Route::resource("receipts", ReceiptController::class);


// Review routes
/*
- GET `/reviews` (index)
- POST `/reviews` (store)
- GET `/reviews/{review}` (show)
- GET `/reviews/{review}/edit` (edit)
- PUT/PATCH `/reviews/{review}` (update)
- DELETE `/reviews/{review}` (destroy)
*/
Route::resource("reviews", ReviewController::class);


















