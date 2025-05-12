<?php

namespace App\Http\Controllers;

use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'bike'])->get();
        return view('rental.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'end_time' => 'required|date|after:start_time'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        return view('rental.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'end_time' => 'required|date|after:start_time'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
