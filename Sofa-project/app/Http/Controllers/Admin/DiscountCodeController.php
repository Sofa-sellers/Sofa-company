<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DiscountCode\StoreRequest;
use App\Http\Requests\Admin\DiscountCode\UpdateRequest;
use App\Models\Promotion;

class DiscountCodeController extends Controller
{
    public function index()
    {
        $promotion = Promotion::all();
        return view('admin.modules.promotion.index', compact('promotion'));
    }

    public function create()
    {
        return view('admin.modules.promotion.create');
    }

    public function store(StoreRequest $request)
    {
        $promotion = new Promotion;
        $promotion->code = $request->code;
        $promotion->discount = $request->discount;
        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'create promotion successfully');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.modules.promotion.edit', compact('promotion'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->code = $request->code;
        $promotion->discount = $request->discount;
        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'update promotion successfully');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.promotion.index')->with('success', 'deleted promotion successfully');
    }
}
