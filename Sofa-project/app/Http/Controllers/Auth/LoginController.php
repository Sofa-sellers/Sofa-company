<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(LoginRequest $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' =>1
        ];
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('index');
        }
            return redirect()->back();
    }

    public function register(Request $request){

    }

    public function logout(){
        //
    }

}
