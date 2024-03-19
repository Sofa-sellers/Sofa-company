<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->orderBy('created_at', 'DESC')->get();
        return view('admin.modules.product.index', ['products' => $products]);
    }

    public function create()
    {
        $brands = Brand::get();
        return view('admin.modules.product.create', [
            'brands' => $brands
        ]);
    }

    public function store(StoreRequest $request)
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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
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

    public function update(UpdateRequest $request, string $id)
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

    public function destroy(string $id)
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
}
