@extends('admin.master')
@section('module' ,'Value')
@section('action','Create')  


@section('content')
    <!-- Default box -->
    <form action="{{route('admin.value.store')}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Value of Attribute Create</h3>
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
                <div class="form-group">
                  <label>Attribute</label>
                  <select class="form-control" id="inputAttribute" name="attribute_id">
                      <option value="0" {{ old('attribute_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                      @foreach ($attributes as $attr)
                      <option value="{{ $attr->id }}" {{ old('attribute_id') == $attr->id ? 'selected' : '' }}>{{ $attr->name }}</option>
                      @endforeach
                  </select>
              </div>

                <div class="form-group value-color">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="color" class="form-control" placeholder="Enter value color" name="color" value="{{old('color')}}" >
                  </div>

                  
                  <div class="form-group value-dimension">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="text" class="form-control" placeholder="Enter value dimension" name="dimension" value="{{old('dimension')}}" pattern="^(?!0+$)(?:(?:(?:500|[1-9]\d{0,2}) x ){2}(?:300|[1-2]?\d{1,2}))$" title="Please enter the correct format: length x width x height (a x b x c), with a, b, c greater than 0, and a, b < 500, c < 300.">
                  </div>

                  <div class="form-group value-material" >
                    <label for="exampleInputEmail1">Value</label>
                    <input type="text" class="form-control" placeholder="Enter value material" name="material" value="{{old('material')}}">
                  </div>

                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{old('status')== 1? 'selected':' '}}>Show</option>
                        <option value="2" {{old('status')== 2? 'selected':' '}}>Hide</option>
                    </select>
                  </div>
                  {{-- <div class="field_wrapper">
                    <div>
                        <input type="text" name="field_name[]" value=""/>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="images/add-icon.png"/></a>
                    </div>
                </div> --}}
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Value of Attribute</button>
                  </div>
            </form>
            
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script>
        $(document).ready(function() {
          $('.value-color, .value-dimension, .value-material').hide();
            $('#inputAttribute').change(function(event) {
                var input = $(this).val(); 
                if (input == 1) {
                    $('.value-color').show();
                    $('.value-dimension').hide();
                    $('.value-material').hide();
                } else if (input == 2) {
                    $('.value-color').hide();
                    $('.value-dimension').show();
                    $('.value-material').hide();
                } else {
                    $('.value-color').hide();
                    $('.value-dimension').hide();
                    $('.value-material').show();
                }
            });
        });
    </script>
@endsection