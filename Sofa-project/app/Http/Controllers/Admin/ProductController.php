<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->get();
        return view('admin.modules.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.modules.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $product = new Product();

        $file = $request->image;
        $fileName = time() . '-' . $file->getClientOriginalName();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->image = $fileName;
        $product->user_id = 1;
        $product->save();
        $file->move(public_path('uploads/'), $fileName);
        return redirect()->route('admin.product.index')->with('success', 'create product successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            abort(404);
        }
        $file = $request->image;
        if (!empty($file)) {

            $request->validate(
                [
                    'image' => 'required|mimes:jpg,png,bmp,jpeg',

                ],
                [
                    'image.required' => 'xin vui lòng úp hình ảnh',
                    'image.mimes' => 'hình ảnh phải có đuôi jpg,png,bmp,jpeg'
                ]
            );
            $old_image_path = public_path('uploads/' . $product->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $product->image = $fileName;
            $file->move(public_path('uploads/'), $fileName);
        }



        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->user_id = 1;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'update product successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
        return redirect()->route('admin.product.index')->with('success', 'deleted product successfully');
    }
}