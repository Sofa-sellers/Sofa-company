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

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
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
                        <td>{{$products->name}}</td>
                        <td>{{$colors->value}}</td>
                        <td>{{$materials->value}}</td>
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
                        <th>Product</th>
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
@endsection

<div class="form-group" >
    <label>Attribute</label>
    <div style="display: flex; ">
        <label>Color</label>
       
        @foreach ($colors as $color)
        <div class="form-check" style="width: 100%; margin: 10px; text-align: right;">
            <input class="form-check-input" type="checkbox" value="{{ old('color_id') == $color->id ? 'checked' : '' }}" id="flexCheckDefault" name="value_id[]">
            <label class="form-check-label" for="flexCheckDefault">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{$color->value}}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                  </svg>
            </label>
          </div>
        @endforeach                           
    </div>

    <div style="display:flex">
        <label>Material</label>
       
        @foreach ($materials as $material)
        <div class="form-check" style="width: 100%; margin: 10px; text-align: right;">
            <input class="form-check-input" type="checkbox" value="{{ old('material_id') == $material->id ? 'checked' : '' }}" id="flexCheckDefault" name="value_id[]">
            <label class="form-check-label" for="flexCheckDefault">{{$material->value}}</label>
          </div>
        @endforeach                           
    </div>

    </div>

<div class="sku-detail">
    <div class="row">
        <button type="button" class="btn btn-info w-100" id="add-sku">
            <i class="fas fa-plus"></i> Add SKU detail
        </button>
    </div>
</div>
</div>