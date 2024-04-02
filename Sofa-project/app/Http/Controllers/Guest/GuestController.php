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
        $products_lastest = Product::orderBy('created_at','DESC')->skip(0)->take(8)->get();
        $products_sale = Product::where('is_sale',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        $products_featured = Product::where('featured',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        $categories = Category::get();

        return view('guest.index',[
            'products_lastest' => $products_lastest,
            'categories'=>$categories,
            'products_sale' => $products_sale,
            'products_featured' => $products_featured,
        ]);
    }

    public function viewShop($id){

        $categories = Category::find($id)->where('parent_id',0);
        $categories_child = Category::find($id)->where('parent_id','!=',0)->first();
        
        $products = Product::with('category')->where('category_id', $id)->paginate(6);
        


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
        $products_related = Product::with('category')
        ->where('category_id', $product->category->id)
        ->where('id','!=',$product->id)
        ->paginate(4);

       
        $skus = $product->sku;
  
        $colors[]=null;
       
        foreach ($skus as $sku) {
            if($sku->attribute_id == 1){
                $color = AttributeValue::where('id', $sku->value_id)->first();
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
