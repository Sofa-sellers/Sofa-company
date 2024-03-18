@extends('admin.master')

@section('module', 'Warranty')
@section('action', 'Edit')

@section('content')
<form method="post" action="{{ route('admin.warranty.update', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Warranty Edit</h3>

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
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="number" class="form-control" placeholder="Enter order id" name="order_id" value="{{old('order_id', $warranty->order_id)}}">
                    </div>

                    <div class="form-group">
                        <label>Product ID</label>
                        <input type="number" class="form-control" placeholder="Enter product id" name="product_id" value="{{old('product_id', $warranty->product_id)}}">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" value="{{old('quantity', $warranty->quantity)}}">
                    </div>

                    <div class="form-group">
                        <label>Delivery Date</label>
                        <input type="date" class="form-control" name="delivery_date" value="{{old('delivery_date', $warranty->delivery_date)}}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="number" class="form-control" placeholder="Enter status" name="status" value="{{old('status', $warranty->status)}}">
                    </div>

                    <div class="form-group">
                        <label>End Day</label>
                        <input type="date" class="form-control" name="end_day" value="{{old('end_day', $warranty->end_day)}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection
