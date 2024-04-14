<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        $details = $request->validate([
            "email" => "required|unique:users",
            "name" => "required|unique:users",
            "password" => "required"
        ]);

        $hashedPassword = Hash::make($details['password']);

        $user = new User;
        $user->email = $details['email'];
        $user->name = $details['name'];
        $user->password = $hashedPassword;

        $user->save();

        Auth::login($user);

        return redirect('/');
    }
}
