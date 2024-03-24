<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $userlevel=Auth()->user()->level;
            if($userlevel==1){
                return view('guest.pages.index');
            }
            else if($userlevel==2){
                return view('admin.category.index');
            }
            else{
                return redirect()->back();
            }
        }
    }

}
