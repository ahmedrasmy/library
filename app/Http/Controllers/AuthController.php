<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {   //Validation
        $request->validate(
            [
                'name'  => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'pass'  => 'required|string|max:50|min:5'
            ]
            );
        // Store In DB
        $user=User::create(
            [
                'name'  => $request ->name,
                'email' => $request ->email,
                'pass'  => Hash::make($request ->pass)  
            ]
        );

        // Login
        Auth::login($user);

        // Redirect To Books
        return Redirect(route('books.index'));
    }
}
