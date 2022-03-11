<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
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
                'password'  => 'required|string|max:50|min:5'
            ]
            );
        // Store In DB
        $user=User::create(
            [
                'name'  => $request ->name,
                'email' => $request ->email,
                'password'  => Hash::make($request ->password)  
            ]
        );

        // Login
        Auth::login($user);

        // Redirect To Books
        return Redirect(route('books.index'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {   //Validation
        $request->validate(
            [
                'email' => 'required|email|max:100',
                'password'  => 'required|string|max:50|min:5'
            ]
            );
        
        $is_login =Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        
        if(!$is_login){
            return back();
        }
        return redirect( route('books.index') );
    }

    //Logout
    public function logout(){
        Auth::logout();
        return back();
    }

    
}
