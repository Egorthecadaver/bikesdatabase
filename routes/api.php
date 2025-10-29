<?php


use App\Http\Controllers\BikeApiController;
use App\Http\Controllers\BikeTypeApiController;
use App\Http\Controllers\RentalApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::apiResource('bikes', BikeApiController::class);
Route::apiResource('bike-types', BikeTypeApiController::class);
Route::apiResource('rentals', RentalApiController::class);
Route::apiResource('users', UserApiController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/bikes', [BikeApiController::class, 'store']);
Route::middleware('auth:sanctum')->post('/bikes', [BikeApiController::class, 'index']);
Route::middleware('auth:sanctum')->post('/bikes/create', [BikeApiController::class, 'store']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/bikes/create', [BikeApiController::class, 'store']);
    Route::put('/bikes/{id}', [BikeApiController::class, 'update']);
    Route::delete('/bikes/{id}', [BikeApiController::class, 'destroy']);
});
