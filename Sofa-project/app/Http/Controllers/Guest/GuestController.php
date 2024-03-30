<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Hash;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Sku;

class GuestController extends Controller
{

    public function showForgotPassword(){
        //
    }

    public function index(){
        $products_lastest = Product::orderBy('created_at','DESC')->skip(0)->take(8)->get();
        return view('guest.index',[
            'products_lastest' => $products_lastest,
        ]);
    }

    public function viewShop(){
        return view('guest.shop');
    }

    public function detail($id){
        $product = Product::with('category', 'productimages','sku')->where('id',$id)->first();
        $skus = Sku::with('attributevalue')->where('product_id',$id)->get();
        
        return view('guest.productdetail',[
            'product'=>$product,
            'skus'=>$skus,
        ]);
    }

    public function showCompare(){
        return view('guest.compare');
    }

    public function contact(){
        return view('guest.contact');
    }

}
