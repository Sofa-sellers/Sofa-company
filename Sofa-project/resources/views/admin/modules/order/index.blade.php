@extends('admin.master')
@section('module' ,'Order')
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
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order List</h3>
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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        {{-- <th>Postcode</th> --}}
                        <th>Phone</th>
                        <th>Total order</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Reason cancel</th>
                        <th>Detail</th>
                        <th>Created At</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                @foreach ($orders as $order)
                <tbody>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->firstname}}</td>
                        <td>{{$order->lastname}}</td>
                        <td>{{$order->address}}</td>
                        {{-- <td>{{$order->postcode}}</td> --}}
                        <td>{{$order->phone}}</td>
                        <td>{{$order->total_order}}</td>
                        {{-- <td>{{$order->payment}}</td> --}}
                        <td>{{$order->note}}</td>
                        <td><span class="right badge badge-{{$order->status == 1 ?'success':'dark'}}">{{$order->status==1? 'Waiting' :'Hide'}}</span></td>
                        <td>{{$order->reason}}</td>
                        <td><a href="{{route('admin.order.edit',['id'=>$order->id])}}">Detail</a></td>
                        <td>Created at</td>
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        {{-- <th>Postcode</th> --}}
                        <th>Phone</th>
                        <th>Total order</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Reason cancel</th>
                        <th>Created At</th>
                        <th>Deleted At</th>
                    </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection

{{-- <div class="form-group">
    <label >Status</label>
    <select class="form-control" name="staztus">
        <option value="1" {{old('status',$category->status)== 1? 'selected':' '}}>Show</option>
        <option value="2" {{old('status',$category->status)== 2? 'selected':' '}}>Hide</option>
    </select>
  </div> --}}