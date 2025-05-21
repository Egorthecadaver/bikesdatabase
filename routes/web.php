<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeTypeController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['tittle' => 'Hello World!']);
});
Route::get('/bike-types', [BikeTypeController::class, 'index'])->name('bike_type.index');
Route::get('/bike-types/{bikeType}', [BikeTypeController::class, 'show'])->name('bike_type.show');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/rentals', [RentalController::class, 'index'])->name('rental.index');
Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rental.show');
Route::resource('bikes', BikeController::class);
Route::get('/bikes', [BikeController::class, 'index'])->name('bikes.index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/bikes/create', [BikeController::class, 'create'])->middleware('auth')->name('bikes.create');
Route::get('/bikes/destroy/{id}', [BikeController::class, 'destroy'])->middleware('auth');
Route::post('/bikes/update/{id}', [BikeController::class, 'update'])->middleware('auth');
Route::get('/bikes/edit/{id}', [BikeController::class, 'edit'])->middleware('auth');
Route::resource('bikes', BikeController::class)->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/error', function () {return view('error');})->name('error');
Route::get('/error', function () {return view('error', ['message' => session('message')]);});
Route::get('/bikes', [BikeController::class, 'index'])->name('bikes.index');
Route::resource('bikes', BikeController::class);
Route::resource('users', UserController::class)->middleware('auth');
Route::get('/', function () {return view('welcome');})->name('home');
Route::resource('bike_type', BikeTypeController::class)->except(['show']);
Route::get('bike_type/{id}', [BikeTypeController::class, 'show'])->name('bike_type.show');
