<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;



class BikeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perpage', 2);
        $bikes = Bike::with('type')->paginate($perPage);

        return view('bikes.index', [
            'bikes' => $bikes->appends($request->except('page'))
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = BikeType::all();
        return view('bikes.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'bike_type_id' => 'required|exists:bike_types,id',
            'price_per_hour' => 'required|numeric|min:0',
            'is_available' => 'boolean'
        ]);

        Bike::create($validated);
        return redirect()->route('bikes.index')->with('success', 'Велосипед добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {

        $bike->load('rentedByUsers');
        return view('bikes.show', compact('bike'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        $types = BikeType::all();
        return view('bikes.edit', compact('bike', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
    {$validated = $request->validate([
        'model' => 'required|string|max:255',
        'bike_type_id' => 'required|exists:bike_types,id',
        'price_per_hour' => 'required|numeric|min:0',
        'is_available' => 'required|boolean'
    ]);

        $bike->update($validated);
        return redirect()->route('bikes.index')->with('success', 'Данные обновлены!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        if (Gate::none(['delete-500-bike', 'delete-available-bike'], $bike)) {
            //return  redirect('/error')->with('message',
              //  'У вас нет прав на удаление ');
            return back()->with('error', 'У вас нет прав на удаление');
        }

        $bike->delete();
        return redirect()->route('bikes.index');



    }

}
