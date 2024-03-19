@extends('admin.master')
@section('module' ,'Brand')
@section('action','Edit')  


@section('content')
    <!-- Default box -->
    <form action="{{route('admin.brand.update',['id'=>$id])}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Brand Update</h3>
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
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" placeholder="Enter brand name" name="name" value="{{old('name',$brand->name)}}">
                  </div>

                  <div class="form-group">
                    <label >Brand Parent</label>
                    <select class="form-control" name="parent_id" ">
                        <option value="0">----Root----</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{old('status',$brand->status)== 1? 'selected':' '}}>Show</option>
                        <option value="2" {{old('status',$brand->status)== 2? 'selected':' '}}>Hide</option>
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