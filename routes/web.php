<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/register', function () {
    if (Auth::check()) {
        return "You are already logged in.";
    }

    return view('register');
});

Route::post('/register', [UserController::class, 'register']);