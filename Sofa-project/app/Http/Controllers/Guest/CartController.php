<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.pages.index');
    }

    public function category(){
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
