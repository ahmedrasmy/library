<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        //send email
        Mail::to($request ->email)->send(new RegisterMail($request ->name));
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

    // redirect Socialite Facebook or Github
    public function redirectSocialite($service)
    {
        return Socialite::driver($service)->redirect();
    }

    // callback Socialite Facebook or Github
    public function callbackSocialite($service)
    {
        $user = Socialite::driver($service)->user();
        $email=$user->email;
        $db_user=User::where('email','=',$email)->first();
        if($db_user==null)
        {
            $registered_user = User::create([
                'name' =>$user-> name,
                'email' =>$user-> email,
                'password' =>Hash::make('123456') ,
                'oauth_token' =>$user->token,

            ]);

            Auth::login($registered_user);
        }
        else
        {
            Auth::login($db_user);
        }
        return redirect( route('books.index') );
    }
    
}
