<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeTypeController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['tittle' => 'Hello World!']);
});
Route::get('/bike-types', [BikeTypeController::class, 'index'])->name('bike_type.index');
Route::get('/bike-types/{bikeType}', [BikeTypeController::class, 'show'])->name('bike_type.show');
Route::get('/bikes', [BikeController::class, 'index'])->name('bike.index');
Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bike.show');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/rentals', [RentalController::class, 'index'])->name('rental.index');
Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rental.show');
