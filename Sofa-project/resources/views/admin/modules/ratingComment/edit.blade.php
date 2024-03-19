@extends('admin.master')

@section('module', 'Rating Comment')
@section('action', 'Edit')

@section('content')
<form method="post" action="{{ route('admin.ratingComment.update', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rating Comment Edit</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Product ID</label>
                        <input type="number" class="form-control" placeholder="Enter product id" name="product_id" value="{{old('product_id', $ratingComment->product_id)}}">
                    </div>

                    <div class="form-group">
                        <label>User ID</label>
                        <input type="number" class="form-control" placeholder="Enter user id" name="user_id" value="{{old('user_id', $ratingComment->user_id)}}">
                    </div>

                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" class="form-control" placeholder="Enter rating" name="rating" value="{{old('rating', $ratingComment->rating)}}">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" rows="3" placeholder="Enter comment" name="comment">{{old('comment', $ratingComment->comment)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection
