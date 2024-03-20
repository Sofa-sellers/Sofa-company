<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class AdminController extends Controller
{
    public function cateIndex()
    {
        $brands=Brand::orderBy('created_at','DESC')->get();
        return view('admin.modules.brand.index',[
            'brands'=>$brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cateCreate()
    {
        return view('admin.modules.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cateStore(StoreRequest $request)
    {
        $brand = new brand();
 
        $brand->name = $request->name;
        $brand->status = $request->status;
 
        $brand->save();
        return redirect()->route('admin.brand.index')->with('success','create brand successfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function cateEdit(int  $id)
    {   $brands=Brand::find($id);
        return view('admin.modules.brand.edit',[
            'id'=>$id,
            'brand'=>$brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function cateUpdate(UpdateRequest $request, $id)
    {
        $brands=Brand::find($id);
        if($brands==null){
            abort(404);
        }
 
        $brands->name=$request->name;
        $brands->save();
        return redirect()->route('admin.brand.index')->with('success','create brand successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function cateDestroy(int $id)
    {
        $brands = Brand::find($id);
        if($brands==null){
            abort(404);
        }
 
        $brands->delete();
        return redirect()->route('admin.brand.index')->with('success','deleted brand successfully');
    }

    public function productIndex()
    {
        $products = Product::with('brand')->orderBy('created_at', 'DESC')->get();
        return view('admin.modules.product.index', ['products' => $products]);
    }

    public function productCreate()
    {
        $brands = Brand::get();
        return view('admin.modules.product.create', [
            'brands' => $brands
        ]);
    }

    public function productStore(StoreRequest $request)
    {
        $product = new Product();

        $file = $request->product_image;
        $fileName = time() . '-' . $file->getClientOriginalName();

        $product->name = $request->name;
        $product->intro = $request->intro;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->isHot = $request->isHot;
        $product->isNew = $request->isNew;
        $product->document = $request->document;
        $product->product_image = $fileName;
        $product->user_id = 1;
        $product->save();
        $file->move(public_path('uploads/'), $fileName);
        return redirect()->route('admin.product.index')->with('success', 'Create product successfully');
    }

    public function productEdit(string $id)
    {
        $brands = Brand::get();
        $products = Product::find($id);
        if ($products == null) {
            abort(404);
        }
        return view('admin.modules.product.edit', [
            'id' => $id,
            'brands' => $brands,
            'product' => $products
        ]);
    }

    public function productUpdate(UpdateRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            abort(404);
        }
        $file = $request->product_image;
        if (!empty($file)) {

            $request->validate(
                [
                    'product_image' => 'required|mimes:jpg,png,bmp,jpeg',

                ],
                [
                    'product_image.required' => 'xin vui lòng úp hình ảnh',
                    'product_image.mimes' => 'hình ảnh phải có đuôi jpg,png,bmp,jpeg'
                ]
            );
            $old_image_path = public_path('uploads/' . $product->product_image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $product->product_image = $fileName;
            $file->move(public_path('uploads/'), $fileName);
        }

        $product->name = $request->name;
        $product->intro = $request->intro;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->isHot = $request->isHot;
        $product->isNew = $request->isNew;
        $product->document = $request->document;
        $product->user_id = 1;
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

    public function racomIndex()
    {
        $ratingComments = RatingComment::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.ratingComment.index', ['ratingComments' => $ratingComments]);
    }



    public function racomStore(StoreRequest $request)
    {
        $ratingComment = new RatingComment();

        $ratingComment->product_id = $request->product_id;
        $ratingComment->user_id = $request->user_id;
        $ratingComment->rating = $request->rating;
        $ratingComment->comment = $request->comment;

        $ratingComment->save();

        return redirect()->route('admin.ratingComment.index')->with('success', 'Create rating comment successfully');
    }

    public function userIndex()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.user.index', ['users' => $users]);
    }

    public function useCreate()
    {
        return view('admin.modules.user.create');
    }

    public function userStore(StoreRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Create user successfully');
    }



    public function userEdit(string $id)
    {
        return view('admin.modules.user.edit');
    }

    public function userUpdate(UpdateRequest $request, string $id)
    {
        //
    }

    public function userDestroy(string $id)
    {
        //
    }
}
