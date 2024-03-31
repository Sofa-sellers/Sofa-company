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
use App\Models\Attribute;

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

    public function viewShop(Request $request){
        $page=$request->query("page");
        $size=$request->query("size");

        if(!$page){
            $page=1;
        }
        if(!$size){
            $size=9;
        }
        $order=$request->query("order");
        if(!$order){
            $order=-1;
        }
        $o_column="";
        $o_order="";
        switch($order){
            case 1:
                $o_column="created_at";
                $o_order="DESC";
                break;
            case 2:
                $o_column="created_at";
                $o_order="ASC";
                break;    
            case 3:
                $o_column="sale_price";
                $o_order="ASC";
                break;
            case 4:
                $o_column="sale_price";
                $o_order="DESC";
                break;
            default:
                $o_column="id";
                $o_order="DESC";
                break;
        }
        $products=Product::orderBy('created_at','DESC')->orderBy($o_column,$o_order)->paginate(12);
        return view('guest.shop',[
            'product'=>$products,
            'page'=>$page,
            'size'=>$size,
            'order'=>$order
        ]);
    }

    public function detail($id){

        $product = Product::with('category', 'productimages','sku')->where('id',$id)->first();
        $products_related = Product::with('category')
        ->where('category_id', $product->category->id)
        ->where('id','!=',$product->id)
        ->paginate(4);


        
        
        
        // dd($product);
        $skus = $product->sku;
        dd($skus);
        $color=null;
       
        foreach ($skus as $sku) {
            if($sku->attribute_id == 1){
                $color=Sku::get();
                
            }
        }
        
        // $material=null;
        // foreach ($skus as $sku) {

        //         if ($sku->attribute_id == 1) {
        //         $color = $sku->attributevalue->value;
        //         dd($color);
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

    public function download($id){
        $product=Product::where('id', $id)->first();
        $filePath = public_path('uploads/'.$product->file); // Đường dẫn tới tệp cần tải xuống

    return view('guest.productdetail', ['filePath' => $filePath]);
    }

}
