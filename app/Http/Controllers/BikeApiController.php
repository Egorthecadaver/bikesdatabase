<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Bike::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Отладочная информация
        if (!auth()->check()) {
            return response()->json([
                'error' => 'Пользователь не аутентифицирован',
                'debug' => [
                    'user' => auth()->user(),
                    'token' => $request->bearerToken()
                ]
            ], 401);
        }

        // Проверяем админа
        if (!auth()->user()->is_admin) {
            return response()->json([
                'error' => 'Только для администраторов',
                'debug' => [
                    'user_id' => auth()->id(),
                    'is_admin' => auth()->user()->is_admin
                ]
            ], 403);
        }

        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'bike_type_id' => 'required|exists:bike_types,id',
            'price_per_hour' => 'required|numeric|min:0',
            'is_available' => 'boolean'
        ]);

        $bike = Bike::create($validated);
        return response()->json($bike, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response((Bike::find($id)));
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
