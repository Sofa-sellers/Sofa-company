<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Zip;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use App\Models\RatingComment;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\Admin\User\StoreRequest as UserStoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest as UserUpdateRequest;
use App\Http\Requests\Admin\Category\StoreRequest as CategoryStoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest as CategoryUpdateRequest;
use App\Http\Requests\Admin\Product\StoreRequest as ProductStoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest as ProductUpdateRequest;
use App\Http\Requests\Admin\RatingComment\StoreRequest as RatingCommentStoreRequest;
use App\Http\Requests\Admin\RatingComment\UpdateRequest as RatingCommentUpdateRequest;
use App\Http\Requests\Admin\Brand\StoreRequest as BrandStoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest as BrandUpdateRequest;
use App\Http\Requests\Admin\AttributeValue\StoreRequest as AttributeValueStoreRequest;
use App\Http\Requests\Admin\AttributeValue\UpdateRequest as AttributeValueUpdateRequest;
use App\Http\Requests\Admin\Attribute\StoreRequest as AttributeStoreRequest;
use App\Http\Requests\Admin\Attribute\UpdateRequest as AttributeUpdateRequest;
use App\Http\Requests\Admin\Sku\StoreRequest as SkuStoreRequest;
use App\Http\Requests\Admin\Sku\UpdateRequest as SkuUpdateRequest;
use App\Http\Requests\Admin\Order\StoreRequest as OrderStoreRequest;
use App\Http\Requests\Admin\Order\UpdateRequest as OrderUpdateRequest;
use App\Http\Requests\Admin\Zip\StoreRequest as ZipStoreRequest;
use App\Http\Requests\Admin\Zip\UpdateRequest as ZipUpdateRequest;

use Illuminate\Http\Request;

