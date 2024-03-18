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
                        <label>Intro</label>
                        <textarea class="form-control" name="intro">{{old('intro')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Document</label>
                        <input type="text" class="form-control" placeholder="Enter document" name="document" value="{{old('document')}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                          <option value="0" {{old('brand_id')==0?'selected' : ''}}>----- Root -----</option>
                          @foreach ($brands as $brand)
                          <option value="{{$brand->id}}" {{old('brand_id')==$brand->id?'selected' : ''}}>{{$brand->name}}</option>
                          @endforeach  
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status')==1?'selected' : ''}}>Show</option>
                            <option value="0" {{old('status')==0?'selected' : ''}}>Hidden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Is Hot</label>
                        <select class="form-control" name="isHot">
                            <option value="1" {{old('isHot')==1?'selected' : ''}}>Hot</option>
                            <option value="0" {{old('isHot')==0?'selected' : ''}}>Not Hot</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Is New</label>
                        <select class="form-control" name="isNew">
                            <option value="1" {{old('isNew')==1?'selected' : ''}}>New</option>
                            <option value="0" {{old('isNew')==0?'selected' : ''}}>Not New</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="product_image"/>
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
