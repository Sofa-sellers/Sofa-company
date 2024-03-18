@extends('admin.master')

@section('module', 'Rating Review')
@section('action', 'Create')

@section('content')
<form method="post" action="{{ route('admin.ratingReview.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rating Review Create</h3>

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
                        <label>Rating</label>
                        <input type="number" class="form-control" placeholder="Enter rating" name="rating" value="{{old('rating')}}">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" name="comment">{{old('comment')}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection
