<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function ratingCommentStore(StoreRequest $request){

    }

    public function ratingCommentUpdate(UpdateRequest $request, $id){

    }

    public function checkout(Request $request){
        
    }

    public function accountIndex(){
        return view('client.pages.account');
    }

    public function addToWishlist($id, $quantity){
        
    }

    public function showWishlist(){
        return view('client.modules.wishlist');
        
    }

    public function wishlistDelete($id){
        
    }

    public function wishlistUpdate(UpdateRequest $request, $id){

    }

    public function order(Request $request){
        
    }

    public function addressUpdate(UpdateRequest $request, $id){

    }

    public function accountDetailsUpdate(UpdateRequest $request, $id){

    }

    public function logout(){
        
    }

    
}
