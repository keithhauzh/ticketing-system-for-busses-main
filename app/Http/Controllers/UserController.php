<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Gate;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->latest()->get();
        return view("users.index", [ "users" => $users ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // load the user by id
        $user = User::findOrFail($id);

        Gate::authorize('update',$user);

        $validatedData = $request->validate([
            'role' => 'required'
        ]);

        // pass in validated data to update the user
        $user->update($validatedData);

        return redirect("/users");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $user = User::findOrFail($id);

        Gate::authorize('delete',$user);

        // delete post
        $user->delete();

        return redirect("/users");
    }
}
