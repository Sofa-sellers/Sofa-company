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

    public function showForgotPassword(){
        //
    }

    public function index(){
        return view('guest.index');
    }

    public function viewShop(){
        return view('guest.shop');
    }

    public function detail($id){
        return view('guest.productdetail');
    }

    public function showCompare(){
        return view('guest.compare');
    }

    public function contact(){
        return view('guest.contact');
    }

}
