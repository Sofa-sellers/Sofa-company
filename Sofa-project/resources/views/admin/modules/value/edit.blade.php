@extends('admin.master')
@section('module' ,'Value')
@section('action','Edit')  


@section('content')
    <!-- Default box -->
    <form action="{{route('admin.value.update', ['id'=>$id])}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Value of Attribute Edit</h3>
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
                  <label for="exampleInputEmail1">Attribute</label>
                  <input type="text" class="form-control" name="attribute_id" value="{{$value->attribute_id}}" disabled>
                </div>

                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Value Code</label>
                  <input type="text" class="form-control" name="code" value="{{ old('code',$value->code) }}">
                </div> --}}

                  
                  <div class="form-group value-color">
                    <label for="exampleInputEmail1">Value</label>
                    
                    @if($value->attribute_id == 1)
                    <input type="color" class="form-control" name="value" value="{{$value->value}}" style="background: {{$value->value}}" disabled>

                    @else
                      <input type="text" class="form-control" name="value" value="{{$value->value}}" disabled>
                    
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ old('status', $value->status) == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" {{ old('status', $value->status) == 2 ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Value of Attribute</button>
                  </div>
            </form>
            
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection