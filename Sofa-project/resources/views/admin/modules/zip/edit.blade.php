@extends('admin.master')
@section('module' ,'Zip')
@section('action','Edit')  
@section('content')
    <!-- Default box -->
    <form action="{{route('admin.zip.update')}}" method="post">
      @csrf
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Postcode Edit</h3>
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
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" placeholder="Enter city name" name="city" value="{{old('city',$zip->city)}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Postcode</label>
                    <input type="text" class="form-control" placeholder="Enter postcode" name="zip" value="{{old('zip',$zip->zip)}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Shipping cost</label>
                    <input type="number" class="form-control" placeholder="Enter shipping cost" name="ship_cost" value="{{old('ship_cost',$zip->shipping_cost)}}">
                  </div>

                  <div class="form-group">
                     <label >Status</label>
                     <select class="form-control" name="status">
                     <option value="1" {{old('status', $zip->status)== 1? 'selected':' '}}>Show</option>
                     <option value="2" {{old('status', $zip->status)== 2? 'selected':' '}}>Hide</option>
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