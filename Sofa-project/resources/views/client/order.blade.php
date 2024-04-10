@extends('master')
@section('content')
<nav class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="bread-crumb-title">order</h2>
                <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">order</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<div class="my-account section-padding-bottom">
    <div class="container">
        <div class="row mb-n5">
            <div class="col-12">
                <h3 class="title text-capitalize mb-5 pb-4">Order Detail</h3>
            </div>
            
            <!-- My Account Tab Content Start -->
            <div class="col-lg-12 col-12 mb-5">
                <div class="tab-content" id="myaccountContent">
                
                    <!-- Single Tab Content Start -->
                            <div class="myaccount-table table-responsive text-left">
                                <form action="{{ route('client.updateDetail',['id'=>$order->id])}}" method="POST">
                                    @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    
                                    </div>
                                    @endif

                                    @if ($message = Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-check"></i> success!</h5>
                                        {{Session::get('success')}}
                                    </div>
                                    @endif
                                    @csrf
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
                                                    <span>Waiting</span>
                                                    @break
                                                @case(2)
                                                    <span>Accepted</span>
                                                    @break
                                                @case(3)
                                                    <span>Deny/Cancel</span>
                                                    @break
                                                @case(4)
                                                    <span>Preparing shipment </span>
                                                    @break
                                                @case(5)
                                                    <span>Handed over to the carrier</span>
                                                    @break
                                                @case(6)
                                                    <span>In transit</span>
                                                    @break
                                                @default
                                                    <span>Delivered</span>
                                                    @break
                                            @endswitch
                                        
                                    </tr>
                                    <tr>
                                            <th>
                                                <label for="">Reason for cancel order</label>
                                                <input type="hidden" name="status" value="{{$order->status}}">
                                                <div>
                                                    <input type="text" name="reason" placeholder="Please enter the reason">
                                                </div>
                                            </th>
                                            <td>
                                                <button type="submit" class="btn btn-outline-dark" >Cancel</button>
                                            </td>

                                    </tr>
                                    </table>
                                </form>
                            </div>
                                    <div class="myaccount-table table-responsive text-center">
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
                                            @foreach ($detail as $d)
                                            <tbody>
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->product_name}}</td>
                                                    @php
                                                    $colorValue = \App\Models\AttributeValue::where('id', $d->color)->pluck('value')->first();
                                                    @endphp
                                                
                                                    <td><input style="background: {{ $colorValue }}" disabled></td>
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
                                
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
@endsection