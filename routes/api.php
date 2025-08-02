<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('address')->group(function () {
    Route::get('/provinces', [AddressController::class, 'provinces']);
    Route::get('/provinces/{province}/districts', [AddressController::class, 'districts']);
    Route::get('/districts/{district}/tombons', [AddressController::class, 'tombons']);
    Route::get('/tombons/{tombon}', [AddressController::class, 'tombon']);
});
