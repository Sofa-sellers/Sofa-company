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

                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Value Code</label>
                    <input type="text" class="form-control" placeholder="Enter value code" name="code" value="{{old('code')}}">
                  </div> --}}

                  <div class="form-group value-color">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="text" class="form-control" placeholder="Enter value" name="value" value="{{old('value')}}">
                  </div>

                  {{-- <div class="form-group value-material" style="display:none">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="text" class="form-control" placeholder="Enter value" name="value" value="{{old('value')}}">
                  </div> --}}

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