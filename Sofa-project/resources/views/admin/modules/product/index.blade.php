@extends('admin.master')

@section('module', 'Product')
@section('action', 'List')

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
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function confirmDelete() {
        return confirm('Do you want to delete it?');
    }
</script>
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product List</h3>
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
                    <th>SKU</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Sale price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Create At</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td><a href="{{ route('admin.sku.index',['id'=>$product->id]) }}">Manage Color</a></td>
                    <td>
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" style="width: 200px; height: 200px;">
                    </td>
                    <td>$ {{ number_format($product->price, 0, "", ".") }}</td>
                    <td>$ {{ number_format($product->sale_price, 0, "", ".") }}</td>
                    <td>
                        @if ($product->quantity == 0)
                            <span class="right badge badge-danger">Out of stock</span>
                            <div>
                                {{$product->quantity}}
                            </div>
                        @elseif ($product->quantity < 5)
                            <span class="right badge badge-warning">Running out of stock</span>
                            <div>
                                {{$product->quantity}}
                            </div>
                        @else
                            {{$product->quantity}}
                        @endif
                    </td>
                    
                    
                    <td>
                        @if (!$product->category)
                            <span style="display: inline-block; padding: 5px 10px; background-color: #FFD700;">
                                <span style="color: black; font-weight: bold;">
                                    Please select 1 category
                                </span>
                            </span>
                        @else
                            {{$product->category->name}}
                        @endif
                    </td>
                    <td>
                        <span class="right badge badge-{{$product->status == 1 ? 'success' : ($product->status == 2 ? 'dark' : ($product->status == 3 ? 'warning' : 'primary'))}}">
                            {{$product->status == 1 ? 'Show' : ($product->status == 2 ? 'Hide' : ($product->status == 3 ? 'Hot' : 'New'))}}
                        </span>
                    </td>
                    <td>
                        <a href="{{ asset('uploads/' . $product->file) }}" target="_blank">{{ $product->file }}</a>
                    </td>
                    <td>{{$product->created_at}}</td>

                    <td>
                        <a href="{{route('admin.product.edit',['id'=>$product->id])}}">Edit</a> /
                        <a onclick="return confirmDelete()" href="{{route('admin.product.destroy',['id'=>$product->id])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Sale price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Create At</th>
                    <th>Manage</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection

