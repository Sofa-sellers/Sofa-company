@extends('admin.master')
@section('module' ,'Value')
@section('action','Edit')  


@section('content')
    <!-- Default box -->
    <form action="{{route('admin.value.update',['id'=>$id])}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Value of Attribute Update</h3>
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
                    <label for="exampleInputEmail1">Value Name</label>
                    <input type="text" class="form-control" placeholder="Enter value of attribute name" name="name" value="{{old('name',$value->name)}}">
                  </div>

                  <div class="form-group">
                    <label >Attribute</label>
                    <select class="form-control" name="attribute_id">
                        <option value="0" {{ old('attribute_id') == 0 ? 'selected' : ''}}>----Root----</option>
                        @foreach ($attributes as $attribute)
                          <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{old('status',$value->status)== 1? 'selected':' '}}>Show</option>
                        <option value="2" {{old('status',$value->status)== 2? 'selected':' '}}>Hide</option>
                    </select>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
            </form>
            
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection