<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Promotion\StoreRequest;
use App\Http\Requests\Admin\Promotion\UpdateRequest;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.promotion.index', ['promotions' => $promotions]);
    }

    public function create()
    {
        return view('admin.modules.promotion.create');
    }

    public function store(StoreRequest $request)
    {
        $promotion = new Promotion();

        $promotion->code = $request->code;
        $promotion->discount = $request->discount;

        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'Create promotion successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
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

    public function update(UpdateRequest $request, string $id)
    {
        $promotion = Promotion::find($id);
        if ($promotion == null) {
            abort(404);
        }

        $promotion->code = $request->code;
        $promotion->discount = $request->discount;

        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success', 'Update promotion successfully');
    }

    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);
        if ($promotion == null) {
            abort(404);
        }

        $promotion->delete();
        return redirect()->route('admin.promotion.index')->with('success', 'Deleted promotion successfully');
    }
}
