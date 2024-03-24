@extends('admin.master')
@section('module' ,'Attribute')
@section('action','Edit')  


@section('content')
    <!-- Default box -->
    <form action="{{route('admin.attribute.update',['id'=>$id])}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Attribute Update</h3>
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
                    <label for="exampleInputEmail1">Attribute Name</label>
                    <input type="text" class="form-control" placeholder="Enter attribute name" name="name" value="{{old('name',$attribute->name)}}">
                  </div>

                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{old('status', $attribute->status)== 1? 'selected':' '}}>Show</option>
                        <option value="2" {{old('status', $attribute->status)== 2? 'selected':' '}}>Hide</option>
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