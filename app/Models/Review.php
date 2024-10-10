<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "title", "user_id", "content" ];

    // function to grab all the posts related to the user
    public function user()
    {
        // this is to indicate that a post is belong to a user
        return $this->belongsTo(User::class);
    }

}
