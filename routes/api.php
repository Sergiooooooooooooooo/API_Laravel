<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/events', [App\Http\Controllers\EventController::class, 'index']);
// Route::get('/events/{event}', [App\Http\Controllers\EventController::class, 'show']);
// Route::post('/events', [App\Http\Controllers\EventController::class, 'store']);
// Route::put('/events/{event}', [App\Http\Controllers\EventController::class, 'update']);
// Route::delete('/events/{event}', [App\Http\Controllers\EventController::class, 'destroy']);

Route::apiResource('/events', EventController::class)->middleware('auth:sanctum');
Route::apiResource('/venues', VenueController::class)->middleware('auth:sanctum');
Route::post('/login', [LoginController::class, 'login']);