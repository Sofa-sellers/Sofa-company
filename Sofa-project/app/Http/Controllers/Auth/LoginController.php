<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        return view('guest.pages.login');
    }

    public function register(Request $request){
        //
    }

    public function login(Request $request){
        //
    }

    public function showForgotPassword(){
        //
    }

    public function forgotPassword(Request $request){
        //
    }

}
