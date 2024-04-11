@extends('admin.master')

@section('module', 'Order')
@section('action', 'Detail')

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

    $(function() {
    var status_old = $('input[name="status"]:checked').val();
    if (status_old != 3) {
        $('input[name="status"]').change(function() {
            if ($(this).val() == 3) {
                var confirmDeny = confirm("Are you sure you want to reject this order? The quantity of the products will be returned to the warehouse and cannot be allocated to this order again. Please review before confirming.");
                if (confirmDeny) {
                    $('#orderForm').submit();
                } else {
                    $('input[name="status"][value="' + status_old + '"]').prop('checked', true); 
                }
            }
        });
    } else {
        $('input[name="status"]').change(function() {
            var confirmDeny = confirm("You cannot change order status because order was deleted.");
            if (confirmDeny) {
                $('input[name="status"][value="' + status_old + '"]').prop('checked', true); 
            } else {
                $('input[name="status"][value="' + status_old + '"]').prop('checked', true); 
            }
        });
    }
});


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
              <tr>
                <th>Status</th>
                <td>
                  @switch($order->status)
                  @case(1)
                      <span class="right badge badge-warning ">Waiting</span>
                      @break
                  @case(2)
                      <span class="right badge badge-primary">Accepted</span>
                      @break
                  @case(3)
                      <span class="right badge badge-danger">Deny/Cancel</span>
                      @break
                  @case(4)
                      <span class="right badge badge-light">Preparing shipment </span>
                      @break
                  @case(5)
                      <span class="right badge badge-info">Handed over to the carrier</span>
                      @break
                  @case(6)
                      <span class="right badge badge-info">In transit</span>
                      @break
                  @default
                      <span class="right badge badge-success">Delivered</span>
                      @break
                  @endswitch
                </td>
                
              </tr>
            </table>
            <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post">
              @csrf
              <div class="form-group" >
                <table style="width: 100%;">
                  
                @switch($order->status)
                    @case(1)
                    <tr>
                      <td>
                        <label >Update</label>
                      </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Waiting</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="2" checked>
                      <label class="text-bg-success" for="radio1">Accepted</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Preparing shipment</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Handed over to the carrier</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">In transit</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Delivered</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="3">
                      <label class="text-danger">Cancel</label>
                    </td>
                  </tr>

                    <tr>
                      <td>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </td>
                    </tr>

                        @break
                    @case(2)
                    <tr>
                      <td>
                        <label >Update</label>
                      </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Waiting</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label" for="radio1">Accepted</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="4" checked>
                      <label class="text-bg-success">Preparing shipment</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Handed over to the carrier</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">In transit</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Delivered</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="3">
                      <label class="text-danger">Cancel</label>
                    </td>
                  </tr>

                    <tr>
                      <td>
                        <button type="submit" class="btn btn-primary" style="font-weight:bold; border-radius: 10px; ">Update</button>
                      </td>
                    </tr>

                        @break

                    @case(3)
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Reason of cancel</label>
                      <span>{{$order->reason}}</span>
                    </div>
                        @break

                    @case(4)
                    <tr>
                      <td>
                        <label >Update</label>
                      </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Waiting</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label" for="radio1">Accepted</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Preparing shipment</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="5" checked>
                      <label class="text-bg-success">Handed over to the carrier</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">In transit</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Delivered</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="3">
                      <label class="text-danger">Cancel</label>
                    </td>
                  </tr>

                    <tr>
                      <td>
                        <button type="submit" class="btn btn-primary" style="font-weight:bold; border-radius: 10px; ">Update</button>
                      </td>
                    </tr>
                        
                        @break

                    @case(5)
                    <tr>
                      <td>
                        <label >Update</label>
                      </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Waiting</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label" for="radio1">Accepted</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Preparing shipment</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Handed over to the carrier</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="6" checked>
                      <label class="text-bg-success">In transit</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Delivered</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="3">
                      <label class="text-danger">Cancel</label>
                    </td>
                  </tr>

                    <tr>
                      <td>
                        <button type="submit" class="btn btn-primary" style="font-weight:bold; border-radius: 10px; ">Update</button>
                      </td>
                    </tr>

                        @break
                    @case(6)
                    <tr>
                      <td>
                        <label >Update</label>
                      </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Waiting</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label" for="radio1">Accepted</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Preparing shipment</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">Handed over to the carrier</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" disabled>
                      <label class="form-check-label">In transit</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="7" checked>
                      <label class="text-bg-success">Delivered</label>
                    </td>
                    <td>
                      <input type="radio" class="form-check-input" id="radio1" name="status" value="3">
                      <label class="text-danger">Cancel</label>
                    </td>
                  </tr>

                    <tr>
                      <td>
                        <button type="submit" class="btn btn-primary" style="font-weight:bold; border-radius: 10px; ">Update</button>
                      </td>
                    </tr>
                        
                        @break
                    @case(7)
                        
                        @break
                    
                        
                @endswitch
         
              </table>

            </form>
    </div>
</div>
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
            <tbody>
                @foreach ($details as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->product_name}}</td>
                    @php
                        $colorValue = \App\Models\AttributeValue::where('id', $d->color)->pluck('value')->first();
                    @endphp
                    
                    <td><input style="background: {{ $colorValue }}" disabled>{{$colorValue}}</td>
                    <td>{{$d->quantity}}</td>
                    <td>$ {{$d->price}}</td>
                    <td>$ {{$d->price * $d->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
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
</div>

@endsection

