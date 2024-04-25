<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/images');
});

Route::get('/upload', function () {
    return view('upload');
})->middleware('auth.basic');

Route::post('/upload', [ImageController::class, 'store'])->middleware('auth.basic');

Route::get('/images', [ImageController::class, 'index']);

Route::get('/image/{id}', [ImageController::class, 'get']);
Route::post('/image/{id}', [ImageController::class, 'postComment'])->middleware('auth.basic');
Route::post('/image/{id}/addtogroup', [ImageController::class, 'addToGroup'])->middleware('auth.basic');

Route::get('/groups', [GroupController::class, 'index']);

Route::get('group/{id}', [GroupController::class, 'get']);

Route::get('/addgroup', function () {
    return view('addgroup');
})->middleware('auth.basic');

Route::post('/addgroup', [GroupController::class, 'store'])->middleware('auth.basic');

Route::get('/register', function () {
    if (Auth::check()) {
        return "You are already logged in.";
    }

    return view('register');
});

Route::post('/register', [UserController::class, 'register']);