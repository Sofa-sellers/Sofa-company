<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warranty;
use App\Http\Requests\Admin\Warranty\StoreRequest;
use App\Http\Requests\Admin\Warranty\UpdateRequest;

class WarrantyController extends Controller
{
    public function index()
    {
        $warranties = Warranty::all();
        return view('admin.modules.warranty.index', compact('warranty'));
    }

    public function create()
    {
        return view('admin.modules.warranty.create');
    }

    public function store(StoreRequest $request)
    {
        $warranty = new Warranty;
        $warranty->order_id = $request->order_id;
        $warranty->product_id = $request->product_id;
        $warranty->quantity = $request->quantity;
        $warranty->delivery_date = $request->delivery_date;
        $warranty->status = $request->status;
        $warranty->end_day = $request->end_day;
        $warranty->save();

        return redirect()->route('admin.warranty.index')->with('success', 'create warranty successfully');
    }

    public function edit($id)
    {
        $warranty = Warranty::findOrFail($id);
        return view('admin.modules.warranty.edit', compact('warranty'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $warranty = Warranty::findOrFail($id);
        $warranty->order_id = $request->order_id;
        $warranty->product_id = $request->product_id;
        $warranty->quantity = $request->quantity;
        $warranty->delivery_date = $request->delivery_date;
        $warranty->status = $request->status;
        $warranty->end_day = $request->end_day;
        $warranty->save();

        return redirect()->route('admin.warranty.index')->with('success', 'update warranty successfully');
    }

    public function destroy($id)
    {
        $warranty = Warranty::findOrFail($id);
        $warranty->delete();

        return redirect()->route('admin.warranty.index')->with('success', 'deleted warranty successfully');
    }
}
