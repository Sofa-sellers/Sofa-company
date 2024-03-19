<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function addToCart($id, $quantity){
        
    }

    public function cart(){
        return view('guest.pages.cart.cart');
        
    }

    public function cartDelete($id){
        
    }

    public function cartUpdate(UpdateRequest $request, $id){

    }

    public function showCheckout(){
        return view('guest.pages.cart.checkout');
        
    }
}
