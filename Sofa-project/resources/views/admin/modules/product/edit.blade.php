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
                        <label>Dimension</label>
                        <select class="form-control" name="dimension_id">
                        <option value="0" {{ old('dimension_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                        @foreach ($dimensions as $d)
                        <option value="{{ $d->id }}" {{ old('dimension_id', $product->dimension_id) == $product->dimension_id ? 'selected' : '' }}>{{ $d->value }}</option>
                        {{$dimensions}}
                        @endforeach
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Material</label>
                        <select class="form-control" name="material_id">
                        <option value="0" {{ old('material_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                        @foreach ($materials as $m)
                        <option value="{{ $m->id }}" {{ old('material_id', $product->material_id) == $product->material_id ? 'selected' : '' }}>{{ $m->value }}</option>
                        @endforeach
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" name="intro">{{ old('intro', $product->intro) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <textarea class="form-control" name="slug">{{ old('intro', $product->slug) }}</textarea>
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
                            @php
                                recursiveCategory($categories, old('category_id', $product->category_id));
                            @endphp
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                            <option value="0" {{ old('brand_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                            @php
                                recursiveCategory($brands, old('brand_id', $product->brand_id));
                            @endphp
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Is_sale</label>
                        <select class="form-control" name="is_sale">
                        <option value="1" {{ old('is_sale', $product->is_sale) == 1 ? 'selected' : '' }}>Sale</option>
                        <option value="2" {{ old('is_sale', $product->is_sale) == 2 ? 'selected' : '' }}>Not sale</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Featured</label>
                        <select class="form-control" name="featured">
                        <option value="1" {{ old('featured', $product->featured) == 1 ? 'selected' : '' }}>Featured</option>
                        <option value="2" {{ old('featured', $product->featured) == 2 ? 'selected' : '' }}>Unfeatured</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ old('status', $product->status) == 2 ? 'selected' : '' }}>Hide</option>
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
