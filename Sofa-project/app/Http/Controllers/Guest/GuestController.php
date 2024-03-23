<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Hash;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class GuestController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('guest.pages.login');
    }
    public function showRegister(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('guest.pages.register');
    }

    public function register(registerRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('index');
    }

    public function login(LoginRequest $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' =>1,
            'level'=>1
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('index');
        }
        return redirect()->back();
    }
    public function adminLogin(LoginRequest $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' =>1,
            'level'=>2
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.category.index');
        }
        return redirect()->back();
    }

    public function showForgotPassword(){
        //
    }

    public function index(){
        return view('guest.pages.index');
    }

    public function viewShop(){
        return view('guest.pages.shop');
    }

    public function detail($id){
        return view('guest.pages.productdetail');
    }

    public function showCompare(){
        return view('guest.modules.compare');
    }

    public function contact(){
        return view('guest.modules.contact');
    }

}
