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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customImage" name="image" accept="image/jpg,image/png,image/bmp,image/jpeg"/>
                            <label class="custom-file-label" for="customImage">Choose file</label>
                        </div>
                        @if($product->image)
                            <img src="{{ asset('uploads/' . $product->image) }}" alt="Product Image" width='200px' height='200px'>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" name="intro">{{ old('intro', $product->intro) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter product price" name="price" value="{{ old('price', $product->price) }}">
                    </div>

                    <div class="form-group">
                        <label>Sale price</label>
                        <input type="number" class="form-control" placeholder="Enter product sale price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter product quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                    </div>

                    <div class="form-group">
                        <label>File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file" accept=".pdf">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @if($product->file)
                            <a href="{{ asset('uploads/' . $product->file) }}" target="_blank">Directions for use</a>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="0" {{ old('category_id', $product->category_id) == 0 ? 'selected' : '' }}>----- Root -----</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ old('status', $product->status) == 2 ? 'selected' : '' }}>Hide</option>
                            <option value="3" {{ old('status', $product->status) == 3 ? 'selected' : '' }}>Hot</option>
                            <option value="4" {{ old('status', $product->status) == 4 ? 'selected' : '' }}>New</option>
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

<!-- JavaScript to update custom file label -->
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;
        });
    });
</script>
@endsection
