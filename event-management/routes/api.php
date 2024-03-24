<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('events', EventController::class)->middleware('auth');
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped(['attendees' => 'event'])->except(['update'])->middleware('auth');
