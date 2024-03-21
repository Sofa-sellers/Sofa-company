<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\RatingComment;
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

class AdminController extends Controller
{
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
        return view('admin.modules.user.edit', ['user' => $user]);
    }
    
    public function userUpdate(UserUpdateRequest $request, string $id)
    {
        $user = User::find($id);
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
        return redirect()->route('admin.category.index')->with('success','create category successfully');
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
        return redirect()->route('admin.category.index')->with('success','create category successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function cateDestroy(int $id)
    {
        $categories = Category::find($id);
        if($categories==null){
            abort(404);
        }
 
        $categories->delete();
        return redirect()->route('admin.category.index')->with('success','deleted category successfully');
    }

    public function productIndex()
    {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->get();
        return view('admin.modules.product.index', ['products' => $products]);
    }

    public function productCreate()
    {
        $categories = Category::get();
        return view('admin.modules.product.create', [
            'categories' => $categories
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
    
        $product->name = $request->name ?? 'Default Name';
        $product->intro = $request->intro;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->user_id = 1;
        $product->status = $request->status;
        $product->save();
    
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
    
        $product = Product::find($id);
        if ($product == null) {
            abort(404);
        }
    
        $file = $request->file;
        if (!empty($file)) {
            $old_file_path = public_path('uploads/' . $product->file);
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $product->file = $fileName;
        }
    
        $image = $request->image;
        if (!empty($image)) {
            $old_image_path = public_path('uploads/' . $product->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $imageName);
            $product->image = $imageName;
        }
    
        $product->name = $request->name ?? 'Default Name';
        $product->intro = $request->intro;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->user_id = 1;
        $product->status = $request->status;
        $product->save();
    
        return redirect()->route('admin.product.index')->with('success', 'update product successfully');
    }

    public function productDestroy(string $id)
    {
        $products = Product::find($id);
        if ($products == null) {
            abort(404);
        }
        $old_image_path = public_path('uploads/' . $products->product_image);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        if ($products == null) {
            abort(404);
        }

        $products->delete();
        return redirect()->route('admin.product.index')->with('success', 'deleted product successfully');
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
        $promotion = Promotion::find($id);
        if ($promotion == null) {
            abort(404);
        }
        return view('admin.modules.promotion.edit', [
            'id' => $id,
            'promotion' => $promotion
        ]);
    }

    public function promotionUpdate(PromotionUpdateRequest $request, string $id)
    {
        $promotion = Promotion::find($id);
        if ($promotion == null) {
            abort(404);
        }

        $promotion->code = $request->code;
        $promotion->description = $request->description;
        $promotion->discount_percent = $request->discount_percent;
        $promotion->date_start = $request->date_start;
        $promotion->date_end = $request->date_end;
        $promotion->status = $request->status;

        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'Update promotion successfully');
    }

    public function promotionDestroy(string $id)
    {
        $promotion = Promotion::find($id);
        if ($promotion == null) {
            abort(404);
        }

        $promotion->delete();
        return redirect()->route('admin.promotion.index')->with('success', 'Deleted promotion successfully');
    }
}