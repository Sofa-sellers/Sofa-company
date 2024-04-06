@extends('master')
@section('module','account')
@section('content')
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
                    <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
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
                        <div class="myaccount-content">
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
                                                            <td>{{ $loop->count - $loop->remaining + 1 }}</td>
                                                            <td>{{$order->firstname}} {{$order->lastname}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->total_order}}</td>
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
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Expire</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mostarizing Oil</td>
                                            <td>Aug 22, 2022</td>
                                            <td>Yes</td>
                                            <td>
                                                <a href="#" class="ht-btn black-btn">Download File</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Katopeno Altuni</td>
                                            <td>Sep 12, 2022</td>
                                            <td>Never</td>
                                            <td>
                                                <a href="#" class="ht-btn black-btn">Download File</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Payment Method</h3>
                            <p class="saved-message">
                                You Can't Saved Your Payment Method yet.
                            </p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Billing Address</h3>
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
                            <address>
                                <p><strong>{{Auth::user()->username}}</strong></p>
                                @if (Auth::user()->address!='')
                                <p>{{Auth::user()->address}}</p>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}"></p>
                                @else 
                                <p>you didnt add any address</p>
                                <input type="text" class="form-control"name="address" value="{{old('address')}}"></p>
                                @endif
                                @if (Auth::user()->phone!='')
                                <p>{{Auth::user()->phone}}</p>
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}"></p>
                                @else
                                <p>you didnt add any phone</p>
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}"></p>
                                @endif
                            </address>
                            <button type="submit" class="btn btn-primary">Edit Address</button>
                            </form>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>
                            <div class="account-details-form">
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
                                    @if ($message = Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                            {{Session::get('error')}}
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
                                            <input class="form-control" name="firstname" type="text" value="{{old('firstname',Auth::user()->firstname)}}">
                                        </div>
                                        <div class="col-lg-6 col-12 mb-5">
                                            <p>Last Name</p>
                                            <input class="form-control" name="lastname" type="text" value="{{old('lastname',Auth::user()->lastname)}}">
                                        </div>
                                        <div class="col-12 mb-5">
                                            <p>User Name</p>
                                            <input class="form-control" name="username" type="text" value="{{old('username',Auth::user()->username)}}">
                                        </div>
                                        <div class="col-12 mb-5">
                                            <h4>Password change</h4>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <input class="form-control" name="currentpassword" placeholder="Current Password" type="password">
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
                                    </div>
                                </form>
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