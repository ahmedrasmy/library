<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {   
        //Validation api
            $validator = Validator::make($request->all(), 
            [
                'name'  => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'password'  => 'required|string|max:50|min:5'
            ]);
        
            if ($validator->fails()) {
                $errors=$validator->errors();
                return response()->json($errors);
            }
        // Store In DB
        $user=User::create(
            [
                'name'  => $request ->name,
                'email' => $request ->email,
                'password'  => Hash::make($request ->password),
                'access_token' => Str::random(64),
            ]
        );

       
        // book registered
        
        return response()->json($user->access_token);
    }

    public function handleLogin(Request $request)
    {   
        //Validation api
            $validator = Validator::make($request->all(), 
            [
                'email' => 'required|email|max:100',
                'password'  => 'required|string|max:50|min:5'
            ]);
        
            if ($validator->fails()) {
                $errors=$validator->errors();
                return response()->json($errors);
            }
        
        $is_user=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$is_user){
            $error="credientials are not correct";
            return response()->json($error);

        }
        $user=User::where('email',$request->email)
                    ->first();
        $new_access_token=Str::random(64);
        $user->update(
            [
            'access_token' =>$new_access_token
            ]);
        return response()->json($new_access_token);
    }
    public function logout(Request $request){
        $access_token=$request->access_token;
        $user=User::where('access_token',$access_token)->first();

        if($user==null)
        {
            $error='token not correct';
            return response()->json($error);
        }
        $user->update(
            [
                'access_token' =>null
            ]
            );
        $success='logged out successfully';
        return response()->json($success);
    }
}
