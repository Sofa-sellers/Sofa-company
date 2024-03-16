@extends('admin.master')

@section('module', 'Product')
@section('action', 'Create')

@section('content')
<form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Create</h3>

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
                        <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter product price" name="price"value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content">{{old('content')}}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                          <option value="0" {{old('category_id')==0?'selected' : ''}}>----- Root -----</option>
                          @foreach ($categories as $caterory)
                          <option value="{{$caterory->id}}" {{old('category_id')==$caterory->id?'selected' : ''}}>{{$caterory->name}}</option>
                          @endforeach  
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status')==1?'selected' : ''}}>Show</option>
                            <option value="2" {{old('status')==2?'selected' : ''}}>Hidden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Featured</label>
                        <select class="form-control" name="featured">
                            <option value="1" {{old('featured')==1?'selected' : ''}}>UnFeatured</option>
                            <option value="2" {{old('featured')==2?'selected' : ''}}>Featured</option>
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
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection