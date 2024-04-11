@extends('admin.master')
@section('module', 'Rating Comment')
@section('action', 'Edit')

@section('content')
<form method="POST" action="{{route('admin.ratingComment.update',['id'=>$ratingComment->id])}}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ $message }}
    </div>


    @elseif ($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Failed!</h5>
    {{ $message }}
    </div>
    @endif
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comment Edit</h3>

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
                        <input type="number" class="form-control disabled" name="product_id" value="{{old('product_id', $ratingComment->product_id)}}">
                    </div>

                    <div class="form-group">
                        <label>User ID</label>
                        <input type="number" class="form-control disabled"name="user_id" value="{{old('user_id', $ratingComment->user_id)}}">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" rows="3" placeholder="Enter comment" name="comment">{{old('comment', $ratingComment->comment)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ old('status',$ratingComment->status) == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ old('status',$ratingComment->status) == 2 ? 'selected' : '' }}>Hide</option>
                        </select>
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
