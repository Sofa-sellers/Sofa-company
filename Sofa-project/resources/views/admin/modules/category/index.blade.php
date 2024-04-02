@extends('admin.master')
@section('module' ,'Category')
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
    function confirmDelete(link){
    var categoryHasChildren = link.getAttribute('data-has-children') === 'true';
    var categoryHasProducts = link.getAttribute('data-has-products') === 'true';
    var message = 'Are you sure you want to delete?';

    if (categoryHasChildren) {
        message += '\n\nThe category you want to delete is the parent category of another category, the deletion command will not be performed and we will report an error.';
    }

    if (categoryHasProducts) {
        message += '\n\nThe category you want to delete contains products, the products that originally belonged to that category will no longer have a category, and you will need to select a new category for them in the product list.';
    }

    return confirm(message);
}

</script>
@endpush

@section('content')
    <!-- Default box -->

    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category List</h3>
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
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="{{ $category->status == 0 ? 'category-hide' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @php
                                    if ($category->parent_id != 0) {
                                        $parent_category = DB::table('categories')->select('name', 'parent_id')->where('id', $category->parent_id)->first();
                                        echo $parent_category->name;
                                    }
                                @endphp
                            </td>
                            <td>
                                <img src="{{ asset('uploads/' . $category->photo) }}" alt="{{ $category->name }}" style="max-width: 200px; max-height: 200px;">
                            </td>
                            <td>
                                <span class="right badge badge-{{ $category->status == 1 ? 'success' : 'dark' }}">
                                    {{ $category->status == 1 ? 'Show' : 'Hide' }}
                                </span>
                            </td>
                            <td><a href="{{ route('admin.category.edit', ['id' => $category->id]) }}">Edit</a></td>
                            <td>
                                <a onclick="return confirmDelete(this)" data-has-children="{{ $category->children()->exists() ? 'true' : 'false' }}" data-has-products="{{ $category->products()->exists() ? 'true' : 'false' }}" href="{{ route('admin.category.destroy', ['id' => $category->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Photo</th>
                        <th>Status</th>
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
