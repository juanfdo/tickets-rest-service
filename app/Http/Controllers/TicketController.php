<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ticket::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'tic_event_name' => 'required|unique:tbl_tickets|max:255',
            'tic_quantity' => 'required|min:1',
        ]);

        $ticket = Ticket::create($validated);

        return $ticket;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return $ticket;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        return Response()->json( [], 405 ); //405 Method Not Allowed
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        return Response()->json( [], 405 ); //405 Method Not Allowed
    }

    /**
     * Available quantity of the specified resource in storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function available(Ticket $ticket)
    {
        return Response()
            ->json([
                'id' => $ticket->id,
                'available_quantity' => ($ticket->available_quantity())
            ]);
    }


    /**
     * Sells the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function sells(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'txb_buyer_id' => 'required|exists:tbl_buyers,id',
            'txb_quantity' => 
                "required|integer|min:1|max:{$ticket->available_quantity()}"
        ]);

        if(!$ticket->sell($validated['txb_quantity'])){
            return response()->json([
                "message" => "Tickets could not be sold.",
                "errors" => array([
                  "tic_sell" => [
                    "Ticket could not be updated, try again."
                  ]
                ])
            ]);
        }

        return Response()->json( [], 405 ); //405 Method Not Allowed
    }
}