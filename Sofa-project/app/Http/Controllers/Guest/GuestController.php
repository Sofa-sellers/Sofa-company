<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Hash;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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
        $products_lastest = Product::where('status',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        if ($products_lastest->isEmpty()) {
            return view('guest.404');
        }else{
            $products_lastest = $products_lastest;  
        }

        $products_sale = Product::where('status',1)->where('is_sale',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        if ($products_sale->isEmpty()) {
            $products_sale = $products_lastest;
        }else{
            $products_sale = $products_sale; 
        }

        $products_featured = Product::where('status',1)->where('featured',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        if ($products_featured->isEmpty()) {
            $products_featured = $products_lastest;
        }else{
            $products_featured = $products_featured; 
        }

        $categories = Category::where('status',1)->get();

        return view('guest.index',[
            'products_lastest' => $products_lastest,
            'categories'=>$categories,
            'products_sale' => $products_sale,
            'products_featured' => $products_featured,
        ]);
    }

    public function shop(){
        $categories_child= Category::where('parent_id','!=',0)->get();
        $products=Product::where('status','!=',2)->paginate(6);

        return view('guest.shopfull',compact('products'),[
            'categories_child' =>$categories_child,
            'products'=>$products,
        ]);
    }

    public function viewShop($id){

        $categories = Category::find($id);
       
        $categories_child= Category::find($id)->where('parent_id','!=',0)->get();

        $products = Product::with('category')->where('category_id', $id)->where('status','!=',2)->paginate(6);
        
        //$category_list = Category::with('product')->where('category_id', $id)->get();
        


        return view('guest.shop',compact('products'), 
        [
            'id' => $id,
            'products' => $products,
            'categories' => $categories,
            'categories_child' =>$categories_child
            
        ]);
    }

    public function detail($slug){

        $product = Product::with('category', 'productimages','sku','attributevalue')->where('slug',$slug)->first();
        $products_related = Product::where('status','!=',2)->with('category')
        ->where('category_id', $product->category->id)
        ->where('id','!=',$product->id)
        ->paginate(4);

        if($products_related->isEmpty()){
            $products_related = Product::orderBy('created_at','DESC')
            ->where('id','!=',$product->id)
            ->paginate(4);

        }
       
        $skus = $product->sku;
  
        $colors[]=null;
       
        foreach ($skus as $sku) {
            if($sku->attribute_id == 1){
                $color = AttributeValue::where('status','!=',2)->where('id', $sku->value_id)->first();
                $colors[] = $color;
            }
        }

        $material = DB::table('attribute_values')
            ->join('products', 'attribute_values.id', '=', 'products.material_id')
            ->select('attribute_values.value')
            ->where('products.slug',$slug)
            ->where('attribute_values.attribute_id',3)
            ->get();

            $dimension = DB::table('attribute_values')
            ->join('products', 'attribute_values.id', '=', 'products.dimension_id')
            ->select('attribute_values.value')
            ->where('products.slug',$slug)
            ->where('attribute_values.attribute_id',2)
            ->get('');   

    // dd($dimension);

        return view('guest.productdetail',[
            'product'=>$product,
            // 'skus'=>$skus,
            'products_related'=>$products_related,
            'colors'=>$colors,
            'material'=>$material,
            'dimension'=>$dimension
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
