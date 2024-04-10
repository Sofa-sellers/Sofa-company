@extends('master')
@section('content')
<nav class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="bread-crumb-title">account</h2>
                <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">account</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<div class="my-account section-padding-bottom">
    <div class="container">
        <div class="row mb-n5">
            <div class="col-12">
                <h3 class="title text-capitalize mb-5 pb-4">my account</h3>
            </div>
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-5">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#dashboad" data-bs-toggle="tab"><i class="fa fa-tachometer"></i> Dashboard</a>
                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                    <a href="#download" data-bs-toggle="tab"><i class="fa fa-download"></i> Download</a>
                    {{-- <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a> --}}
                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> Address</a>
                    <a href="#account-info" data-bs-toggle="tab" class="active"><i class="fa fa-user"></i> Account
                    Details</a>
                    <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->
            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-5">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="dashboad" role="tabpanel">
                        <div class="myaccount-content" style="font-size: 20px">
                            <h3>Dashboard</h3>
                            <div class="welcome mb-20">
                                <p>
                                    Hello, <strong>{{Auth::user()->username}}</strong> (If Not
                                    <strong>{{Auth::user()->username}}!</strong><a href="{{route('logout')}}" class="logout"> Logout</a>)
                                </p>
                            </div>
                                <p class="mb-0">
                                    From your account dashboard. you can easily check &amp; view your recent orders,
                                    manage your shipping and edit your password and account details.
                                </p>
                            </div>
                        </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Orders</h3>
                            
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    
                                                        <tr>
                                                            <td>{{$loop->count - $loop->index}}</td>
                                                            <td>{{$order->firstname}} {{$order->lastname}}</td>
                                                            <td>{{$order->created_at}}</td>
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
                                                            </td>
                                                            <td>$ {{$order->total_order}}</td>
                                                            <td>
                                                                <a href="{{route('client.showDetail',['id'=>$order->id])}}" class="ht-btn black-btn" >View</a>
                                                            </td>
                                                        </tr>
                                                    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="download" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Downloads</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($uniqueProducts as $id)
                                            @php
                                                $p = \App\Models\Product::where('id', $id)->first();
                                            @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>
                                                <a href="{{ asset('uploads/' . $p->file) }}" class="ht-btn black-btn" target="_blank"> Direction for Use</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    {{-- <div class="tab-pane fade" id="payment-method" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Payment Method</h3>
                            <p class="saved-message">
                                You Can't Saved Your Payment Method yet.
                            </p>
                        </div>
                    </div> --}}
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Address</h3>
                            <form method="POST" action="{{route('client.address',['id'=>Auth::user()->id])}}">
                                @csrf
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
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{Session::get('success')}}
                                    </div>
                                @endif
                            <address style="font-size: 20px">
                                <p><strong>{{Auth::user()->username}}</strong></p>
                                @if (Auth::user()->address!='')
                                <p>{{Auth::user()->address}}</p>
                                <input type="text" class="form-control" name="address" value="{{old('address',Auth::user()->address)}}" placeholder="Please enter another address"></p>
                                @else 
                                <p>you didnt add any address</p>
                                <input type="text" class="form-control"name="address" value="{{old('address')}}" placeholder="Please enter another address"></p>
                                @endif
                                @if (Auth::user()->city!='')
                                <p>{{Auth::user()->city}}</p>
                                <input type="text" class="form-control" name="city" value="{{old('city',Auth::user()->city)}}" placeholder="Please enter another city"></p>
                                @else 
                                <p>you didnt add any city</p>
                                <input type="text" class="form-control"name="city" value="{{old('city')}}" placeholder="Please enter another address"></p>
                                @endif
                                @if (Auth::user()->phone!='')
                                <p>{{Auth::user()->phone}}</p>
                                <input type="text" class="form-control" name="phone" value="{{old('phone',Auth::user()->phone)}}" placeholder="Please enter another phone"></p>
                                @else
                                <p>you didnt add any phone</p>
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Please enter another phone"></p>
                                @endif
                            </address>
                                <button type="submit" class="btn btn-dark">Edit Address</button>
                            </form>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>
                            <div class="account-details-form" style="font-size: 20px">
                                <form action="{{route('client.accountDetails',['id'=>Auth::user()->id])}}" method="POST">
                                    @csrf
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
                                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                        {{Session::get('success')}}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-5">
                                            <p>First Name</p>
                                            @if (Auth::user()->firstname!='')
                                                <p>{{Auth::user()->firstname}}</p>
                                                <input class="form-control" name="firstname" type="text" value="{{old('firstname',Auth::user()->firstname)}}">
                                            @else
                                            <p>you didnt add any Firstname</p>
                                            <input class="form-control" name="firstname" type="text" value="{{old('firstname')}}">
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mb-5">
                                            <p>Last Name</p>
                                            @if (Auth::user()->lastname!='')
                                                <p>{{Auth::user()->lastname}}</p>
                                                <input class="form-control" name="lastname" type="text" value="{{old('lastname',Auth::user()->lastname)}}">
                                            @else
                                            <p>you didnt add any Lastname</p>
                                            <input class="form-control" name="lastname" type="text" value="{{old('lastname')}}">
                                            @endif
                                        </div>
                                        <div class="col-12 mb-5">
                                            <p>User Name</p>
                                            @if(Auth::user()->username!='')
                                            <p>{{Auth::user()->username}}</p>
                                            <input class="form-control" name="username" type="text" value="{{old('username',Auth::user()->username)}}">
                                            @else
                                            <p>you didnt add any Username</p>
                                            <input class="form-control" name="username" type="text" value="{{old('username',Auth::user()->username)}}">
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-dark">Save Changes</button>
                                        </div>
                                    </form>
                                </br>
                                        <form action="{{route('client.changePass',['id'=>Auth::user()->id])}}" method="POST">
                                        @csrf
                                        <div class="col-12 mb-5">
                                            <h4>Password change</h4>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-5">
                                            <input class="form-control" name="password" placeholder="New Password" type="password">
                                        </div>
                                        <div class="col-lg-6 col-12 mb-5">
                                            <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-dark">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
@endsection