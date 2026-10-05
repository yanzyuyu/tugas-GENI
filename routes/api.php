<?php

use App\Http\Controllers\KomputerController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello Dunyo!!']);
});

Route::apiResource('komputers', KomputerController::class);