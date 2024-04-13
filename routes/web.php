<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [ImageController::class, 'store']);

Route::get('/images', [ImageController::class, 'index']);

Route::get('/image/{id}', [ImageController::class, 'get']);