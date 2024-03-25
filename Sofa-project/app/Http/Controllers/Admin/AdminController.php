<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AttributeValue;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\RatingComment;
use App\Models\Sku;
use App\Models\Brand;

use App\Http\Requests\Admin\User\StoreRequest as UserStoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest as UserUpdateRequest;
use App\Http\Requests\Admin\Category\StoreRequest as CategoryStoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest as CategoryUpdateRequest;
use App\Http\Requests\Admin\Product\StoreRequest as ProductStoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest as ProductUpdateRequest;
use App\Http\Requests\Admin\Promotion\StoreRequest as PromotionStoreRequest;
use App\Http\Requests\Admin\Promotion\UpdateRequest as PromotionUpdateRequest;
use App\Http\Requests\Admin\RatingComment\StoreRequest as RatingCommentStoreRequest;
use App\Http\Requests\Admin\RatingComment\UpdateRequest as RatingCommentUpdateRequest;
use App\Http\Requests\Admin\Brand\StoreRequest as BrandStoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest as BrandUpdateRequest;
use App\Http\Requests\Admin\Attribute\StoreRequest as AttributeStoreRequest;
use App\Http\Requests\Admin\Attribute\UpdateRequest as AttributeUpdateRequest;
use App\Http\Requests\Admin\Value\StoreRequest as ValueStoreRequest;
use App\Http\Requests\Admin\Value\UpdateRequest as ValueUpdateRequest;
use App\Models\ProductImages;

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
        $users = User::find($id);
        $users->username = $request->username;
        $users->password = bcrypt($request->password);
        $users->email = $request->email;
        $users->status = $request->status;
        $users->level = $request->level;
        $users->firstname = $request->firstname;
        $users->lastname = $request->lastname;
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->save();
    
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
        return view('admin.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cateStore(CategoryStoreRequest $request)
    {
        $category = new category();
 
        $category->name = $request->name;
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
    public function cateEdit(int  $id)
    {   $categories=Category::find($id);
        return view('admin.modules.category.edit',[
            'id'=>$id,
            'category'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function cateUpdate(CategoryUpdateRequest $request, $id)
    {
        $categories=Category::find($id);
        if($categories==null){
            abort(404);
        }
 
        $categories->name=$request->name;
        $categories->save();
        return redirect()->route('admin.category.index')->with('success','Update category successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function cateDestroy(int $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            abort(404);
        }
        
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
        $brands = Brand::get();
        return view('admin.modules.product.create', [
            'categories' => $categories,
            'brands' => $brands
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

        $size = $request->size;
        $sizeImage = time() . '-' . $size->getClientOriginalName();
        $size->move(public_path('uploads/'), $sizeImage);
        $product->size = $sizeImage;
    
        $product->name = $request->name;
        $product->name = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->save();

        if(count($request->images) > 0){
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


        return redirect()->route('admin.product.index')->with('success', 'Create product successfully');
    }
    

    public function productEdit(string $id)
    {
        $categories = Category::get();
        $products = Product::find($id);
        if ($products == null) {
            abort(404);
        }
        return view('admin.modules.product.edit', [
            'id' => $id,
            'categories' => $categories,
            'product' => $products
        ]);
    }

    public function productUpdate(ProductUpdateRequest $request, string $id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);
    
        $products = Product::find($id);
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
        $products->name = $request->slug;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->sale_price = $request->sale_price;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->status = $request->status;
        $products->save();
    
        return redirect()->route('admin.product.index')->with('success', 'Update product successfully');
    }

    public function productDestroy(string $id)
    {
        $products = Product::find($id);
        if ($products == null) {
            abort(404);
        }
        $old_image_path = public_path('uploads/' . $products->image);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        if ($products == null) {
            abort(404);
        }

        $products->delete();
        return redirect()->route('admin.product.index')->with('success', 'Deleted product successfully');
    }

    public function orderIndex()
    {
        return view('admin.modules.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function orderStore(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function orderEdit($id)
    {
        return view('admin.modules.order.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function orderUpdate(UpdateRequest $request, $id)
    {
        //
    }

    public function orderDestroy()
    {
        //
    }

    public function racomIndex()
    {
        $ratingComments = RatingComment::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.ratingComment.index', ['ratingComments' => $ratingComments]);
    }



    public function racomAccept(StoreRequest $request)
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

    public function promotionIndex()
    {
        $promotions = Promotion::orderBy('created_at', 'DESC')->get();
        $product = Product::first();
        return view('admin.modules.promotion.index', ['promotions' => $promotions, 'product' => $product]);
    }    

    public function promotionCreate()
    {
        return view('admin.modules.promotion.create');
    }

    public function promotionStore(PromotionStoreRequest $request)
    {
        $promotion = new Promotion();

        $promotion->code = $request->code;
        $promotion->description = $request->description;
        $promotion->discount_percent = $request->discount_percent;
        $promotion->date_start = $request->date_start;
        $promotion->date_end = $request->date_end;
        $promotion->status = $request->status;

        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'Create promotion successfully');
    }

    public function promotionEdit(string $id)
    {
        $promotions = Promotion::find($id);
        if ($promotions == null) {
            abort(404);
        }
        return view('admin.modules.promotion.edit', [
            'id' => $id,
            'promotion' => $promotions
        ]);
    }

    public function promotionUpdate(PromotionUpdateRequest $request, string $id)
    {
        $promotions = Promotion::find($id);
        if ($promotions == null) {
            abort(404);
        }

        $promotions->code = $request->code;
        $promotions->description = $request->description;
        $promotions->discount_percent = $request->discount_percent;
        $promotions->date_start = $request->date_start;
        $promotions->date_end = $request->date_end;
        $promotions->status = $request->status;

        $promotions->save();

        return redirect()->route('admin.promotion.index')->with('success', 'Update promotion successfully');
    }

    public function promotionDestroy(string $id)
    {
        $promotions = Promotion::find($id);
        if ($promotions == null) {
            abort(404);
        }

        $promotions->delete();
        return redirect()->route('admin.promotion.index')->with('success', 'Deleted promotion successfully');
    }

    public function attributeIndex()
    {
        $attributes=Attribute::orderBy('created_at','DESC')->get();
        return view('admin.modules.attribute.index',[
            'attributes'=>$attributes
        ]);
    }

    
    public function attributeCreate()
    {
        return view('admin.modules.attribute.create');
    }

    
    public function attributeStore(AttributeStoreRequest $request)
    {
        $attribute = new attribute();
 
        $attribute->name = $request->name;
        $attribute->status = $request->status;
 
        $attribute->save();
        return redirect()->route('admin.attribute.index')->with('success','Create attribute successfully');
    }

    
    public function attributeEdit(int  $id)
    {   $attributes=Attribute::find($id);
        return view('admin.modules.attribute.edit',[
            'id'=>$id,
            'attribute'=>$attributes
        ]);
    }

    
    public function attributeUpdate(AttributeUpdateRequest $request, $id)
    {
        $attributes=Attribute::find($id);
        if($attributes == null){
            abort(404);
        }
 
        $attributes->name = $request->name;
        $attributes->update();
        return redirect()->route('admin.attribute.index')->with('success','Update attribute successfully');

    }

    
    public function attributeDestroy(int $id)
    {
        $attributes = Attribute::find($id);
        if($attributes==null){
            abort(404);
        }
 
        $attributes->delete();
        return redirect()->route('admin.attribute.index')->with('success','Delete attribute successfully');
    }


    public function valueIndex()
    {
        $values = AttributeValue::orderBy('created_at','DESC')->get();
        return view('admin.modules.value.index',[
            'values'=>$values
        ]);
    }

    
    public function valueCreate()
    {
        $data = AttributeValue::get();
        
        return view('admin.modules.value.create', ['attributes' => $data]);
    }


    public function valueStore(ValueStoreRequest $request)
    {
        $value = new AttributeValue();
 
        $value->name = $request->name;
        $value->attribute_id = $request->attribute_id;
        $value->status = $request->status;
 
        $value->save();
        return redirect()->route('admin.value.index')->with('success','Create value of attribute successfully');
    }


    public function valueEdit(int  $id)
    {   $values = AttributeValue::find($id);
        $data = Attribute::get();
        
        return view('admin.modules.value.edit',[
            'id'=>$id,
            'value'=>$values,
            'attributes' => $data
        ]);
    }

    
    public function valueUpdate(ValueUpdateRequest $request, $id)
    {
        $values= AttributeValue::find($id);
        if($values==null){
            abort(404);
        }
 
        $values->name = $request->name;
        $values->attribute_id = $request->attribute_id;
        $values->status = $request->status;

        $values->update();
        return redirect()->route('admin.value.index')->with('success','Update value of attribute successfully');

    }

    
    public function valueDestroy(int $id)
    {
        $values= AttributeValue::find($id);
        if($values==null){
            abort(404);
        }
 
        $values->delete();
        return redirect()->route('admin.value.index')->with('success','Delete value of attribute successfully');
    }

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
 
        $brands->deletes();
        return redirect()->route('admin.brand.index')->with('success','Delete brand successfully');
    }
}
