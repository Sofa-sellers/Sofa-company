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
<form action="{{route('admin.brand.store')}}" method="post">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Brand Create</h3>
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
        <input type="text" class="form-control" placeholder="Enter brand name" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label >Status</label>
        <select class="form-control" name="status">
        <option value="1" {{old('status')== 1? 'selected':' '}}>Show</option>
        <option value="2" {{old('status')== 2? 'selected':' '}}>Hide</option>
        </select>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
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
        <input type="text" class="form-control" name="product_id" value="{{old('product_id',$product->id)}}" disabled>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Attribute</th>
                    <th>Value</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skus as $sku)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @foreach($attributes as $index => $attr)
                    @if($sku->attribute_id == 1)
                    <td>{{$attr->name}}</td>
                    <td style="background: {{$values[$loop->index]->value}}">{{$values[$loop->index]->value}}</td>
                    @else
                    <td>{{$attr->name}}</td>
                    <td>{{$values[$loop->index]->value}}</td>
                    @endif
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Attribute</th>
                    <th>Value</th>
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