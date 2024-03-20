<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function ratingCommentShow(StoreRequest $request){
        return view('guest.pages.login');
    }
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
