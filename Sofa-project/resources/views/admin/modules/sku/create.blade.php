@extends('admin.master')
@section('module' ,'SKU')
@section('action','Create')  


@section('content')
    <!-- Default box -->
    <form action="{{ route('admin.sku.store')}}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">SKU Create</h3>
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
                @csrf
                <div class="form-group value-color">
                    <label for="exampleInputEmail1">{{$product->name}}</label>
                    <input type="text" class="form-control" name="product_id" value="{{$product->id}}" disabled>
                  </div>

                <div class="form-group">
                    <label>Color</label>
                    <select class="form-control" id="inputAttribute" name="color_id">
                        @foreach ($colors as $c)
                        <option value="{{ $c->id }}" {{ old('color_id') == $c->id ? 'selected' : '' }} style="background:{{$c->value}}">{{ $c->value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Material</label>
                    <select class="form-control" id="inputAttribute" name="material_id">
                        @foreach ($materials as $m)
                        <option value="{{ $m->id }}" {{ old('material_id') == $m->id ? 'selected' : '' }} style="background:{{$m->value}}">{{ $m->value }}</option>
                        @endforeach
                    </select>
                </div>

                  <div class="form-group value-color">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" class="form-control" placeholder="Enter quantity" name="quantity" value="{{old('quantity')}}">
                  </div>

                  <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customImage" name="image" accept="image/jpg,image/png,image/bmp,image/jpeg" value="{{ old('image') }}"/>
                        <label class="custom-file-label" for="customImage">Choose file</label>
                    </div>
                </div>

                  {{-- <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{old('status')== 1? 'selected':' '}}>Show</option>
                        <option value="2" {{old('status')== 2? 'selected':' '}}>Hide</option>
                    </select>
                  </div> --}}
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create SKU</button>
                  </div>
            </form>
            
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script>
        // $(document).ready(function() {
            $('#inputAttribute').change(function(event) {
              
                var input = $(this).val(); 
                
                if (input == 1) {
                    $('.value-color').show();
                    $('.value-material').hide();
                } else if (input == 2){
                    $('.value-color').hide();
                    $('.value-material').show();
                }
            });
        // });
    </script> --}}
@endsection