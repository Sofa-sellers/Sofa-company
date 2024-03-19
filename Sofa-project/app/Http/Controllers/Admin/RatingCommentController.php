<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RatingComment\StoreRequest;
use App\Http\Requests\Admin\RatingComment\UpdateRequest;
use App\Models\RatingComment;

class RatingCommentController extends Controller
{
    public function index()
    {
        $ratingComments = RatingComment::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.ratingComment.index', ['ratingComments' => $ratingComments]);
    }

    public function create()
    {
        return view('admin.modules.ratingComment.create');
    }

    public function store(StoreRequest $request)
    {
        $ratingComment = new RatingComment();

        $ratingComment->product_id = $request->product_id;
        $ratingComment->user_id = $request->user_id;
        $ratingComment->rating = $request->rating;
        $ratingComment->comment = $request->comment;

        $ratingComment->save();

        return redirect()->route('admin.ratingComment.index')->with('success', 'Create rating comment successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $ratingComment = RatingComment::find($id);
        if ($ratingComment == null) {
            abort(404);
        }
        return view('admin.modules.ratingComment.edit', [
            'id' => $id,
            'ratingComment' => $ratingComment
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $ratingComment = RatingComment::find($id);
        if ($ratingComment == null) {
            abort(404);
        }

        $ratingComment->product_id = $request->product_id;
        $ratingComment->user_id = $request->user_id;
        $ratingComment->rating = $request->rating;
        $ratingComment->comment = $request->comment;

        $ratingComment->save();

        return redirect()->route('admin.ratingComment.index')->with('success', 'Update rating comment successfully');
    }

    public function destroy(string $id)
    {
        $ratingComment = RatingComment::find($id);
        if ($ratingComment == null) {
            abort(404);
        }

        $ratingComment->delete();
        return redirect()->route('admin.ratingComment.index')->with('success', 'Deleted rating comment successfully');
    }
}
