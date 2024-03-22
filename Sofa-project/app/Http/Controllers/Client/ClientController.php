<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function forgotPassword(Request $request){
        //
    }

    public function addToCart(Request $request, $id, $quantity){
        //
    }

    public function showCart(){
        return view('client.pages.cart');
        
    }

    public function cartDelete($id){
        //
    }

    public function cartUpdate(Request $request, $id, $quantity){
        //
    }

    public function showCheckout(){
        return view('client.pages.checkout');
        
    }

    public function checkout(Request $request){
        //
    }

    public function ratingCommentStore(Request $request){
            //
    }

    public function ratingCommentUpdate(Request $request, $id){
//
    }

    public function accountIndex(){
        return view('client.pages.account');
    }

    public function addToWishlist($id, $quantity){
        //
    }

    public function showWishlist(){
        return view('client.pages.wishlist');
        
    }

    public function wishlistDelete($id){
        //
    }

    public function wishlistUpdate(Request $request, $id){
//
    }

    public function order(Request $request){
        //
    }

    public function addressUpdate(Request $request, $id){
//
    }

    public function accountDetailsUpdate(Request $request, $id){
//
    }
}
