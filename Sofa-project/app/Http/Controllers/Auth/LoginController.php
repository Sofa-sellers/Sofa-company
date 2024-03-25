<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('guest.login');
    }
    public function showRegister(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('guest.register');
    }

    public function register(registerRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('showLogin');
    }

    public function login(LoginRequest $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' =>1,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            if(Auth::id()){
                $userlevel=Auth()->user()->level;
                if($userlevel==1){
                    return view('guest.index');
                }
                else if($userlevel==2){
                    return view('admin.modules.index');
                }
                else{
                    return redirect()->back();
                }
            }
        }
    }

    public function forgotPassword(Request $request){
        //
    }
}
