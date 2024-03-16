<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::orderBy('created_at','DESC')->get();
        return view('admin.modules.category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
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
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int  $id)
    {   $categories=Category::find($id);
        return view('admin.modules.category.edit',[
            'id'=>$id,
            'category'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $categories=Category::find($id);
        if($categories==null){
            abort(404);
        }
 
        $categories->name=$request->name;
        $categories->status = $request->status;
        $categories->save();
        return redirect()->route('admin.category.index')->with('success','create category successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $categories = Category::find($id);
        if($categories==null){
            abort(404);
        }
 
        $categories->delete();
        return redirect()->route('admin.category.index')->with('success','deleted category successfully');
    }
}
