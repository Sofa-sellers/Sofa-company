<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RatingReview;
use App\Http\Requests\Admin\RatingReview\StoreRequest;
use App\Http\Requests\Admin\RatingReview\UpdateRequest;

class RatingReviewController extends Controller
{
    public function index()
    {
        $ratingReview = RatingComment::all();
        return view('admin.modules.ratingReview.index', compact('ratingReview'));
    }

    public function create()
    {
        return view('admin.modules.ratingReview.create');
    }

    public function store(StoreRequest $request)
    {
        $ratingReview = new RatingReview;
        $ratingReview->product_id = $request->product_id;
        $ratingReview->user_id = $request->user_id;
        $ratingReview->rating = $request->rating;
        $ratingReview->comment = $request->comment;
        $ratingReview->save();

        return redirect()->route('admin.ratingReview.index')->with('success', 'create rating comment successfully');
    }

    public function edit($id)
    {
        $ratingReview = RatingReview::findOrFail($id);
        return view('admin.modules.ratingReview.edit', compact('ratingReview'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $ratingReview = RatingReview::findOrFail($id);
        $ratingReview->product_id = $request->product_id;
        $ratingReview->user_id = $request->user_id;
        $ratingReview->rating = $request->rating;
        $ratingReview->comment = $request->comment;
        $ratingReview->save();

        return redirect()->route('admin.ratingReview.index')->with('success', 'update rating comment successfully');
    }

    public function destroy($id)
    {
        $ratingReview = RatingReview::findOrFail($id);
        $ratingReview->delete();

        return redirect()->route('admin.ratingReview.index')->with('success', 'deleted rating comment successfully');
    }
}