use App\Models\CategoryPhotos;
use App\Models\OrderDetail;
use App\Models\ProductImages;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.modules.index');
    }
    public function userIndex()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.user.index', ['users' => $users]);
    }

    public function userCreate()
    {
        return view('admin.modules.user.create');
    }

    public function userStore(UserStoreRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        $user->level = $request->level;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Create user successfully');
    }

    public function userEdit(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        return view('admin.modules.user.edit', ['user' => $user, 'id' => $id]);
    }

    public function userUpdate(UserUpdateRequest $request, string $id)
    {
        $user = User::find($id);

        if ($user->email !== null) {
            return redirect()->route('admin.user.index')->with('error', 'Email cannot be edited.');
        }

        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        $user->level = $request->level;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Update user successfully');
    }

    public function userDestroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Delete user successfully');
    }

    public function cateIndex()
    {
        $categories=Category::orderBy('created_at','DESC')->get();
        return view('admin.modules.category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cateCreate()
    {
        $categories = Category::select('id','name','parent_id')->get();
        return view('admin.modules.category.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cateStore(CategoryStoreRequest $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $category = new Category();

        $photo = $request->photo;
        $photoName = time() . '-' . $photo->getClientOriginalName();
        $photo->move(public_path('uploads/'), $photoName);
        $category->photo = $photoName;

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.category.index')->with('success','Create category successfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function cateEdit(int $id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::select('id','name','parent_id')->get();

        return view('admin.modules.category.edit', [
            'id' => $id,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function cateUpdate(CategoryUpdateRequest $request, $id)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $category = Category::findOrFail($id);

        $photo = $request->photo;
        if (!empty($photo)) {
            $old_photo_path = public_path('uploads/' . $category->photo);
            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }
            $photoName = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/'), $photoName);
            $category->photo = $photoName;
        }

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Update category successfully');
    }

    public function checkCategory($id)
    {
    $category = Category::findOrFail($id);
    $hasChildren = $category->children()->exists();
    $hasProducts = $category->products()->exists();

    return response()->json(['hasChildren' => $hasChildren, 'hasProducts' => $hasProducts]);
    }

    public function cateDestroy(int $id)
    {
        $category = Category::findOrFail($id);
        if ($category == null) {
            abort(404);
        }

        $old_photo_path = public_path('uploads/' . $category->photo);
        if (file_exists($old_photo_path)) {
            unlink($old_photo_path);
        }

        if ($category->children->isNotEmpty()) {
            return redirect()->route('admin.category.index')->with('error', 'Cannot delete a category that is a parent of other categories');
        }

        $category->products()->update(['status' => 2]);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Deleted category successfully');
    }

    public function productIndex()
    {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->get();

        return view('admin.modules.product.index', ['products' => $products]);
    }

    public function productCreate()
    {
        $categories = Category::get();

        $colors = AttributeValue::where('attribute_id',1)->get();
        $dimensions = AttributeValue::where('attribute_id',2)->get();

        $materials = AttributeValue::where('attribute_id',3)->get();

        $brands = Brand::get();
        return view('admin.modules.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'colors'=>$colors,
            'materials'=>$materials,
            'dimensions'=>$dimensions

        ]);
    }

    public function productStore(ProductStoreRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $product = new Product();

        $file = $request->file;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('uploads/'), $fileName);
        $product->file = $fileName;

        $image = $request->image;
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('uploads/'), $imageName);
        $product->image = $imageName;


        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->dimension_id = $request->dimension_id;

        $product->material_id = $request->material_id;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->featured = $request->featured;
        $product->is_sale = $request->is_sale;
        $product->status = $request->status;

        $d = AttributeValue::where('id', $product->dimension_id)->value('value');

        $m = AttributeValue::where('id', $product->material_id)->value('value');

        $array = [$product->name, $d, $m];


        $intro = implode(' - ', $array);

        $product->intro = $intro;
        $slug = Str::slug($intro, '-');

        $product->slug = $slug;
        $product->save();

        if ($request->images !== null) {
        // if(count($request->images) > 0){
            $count = 0;
            $data_images = [];
            foreach ($request->images as $img_detail){
                $count++;
                $fileNameDetail = $count . '-' . time() . '-' . $img_detail->getClientOriginalName();
                $img_detail->move(public_path('uploads/'), $fileNameDetail);

                $data_images[]=[
                    'name' => $fileNameDetail,
                    'product_id' => $product->id,
                    'created_at' =>new \DateTime(),
                    'updated_at' =>new \DateTime()
                ];

            }

            ProductImages :: insert($data_images);
        }

        if ($request->value_id !== null) {
            foreach ($request->value_id as $value){
                $attribute = AttributeValue::find($value)->attribute;

                $skus[]=[
                    'attribute_id'=>$attribute->id,
                    'product_id' => $product->id,
                    'value_id'=>$value,
                    'created_at' =>new \DateTime(),
                    'updated_at' =>new \DateTime()
                ];
            }
            Sku :: insert($skus);
        }

        return redirect()->route('admin.product.index')->with('success', 'Create product successfully');
    }


    public function productEdit(string $id)
    {
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::find($id);
        $colors = AttributeValue::where('attribute_id',1)->get();
        $dimensions = AttributeValue::where('attribute_id',2)->get();

        $materials = AttributeValue::where('attribute_id',3)->get();
        if ($products == null) {
            abort(404);
        }
        return view('admin.modules.product.edit', [
            'id' => $id,
            'categories' => $categories,
            'product' => $products,
            'brands'=>$brands,
            'colors'=>$colors,
            'materials'=>$materials,
            'dimensions'=>$dimensions
        ]);
    }

    public function productUpdate(ProductUpdateRequest $request, string $id)
    {
        // dd($id);
        $products = Product::where('id', $id)->first();
        $request->validate([
            'file' => 'required|mimes:pdf',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);


        if ($products == null) {
            abort(404);
        }

        $file = $request->file;
        if (!empty($file)) {
            $old_file_path = public_path('uploads/' . $products->file);
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $products->file = $fileName;
        }

        $image = $request->image;
        if (!empty($image)) {
            $old_image_path = public_path('uploads/' . $products->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $imageName);
            $products->image = $imageName;
        }

        $products->name = $request->name;
        // $products->slug = $request->slug;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->sale_price = $request->sale_price;
        $products->category_id = $request->category_id;
        // $products->brand_id = $request->brand_id;
        $products->status = $request->status;
        $products->save();

        return redirect()->route('admin.product.index')->with('success', 'Update product successfully');
    }

    public function productDestroy(string $id)
    {
        $products = Product::find($id);
        $images = ProductImages::where('product_id',$id)->get();
        if ($products == null) {
            abort(404);
        }
        $old_image_path = public_path('uploads/' . $products->image);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        foreach($images as $image){
            $old_image_path = public_path('uploads/' . $image->name);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }


        if ($products == null) {
            abort(404);
        }

        $products->delete();

        return redirect()->route('admin.product.index')->with('success', 'Deleted product successfully');
    }

    public function orderIndex()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();

        return view('admin.modules.order.index',[
            'orders'=>$orders,
        ]);
    }



    public function orderEdit($id)
    {

        $order = Order::findOrFail($id);
        $details=OrderDetail::where('order_id', $id)->get();

        
        return view('admin.modules.order.edit',[
            'details'=>$details,
            'order'=>$order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function orderUpdate(Request $request, $id)
    {
        $order=Order::find($id);
        if($order == null){
            abort(404);
        }

        if($order->status == $request->status){
            return redirect()->route('admin.order.index');
        }

        if($request->status == 3){
            $order->status = $request->status;
            $order->deleted_at = now();
            $order->save();
        }
        
        $order->status = $request->status;
        $order->updated_at = now();
        $order->save();

        if($order->status == 3){
            $details = OrderDetail::where('order_id', $id)->get();
            foreach($details as $detail){
                $product = Product::where('id',$detail->product_id)->first();
                $product->quantity = $product->quantity + $detail->quantity;
                $product->updated_at = now();
                if($product->status == 2){
                    $product->status = 1;
                }
                $product->save();
            }
        }
        $order->save();
        return redirect()->route('admin.order.index')->with('success','Update order status successfully');
    }

    
    public function racomIndex()
    {
        $ratingComments = RatingComment::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.ratingComment.index', ['ratingComments' => $ratingComments]);
    }



    public function racomAccept(RatingCommentStoreRequest $request)
    {
        $ratingComment = new RatingComment();

        $ratingComment->product_id = $request->product_id;
        $ratingComment->user_id = $request->user_id;
        $ratingComment->rating = $request->rating;
        $ratingComment->comment = $request->comment;

        $ratingComment->save();

        return redirect()->route('admin.ratingComment.index')->with('success', 'Accept rating comment successfully');
    }

    public function racomDestroy(){
        //
    }

    public function valueIndex()
    {
        $values = AttributeValue::with('attribute')->orderBy('created_at','DESC')->get();

            return view('admin.modules.value.index',[
                'values'=>$values,
            ]);
    }


    public function valueCreate()
    {
        $attribute = Attribute::get();

        return view('admin.modules.value.create', ['attributes' => $attribute]);
    }


    public function valueStore(AttributeValueStoreRequest $request)
    {
        $value = new AttributeValue();

        $value->attribute_id = $request->attribute_id;

        if ($value->attribute_id == 1) {
            $value->value = $request->color;
        }
        elseif ($value->attribute_id == 2) {
            $value->value = $request->dimension;
        }
        else {
            $value->value = $request->material;
        }


        $existingValue = AttributeValue::where('attribute_id', $value->attribute_id)
                                    ->where('value', $value->value)
                                    ->first();

        if($value->value == null){
            $value->delete();
            return redirect()->route('admin.value.index')->with('failed', 'Failed to create value of attribute. Value cannot be null');
        }elseif($existingValue){
            return redirect()->route('admin.value.index')->with('failed', 'Failed to create value of attribute. Value must be unique');
        }else{
            $value->status = $request->status;
            $value->save();
            return redirect()->route('admin.value.index')->with('success','Create value of attribute successfully');
        }

    }


    public function valueEdit($id)
    {
        $values = AttributeValue::find($id);

        return view('admin.modules.value.edit',[
            'id'=>$id,
            'value'=>$values
        ]);
    }


    public function valueUpdate(AttributeValueUpdateRequest $request, $id)
    {
        $values= AttributeValue::find($id);
        dd($values);
        if($values==null){
            abort(404);
        }

        $values->attribute_id = $request->attribute_id;

        $values->value = $request->value;

        $values->status = $request->status;

        $values->save();
        return redirect()->route('admin.value.index')->with('success','Update value of attribute successfully');

    }


    // public function valueDestroy(int $id)
    // {
    //     $values= AttributeValue::find($id);
    //     if($values==null){
    //         abort(404);
    //     }
    //     $values->delete();
    //     return redirect()->route('admin.value.index')->with('success','Delete value of attribute successfully');
    // }

    public function brandIndex()
    {
        $brands = Brand::orderBy('created_at','DESC')->get();
        return view('admin.modules.brand.index',[
            'brands'=>$brands
        ]);
    }


    public function brandCreate()
    {
        return view('admin.modules.brand.create');
    }


    public function brandStore(BrandStoreRequest $request)
    {
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->status = $request->status;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success','Create brand successfully');
    }


    public function brandEdit(int  $id)
    {   $brands=Brand::find($id);
        return view('admin.modules.brand.edit',[
            'id'=>$id,
            'brand'=>$brands
        ]);
    }


    public function brandUpdate(BrandUpdateRequest $request, $id)
    {
        $brands=Brand::find($id);
        if($brands == null){
            abort(404);
        }

        $brands->name = $request->name;
        $brands->update();
        return redirect()->route('admin.brand.index')->with('success','Update brand successfully');

    }


    public function brandDestroy(int $id)
    {
        $brands = Brand::find($id);
        if($brands==null){
            abort(404);
        }

        $brands->delete();
        return redirect()->route('admin.brand.index')->with('success','Delete brand successfully');
    }


    public function skuIndex($product_id) {
        $product = Product::findOrFail($product_id);

        $skus = Sku::with('attributevalue')->where('product_id', $product->id)->orderBy('created_at', 'DESC')->get();

        $attributeIds = [];
    $values = [];

    // Retrieve unique attribute IDs from skus
    foreach ($skus as $sku) {
            $value = AttributeValue::where('id', $sku->value_id)->get();
            dd($sku->value_id);
            $values[] = $value;


    }


        return view('admin.modules.sku.index',[
            'product'=>$product,
            'skus'=>$skus,
            'attributes'=>$attributeIds,
            'values'=>$values
        ]);
    }


    public function skuCreate($product_id){
        $product = Product::findOrFail($product_id);

        return view('admin.modules.sku.index',[
            'product'=>$product
        ]);

    }


    public function skuStore(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $skus = Sku::where('product_id',$product_id)->orderBy('created_at','DESC')->get();

        $data = $request->all();

        foreach ($data['id'] as $key=>$val){
            $sku = Sku::find($val);
            $skus->product_id = $product_id;
            $skus->attribute_id = $data['attribute_id'][$key];
            $skus->value_id = $data['value_id'][$key];
            $skus->quantity = $data['quantity'][$key];
        }

        $skus->save();
        return redirect()->route('admin.modules.sku.index')->with('success','Update sku successfully');
    }

    public function attributeCreate()
    {
        return view('admin.modules.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function attributeStore(AttributeStoreRequest $request)
    {
        $attribute = new Attribute();

        $attribute->name = $request->name;

        $attribute->save();
        return redirect()->route('admin.attribute.create')->with('success','Create attribute successfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function attributeEdit(int $id)
    {   $attributes=Attribute::find($id);
        return view('admin.modules.attribute.edit',[
            'id'=>$id,
            'attribute'=>$attributes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function attributeUpdate(AttributeUpdateRequest $request, $id)
    {
        $attributes=Attribute::find($id);
        if($attributes==null){
            abort(404);
        }

        $attributes->name=$request->name;
        $attributes->save();
        return redirect()->route('admin.attribute.index')->with('success','Update attribute successfully');

    }

    // public function zipIndex()
    // {
    //     $zips = Zip::orderBy('created_at','DESC')->get();
    //     return view('admin.modules.zip.index',[
    //         'zips'=>$zips
    //     ]);
    // }


    // public function zipCreate()
    // {
    //     return view('admin.modules.zip.create');
    // }

    // public function zipStore(ZipStoreRequest $request)
    // {
    //     $zip = new zip();

    //     $zip->city = $request->city;
    //     $zip->zip = $request->zip;
    //     $zip->ship_cost = $request->ship_cost;
    //     $zip->status = $request->status;

    //     $zip->save();
    //     return redirect()->route('admin.zip.index')->with('success','Create postcode successfully');
    // }


    // public function zipEdit(int  $id)
    // {   
    //     $zips=zip::find($id);
    //     if($zips == null){
    //         abort(404);
    //     }


    //     return view('admin.modules.zip.edit',[
    //         'id'=>$id,
    //         'zip'=>$zips
    //     ]);
    // }


    // public function zipUpdate(ZipUpdateRequest $request, $id)
    // {
    //     $zips=zip::find($id);
    //     if($zips == null){
    //         abort(404);
    //     }

    //     $zips->city = $request->city;
    //     $zips->zip = $request->zip;
    //     $zips->ship_cost = $request->ship_cost;
    //     $zips->status = $request->status;

    //     $zips->save();
    //     return redirect()->route('admin.modules.zip.index')->with('success','Update postcode successfully');

    // }


    // public function zipDestroy(int $id)
    // {
    //     $zips = zip::find($id);
    //     if($zips==null){
    //         abort(404);
    //     }

    //     $zips->status = 2;
    //     $zips->delete();
    //     return redirect()->route('admin.modules.zip.index')->with('success','Delete postcode successfully');
    // }

}




