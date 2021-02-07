<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Requests\BookCreateRequest;
use Dotenv\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $booking_list = Booking::all();
        
        return view("index", compact("booking_list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {   

        $validated = $request->validated();
        // dd($validated);
        $book = new Booking();
        $book->guest_full_name = $validated["guest_full_name"];
        $book->room = $validated["room"];
        $book->guest_credit_card = $validated["guest_credit_card"];
        $book->from_date = $request->input("from_date");
        $book->to_date = $request->input("to_date");
        $book->more_details = $request->input("more_details");

        $book->save();

        $newBook = Booking::orderBy("id", "desc")->first();
        return redirect()->route("booking.show", $newBook);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Booking::find($id);
        return view("reservation_details", compact("detail"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = Booking::find($id);
        $details["from_date"] = strtotime($details["from_date"]);
        $details["from_date"] = date('Y-m-d', $details["from_date"]);
        $details["to_date"] = strtotime($details["to_date"]);
        $details["to_date"] = date('Y-m-d', $details["to_date"]);
        
        
        return view("edit",compact("details"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookCreateRequest $request, $id)
    {
        $validated = $request->validated();
        
        $book = Booking::find($id);
        $book->guest_full_name = $validated["guest_full_name"];
        $book->room = $validated["room"];
        $book->guest_credit_card = $validated["guest_credit_card"];
        $book->from_date = $request->input("from_date");
        $book->to_date = $request->input("to_date");
        $book->more_details = $request->input("more_details");

        $book->save();

        return redirect()->route("booking.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }
}