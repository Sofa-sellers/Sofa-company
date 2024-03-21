@extends('admin.master')

@section('module', 'Product')
@section('action', 'Edit')

@section('content')
<form method="post" action="{{ route('admin.product.update', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Edit</h3>

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
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{old('name', $product->name)}}">
                    </div>

                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" name="intro">{{old('intro', $product->intro)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{old('description', $product->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter product price" name="price" value="{{old('price', $product->price)}}">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter product quantity" name="quantity" value="{{old('quantity', $product->quantity)}}">
                    </div>

                    <div class="form-group">
                        <label>File</label>
                        <input type="text" class="form-control" placeholder="Enter file" name="file" value="{{old('file', $product->file)}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                          <option value="0" {{old('category_id', $product->category_id)==0?'selected' : ''}}>----- Root -----</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{old('category_id', $product->category_id)==$category->id?'selected' : ''}}>{{$category->name}}</option>
                          @endforeach  
                        </select>
                    </div>

                    <div class="form-group">
                        <label>User</label>
                        <select class="form-control" name="user_id">
                          <option value="0" {{old('user_id', $product->user_id)==0?'selected' : ''}}>----- Root -----</option>
                          @foreach ($users as $user)
                          <option value="{{$user->id}}" {{old('user_id', $product->user_id)==$user->id?'selected' : ''}}>{{$user->name}}</option>
                          @endforeach  
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status', $product->status)==1?'selected' : ''}}>Show</option>
                            <option value="2" {{old('status', $product->status)==2?'selected' : ''}}>Hide</option>
                            <option value="3" {{old('status', $product->status)==3?'selected' : ''}}>Hot</option>
                            <option value="4" {{old('status', $product->status)==4?'selected' : ''}}>New</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image"/>
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
