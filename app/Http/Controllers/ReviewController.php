<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // load the review
        // ->latest() is to order the review by descending order
        $reviews = DB::table('reviews')
                    ->join('users', 'reviews.user_id', 'users.id')
                    ->select('reviews.*' , 'users.name')
                    ->latest()
                    ->get();
                        
        return view("reviews.index", [ "reviews" => $reviews ]);
        // compact('tickets')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("reviews.index");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // create ticket with the current logged in user (user_id) built-in
        $review = auth()->user()->reviews()->create( $validatedData );

        return redirect("/reviews");
    }

    /**
     * (view) Display the specified review.
     */
    public function show(string $id)
    {
        // load the review by id
        $review = Review::findOrFail($id);
        return view("reviews.show", [ 'review' => $review ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $review = Review::findOrFail($id);

        Gate::authorize('delete',$review);

        // delete post
        $review->delete();

        return redirect("/reviews");
    }
}
