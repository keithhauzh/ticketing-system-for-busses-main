<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "user_id", "ticket_id" ];

    // function to grab all the ticket related to the user
    public function user()
    {
        // this is to indicate that a ticket is belong to a user
        return $this->belongsTo(User::class);
    }

    public function receipts()
    {
        //this is to indicate that a receipt belongs to a user
        return $this->belongsTo(Receipt::class);
    }
}
