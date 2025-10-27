<?php


use App\Http\Controllers\BikeApiController;
use App\Http\Controllers\BikeTypeApiController;
use App\Http\Controllers\RentalApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('bikes', BikeApiController::class);
Route::apiResource('bike-types', BikeTypeApiController::class);
Route::apiResource('rentals', RentalApiController::class);
Route::apiResource('users', UserApiController::class);
