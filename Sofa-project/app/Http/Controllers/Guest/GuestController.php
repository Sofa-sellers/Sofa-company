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
use App\Models\AttributeValue;
use App\Models\Category;

class GuestController extends Controller
{

    public function showForgotPassword(){
        //
    }

    public function index(){
        $products_lastest = Product::orderBy('created_at','DESC')->skip(0)->take(8)->get();
        $categories = Category::get();

        return view('guest.index',[
            'products_lastest' => $products_lastest,
            'categories'=>$categories
        ]);
    }

    public function viewShop(){
        return view('guest.shop');
    }

    public function detail($id){
        $product = Product::with('category', 'productimages','sku')->where('id',$id)->first();
        $products_related = Product::with('category')
        ->where('category_id', $product->category->id)
        ->where('id','!=',$product->id)
        ->paginate(4);


        // $skus = Sku::with('attributevalue')->where('product_id',$id)->get();

        // foreach ($skus as $sku) {
        //     // Kiểm tra xem attributevalue có tồn tại không trước khi truy cập
        //     if ($sku->attribute_id == 1) {
        //         $color = $sku->attributevalue->value;
        //     }elseif($sku->attribute_id == 3){
        //         $material = $sku->attributevalue->value;
        //     }
        // }

        // dd($color);
        
        return view('guest.productdetail',[
            'product'=>$product,
            // 'skus'=>$skus,
            'products_related'=>$products_related
        ]);
    }

    public function showCompare(){
        return view('guest.compare');
    }

    public function contact(){
        return view('guest.contact');
    }

    public function aboutUs(){
        return view('guest.aboutus');
    }

    public function privacy(){
        return view('guest.privacy');
    }

}
