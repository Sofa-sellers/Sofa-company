<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\AttributeValue;
use App\Models\Category;

use App\Models\Brand;
use App\Models\RatingComment;
use Auth;

class GuestController extends Controller
{
    public function index(){
        $products_lastest = Product::where('status',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        if ($products_lastest->isEmpty()) {
            return view('guest.404');
        }else{
            $products_lastest = $products_lastest;
        }

        $products_sale = Product::where('status',1)->where('is_sale',1)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
        if ($products_sale->isEmpty()) {
            $products_sale = Product::where('sale_price', '>', 0)->orderBy('created_at','DESC')->skip(0)->take(8)->get();
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

    public function shop(Request $request){
        if(!request()->orderby){
            request()->orderby=-1;
        }
        if(!request()->search){
            switch (request()->orderby) {
                case 1:
                    $products = Product::with('category','brand')->orderBy('created_at','DESC')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 2:
                    $products = Product::with('category','brand')->orderBy('created_at','ASC')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 3:
                    $products = Product::with('category','brand')->orderBy('sale_price','ASC')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 4:
                    $products = Product::with('category','brand')->orderBy('sale_price','DESC')
                    ->where('status','!=',2)->paginate(6);
                    break;       
                default:
                    $products = Product::with('category','brand')->orderBy('created_at','DESC')
                    ->where('status','!=',2)->paginate(6);
            }
        }
        else{
            switch (request()->orderby) {
                case 1:
                    $products = Product::with('category','brand')->orderBy('created_at','DESC')
                    ->where('name','like','%'.request()->search.'%')
                    ->orwhere('price','like','%'.request()->search.'%')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 2:
                    $products = Product::with('category','brand')->orderBy('created_at','ASC')
                    ->where('name','like','%'.request()->search.'%')
                    ->orwhere('price','like','%'.request()->search.'%')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 3:
                    $products = Product::with('category','brand')->orderBy('sale_price','ASC')
                    ->where('name','like','%'.request()->search.'%')
                    ->orwhere('price','like','%'.request()->search.'%')
                    ->where('status','!=',2)->paginate(6);
                    break;
                case 4:
                    $products = Product::with('category','brand')->orderBy('sale_price','DESC')
                    ->where('name','like','%'.request()->search.'%')
                    ->orwhere('price','like','%'.request()->search.'%')
                    ->where('status','!=',2)->paginate(6);
                    break;       
                default:
                    $products = Product::with('category','brand')->orderBy('created_at','DESC')
                    ->where('name','like','%'.request()->search.'%')
                    ->orwhere('price','like','%'.request()->search.'%')
                    ->where('status','!=',2)->paginate(6);
            }
        }
        $brand=Brand::where('status','!=',2)->get();
        $categories_child= Category::where('parent_id','!=',0)->get();
        //$products=Product::where('status','!=',2)->orderBy('created_at','DESC')->orderBy($o_column,$o_order)->paginate(6);

        return view('guest.shopfull',compact('products'),[
            'categories_child' =>$categories_child,
            'products'=>$products,
            'brand'=>$brand
        ]);
    }

    public function viewShop(Request $request,$id){
        if(!request()->orderby){
            request()->orderby=-1;
        }
        if(request()->search){
            $products = Product::with('category')->orderBy('created_at','DESC')
            ->where('category_id', $id)
            ->where('name','like','%'.request()->search.'%')
            ->orwhere('price','like','%'.request()->search.'%')
            ->where('status','!=',2)->paginate(6);
        }else{
            switch (request()->orderby) {
                case 1:
                    $products = Product::with('category')->orderBy('created_at','DESC')
                    ->where('category_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 2:
                    $products = Product::with('category')->orderBy('created_at','ASC')
                    ->where('category_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 3:
                    $products = Product::with('category')->orderBy('sale_price','DESC')
                    ->where('category_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 4:
                    $products = Product::with('category')->orderBy('sale_price','ASC')
                    ->where('category_id', $id)->where('status','!=',2)->paginate(6);
                    break;       
                default:
                    $products = Product::with('category')->orderBy('created_at','DESC')
                    ->where('category_id', $id)->where('status','!=',2)->paginate(6);
            }
        }
        $categories_child= Category::where('parent_id','!=',0)->where('status','!=',2)->where('id',$id)->first();
        $categoriesList= Category::where('parent_id','!=',0)->where('status','!=',2)->get();
        $brand=Brand::where('status','!=',2)->get();
        // $products = Product::with('category')->orderBy('created_at','DESC')->orderBy($o_column,$o_order)->where('category_id', $id)->where('status','!=',2)->paginate(6);
        
        //$category_list = Category::with('product')->where('category_id', $id)->get();



        return view('guest.shop',compact('products'),
        [
            'id' => $id,
            'products' => $products,
            'categories_child' =>$categories_child,
            'categoriesList'=>$categoriesList,
            'brand'=>$brand
        ]);
    }
    public function viewShopBrand(Request $request,$id){
        if(!request()->orderby){
            request()->orderby=-1;
        }
        if(request()->search){
            $products = Product::with('brand','category')->orderBy('created_at','DESC')
            ->where('brand_id', $id)
            ->where('name','like','%'.request()->search.'%')
            ->orwhere('price','like','%'.request()->search.'%')
            ->where('status','!=',2)->paginate(6);
        }else{
            switch (request()->orderby) {
                case 1:
                    $products = Product::with('brand','category')->orderBy('created_at','DESC')
                    ->where('brand_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 2:
                    $products = Product::with('brand','category')->orderBy('created_at','ASC')
                    ->where('brand_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 3:
                    $products = Product::with('brand','category')->orderBy('sale_price','DESC')
                    ->where('brand_id', $id)->where('status','!=',2)->paginate(6);
                    break;
                case 4:
                    $products = Product::with('brand','category')->orderBy('sale_price','ASC')
                    ->where('brand_id', $id)->where('status','!=',2)->paginate(6);
                    break;       
                default:
                    $products = Product::with('brand','category')->orderBy('created_at','DESC')
                    ->where('brand_id', $id)->where('status','!=',2)->paginate(6);
            }
        }
        $brand= Brand::where('status','!=',2)->first();
        $brandList=Brand::where('status','!=',2)->get();
        $categoriesList= Category::where('parent_id','!=',0)->where('status','!=',2)->get();
        // $products = Product::with('category')->orderBy('created_at','DESC')->orderBy($o_column,$o_order)->where('category_id', $id)->where('status','!=',2)->paginate(6);
        
        //$category_list = Category::with('product')->where('category_id', $id)->get();
        


        return view('guest.shopBrand',compact('products'), 
        [
            'id' => $id,
            'products' => $products,
            'categoriesList'=>$categoriesList,
            'brand'=>$brand,
            'brandList'=>$brandList
        ]);
    }

    public function detail($slug){
        $product = Product::with('category', 'productimages','sku','attributevalue')->where('slug',$slug)->first();
        $products_related = Product::where('status','!=',2)->with('category')
        ->where('category_id', $product->category->id)
        ->where('id','!=',$product->id)
        ->paginate(8);
        if($products_related->isEmpty()){
            $products_related = Product::orderBy('created_at','DESC')
            ->where('id','!=',$product->id)
            ->paginate(8);

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

    
        $comments = RatingComment::where('product_id', $product->id)->where('status', 1)->orderBy('created_at','DESC')->get();

        // dd($comments);
        return view('guest.productdetail',[
            'product'=>$product,
            // 'skus'=>$skus,
            'products_related'=>$products_related,
            'colors'=>$colors,
            'material'=>$material,
            'dimension'=>$dimension,
            'comments'=>$comments,
        ]);
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

    public function search(Request $request){
        $data=$request->input('search');
        $categories_child= Category::where('parent_id','!=',0)->get();
        $products=Product::where('status','!=',2)
        ->where('name','like','%'.$data.'%')
        ->orwhere('brand','like','%'.$data.'%')
        ->orwhere('sale_price','like','%'.$data.'%')
        ->paginate(6);

        return view('guest.indexShop',compact('products','categories_child'));
    }
}
