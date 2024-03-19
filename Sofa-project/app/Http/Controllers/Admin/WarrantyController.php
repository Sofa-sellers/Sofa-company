<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Warranty\StoreRequest;
use App\Http\Requests\Admin\Warranty\UpdateRequest;
use App\Models\Warranty;

class WarrantyController extends Controller
{
    public function index()
    {
        $warranties = Warranty::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.warranty.index', ['warranties' => $warranties]);
    }

    public function create()
    {
        return view('admin.modules.warranty.create');
    }

    public function store(StoreRequest $request)
    {
        $warranty = new Warranty();

        $warranty->order_id = $request->order_id;
        $warranty->product_id = $request->product_id;
        $warranty->quantity = $request->quantity;
        $warranty->delivery_date = $request->delivery_date;
        $warranty->status = $request->status;
        $warranty->end_day = $request->end_day;

        $warranty->save();

        return redirect()->route('admin.warranty.index')->with('success', 'Create warranty successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $warranty = Warranty::find($id);
        if ($warranty == null) {
            abort(404);
        }
        return view('admin.modules.warranty.edit', [
            'id' => $id,
            'warranty' => $warranty
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $warranty = Warranty::find($id);
        if ($warranty == null) {
            abort(404);
        }

        $warranty->order_id = $request->order_id;
        $warranty->product_id = $request->product_id;
        $warranty->quantity = $request->quantity;
        $warranty->delivery_date = $request->delivery_date;
        $warranty->status = $request->status;
        $warranty->end_day = $request->end_day;

        $warranty->save();

        return redirect()->route('admin.warranty.index')->with('success', 'Update warranty successfully');
    }

    public function destroy(string $id)
    {
        $warranty = Warranty::find($id);
        if ($warranty == null) {
            abort(404);
        }

        $warranty->delete();
        return redirect()->route('admin.warranty.index')->with('success', 'Deleted warranty successfully');
    }
}
