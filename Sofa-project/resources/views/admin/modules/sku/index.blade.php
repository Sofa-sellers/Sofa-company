@extends('admin.master')
@section('module' ,'Sku')
@section('action','List')  
@push('css')
<link rel="stylesheet" href="{{asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('js')
<script src="{{asset('administrator/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('administrator/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('administrator/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endpush
@push('handlejs')
<script>
$(function () {
    $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    function confirmDelete(){
        return confirm('Do you want to delete it ?');
    }
</script>
@endpush
@section('content')
    <!-- Default box -->
    <form action="{{route('admin.sku.update',['id'=>$id])}}" method="post">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sku List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{$product->name}}</label>
            <input type="text" class="form-control" name="product_id" value="{{old('product_id',$skus->product_id)}}" disabled>
          </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color</th>
                        <th>Material</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($skus as $sku)
                    <tr>
                        <td>{{$loop->iteration}}</td>

                        @if (($sku->attribute_id == 1))
                            <td>{{$sku->value}}</td>
                        @else
                            <td>{{$sku->value}}</td>
                        @endif
                        <td>
                            <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" value="{{old('quantity',$sku->quantity)}}">
                        </td>
                        {{-- <td><span class="right badge badge-{{$sku->status == 1 ?'success':'dark'}}">{{$sku->status==1? 'Show' :'Hide'}}</span></td> --}}
                        <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td>
                        <td><a onclick="return confirmDelete ()" href="{{route('admin.sku.destroy',['id'=>$sku->id])}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
                
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Color</th>
                        <th>Material</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
@endsection