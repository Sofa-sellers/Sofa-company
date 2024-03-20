<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register(Request $request){

    }

    public function showLogin(){
        return view('guest.pages.login');
    }

    public function ratingCommentStore(StoreRequest $request){

    }

    public function ratingCommentUpdate(UpdateRequest $request, $id){
//
    }

    public function checkout(Request $request){
        //
    }

    public function accountIndex(){
        return view('client.pages.account');
    }

    public function addToWishlist($id, $quantity){
        //
    }

    public function showWishlist(){
        return view('client.modules.wishlist');
        
    }

    public function wishlistDelete($id){
        //
    }

    public function wishlistUpdate(UpdateRequest $request, $id){
//
    }

    public function order(Request $request){
        //
    }

    public function addressUpdate(UpdateRequest $request, $id){
//
    }

    public function accountDetailsUpdate(UpdateRequest $request, $id){
//
    }

    public function logout(){
        //
    }

}
