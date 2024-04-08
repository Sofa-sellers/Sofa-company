@extends('admin.master')
@section('module' ,'Order')
@section('action','Detail')  
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

    $(function() {
    var status_old = $('select[name="status"]').val();
    if (status_old != 3) {
        $('select[name="status"]').change(function() {
            if ($(this).val() == 3) {
                var confirmDeny = confirm("Are you sure you want to reject this order? The quantity of the products will be returned to the warehouse and cannot be allocated to this order again. Please review before confirming.");
                if (confirmDeny) {
                    $('#orderForm').submit();
                } else {
                    $(this).val({{ $order->status }});
                }
            }
        });
    } else {
        $('select[name="status"]').change(function() {
            var confirmDeny = confirm("You cannot change order status because order was deleted.");
            if (confirmDeny) {
              $(this).val({{ $order->status }});
            }else{
              $(this).val({{ $order->status }});
            }
        });
    }
});



    // function confirmDelete(){
    //     return confirm('Do you want to delete it ?');
    // }
</script>
@endpush
@section('content')
 
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order Detail Information</h3>
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
                
                <table>
                  <tr>
                    <th>Firstname</th>
                    <td>{{$order->firstname}}</td>
                  </tr>
                  <tr>
                    <th>Lastname</th>
                    <td>{{$order->lastname}}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{$order->email}}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{$order->address}}</td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{$order->phone}}</td>
                  </tr>
                  <tr>
                    <th>Note</th>
                    <td>{{$order->note}}</td>
                  </tr>
                </table>
                <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status" >
                        <option value="1" {{old('status',$order->status)== 1? 'selected':' '}}>Waiting</option>
                        <option value="2" {{old('status',$order->status)== 2? 'selected':' '}}>Accepted</option>
                        <option value="3" {{old('status',$order->status)== 3? 'selected':' '}}>Deny</option>
                        <option value="4" {{old('status',$order->status)== 4? 'selected':' '}}>Preparing shipment</option>
                        <option value="5" {{old('status',$order->status)== 5? 'selected':' '}}>Handed over to the carrier</option>
                        <option value="6" {{old('status',$order->status)== 6? 'selected':' '}}>In transit</option>
                        <option value="7" {{old('status',$order->status)== 7? 'selected':' '}}>Delivered</option>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Reason of cancel</label>
                    <span>{{$order->reason}}</span>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
    <!--Detail list -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order Detail List</h3>
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
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>

                    </tr>
                </thead>
                @foreach ($details as $d)
                <tbody>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->product_name}}</td>
                        @php
                        $colorValue = \App\Models\AttributeValue::where('id', $d->color)->pluck('value')->first();
                        @endphp
                    
                        <td><input style="background: {{ $colorValue }}" disabled>{{$colorValue}}</td>
                        <td>{{$d->quantity}}</td>
                        <td>{{$d->price}}</td>
                        <td>{{$d->price * $d->quantity}}</td>
                        {{-- <td><span class="right badge badge-{{$d->status == 1 ?'success':'dark'}}">{{$d->status==1? 'Waiting' :'Hide'}}</span></td>
                        <td>{{$d->reason}}</td> --}}
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Color</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total Price</th>
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
