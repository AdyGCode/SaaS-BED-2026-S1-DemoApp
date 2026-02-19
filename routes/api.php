<?php

use App\Http\Controllers\Api\V1\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Automatically has /api in the prefix, we now add the /vx after...
// route('api.v1.contacts.hello')
Route::prefix('v1')
    ->as('api.v1.')
    ->group(function () {
        Route::apiResource('contacts', ContactController::class);
    });
