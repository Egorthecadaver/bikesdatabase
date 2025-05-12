<?php

namespace App\Http\Controllers;

use App\Models\BikeType;

class BikeTypeController extends Controller
{

    public function index()
    {
        $bikeTypes = BikeType::with('bikes')->get();
        return view('bike_type.index', compact('bikeTypes'));
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
    public function show(BikeType $bikeType)
    {
        return view('bike_type.show', compact('bikeType'));
    }

    /**
     * Display the specified resource.
     */


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
