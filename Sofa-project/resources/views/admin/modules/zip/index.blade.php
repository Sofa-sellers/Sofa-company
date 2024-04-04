@extends('admin.master')
@section('module' ,'Zip')
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
          <h3 class="card-title">Postcode List</h3>
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
                        <th>City</th>
                        <th>Postcode</th>
                        <th>Ship cost</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($zips as $zip)
                <tbody>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$zip->city}}</td>
                        <td>{{$zip->zip}}</td>
                        <td>{{$zip->ship_cost}}</td>
                        <td><span class="right badge badge-{{$zip->status == 1 ?'success':'dark'}}">{{$zip->status==1? 'Show' :'Hide'}}</span></td>
                        <td>{{ date("d/m/Y - H:m:s", strtotime($zip->created_at))}}</td>
                        <td><a href="{{route('admin.zip.edit',['id'=>$zip->id])}}">Edit</a></td>
                        <td><a onclick="return confirmDelete ()" href="{{route('admin.zip.destroy',['id'=>$zip->id])}}">Delete</a></td>
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>City</th>
                        <th>Postcode</th>
                        <th>Ship cost</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection