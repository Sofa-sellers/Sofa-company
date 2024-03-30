@extends('admin.master')

@section('module', 'Product')
@section('action', 'Create')

@push('handlejs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var imageCount = 0;
        $( "#add-sku").click(function(){
            imageCount++;

            var newRow = `
            <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <img src="{{ asset('administrator/default-image.png') }}" width="100%" id="image-${imageCount}">
                </div>
                <div class="col-md-8">
                    <input type="file" name="images[]" class="form-control" data-image="${imageCount}">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 delete-image" data-image="${imageCount}">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>`;

            $(".sku-detail").append(newRow);
        })

        $(".sku-detail").on('click', '.delete-image', function(){
            var imageNumber = $(this).data("image")
            $("#image-" + imageNumber).closest(".row").remove();
        });

        $(".sku-detail").on('change', 'input[name="images[]"]', function(){
            var imageNumber = $(this).data("image")
            var file = this.files[0];

            if(file){
                var reader = new FileReader();
                reader.onload = function(e){
                    $("#image-" + imageCount).attr("src", e.target.result)
                }

                reader.readAsDataURL(file);
            }
        });

    })
</script>

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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customImage" name="image" accept="image/jpg,image/png,image/bmp,image/jpeg" value="{{ old('image') }}"/>
                            <label class="custom-file-label" for="customImage">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Product Slug</label>
                        <input type="text" class="form-control"  name="slug" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" name="intro">{{ old('intro') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter product price" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label>Sale price</label>
                        <input type="number" class="form-control" placeholder="Enter product sale price" name="sale_price" value="{{ old('sale_price') }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter product quantity" name="quantity" value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label>File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file" accept=".pdf" value="{{ old('file') }}">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="0" {{ old('category_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                            <option value="0" {{ old('brand_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hide</option>
                            <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Hot</option>
                            <option value="4" {{ old('status') == 4 ? 'selected' : '' }}>New</option>
                        </select>
                    </div>

                    <div class="form-group" >
                        <label>Attribute</label>
                        @foreach($attributes as $attribute)
                        <div style="display: flex; ">
                            <label>{{$attribute->name}}</label>
                           
                            @foreach (z as $value)
                            {{-- <div>{{$value}}</div> --}}
                            <div class="form-check" style="width: 100%; margin: 10px; text-align: right;">
                                <input class="form-check-input" type="checkbox" value="{{ $value->id }}" id="flexCheckDefault" name="value_id[]">
                                
                                    @if ($attribute->name == 'Color')
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{$value->value}}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                <circle cx="8" cy="8" r="8"/>
                                            </svg>
                                        </label>
                                    @elseif($attribute->name !== 'Color')
                                        <label class="form-check-label" for="flexCheckDefault">{{$value->value}}</label>
                                    @endif
                              </div>
                            @endforeach
                        </div>

                        @endforeach

                        {{-- <div style="display:flex">
                            <label>Material</label>
                           
                            @foreach ($materials as $material)
                            <div class="form-check" style="width: 100%; margin: 10px; text-align: right;">
                                <input class="form-check-input" type="checkbox" value="{{ old('material_id') == $material->id ? 'checked' : '' }}" id="flexCheckDefault" name="value_id[]">
                                
                              </div>
                            @endforeach                           
                        </div> --}}

                        </div>

                    <div class="sku-detail">
                        <div class="row">
                            <button type="button" class="btn btn-info w-100" id="add-sku">
                                <i class="fas fa-plus"></i> Add SKU detail
                            </button>
                        </div>
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
