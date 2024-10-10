<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = auth()
                    ->user()
                    ->receipts()
                    ->join('tickets', 'receipts.ticket_id', '=', 'tickets.id')
                    ->join('users', 'receipts.user_id', '=', 'users.id')
                    ->select(
                        'tickets.title', 'tickets.traveltime', 'tickets.destination', 'tickets.price',
                        'receipts.*'
                        )
                    ->latest()
                    ->get();

        return view("receipts.index", [ "receipts" => $receipts ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_id' => 'required'
        ]);

        // var_dump($validatedData);

        $receipts = auth()->user()->receipts()->create($validatedData);

        return redirect("/receipts");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $receipt = Receipt::findOrFail($id);
       return view("receipts.show", [ 'receipt' => $receipt ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // load the receipt by id
        $receipt = Receipt::findOrFail($id);

        //delete receipt
        $receipt->delete();
        return redirect("/receipts");
    }
}
