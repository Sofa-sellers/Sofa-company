@extends('master')
@section('module','check out')
@section('content')
<div class="check-out-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3 class="title">Billing Details</h3>
                    <form class="personal-information" method="POST" action="{{ route('client.checkout',['user' => $user])}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-5">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" placeholder="Firstname" value="{{ old('firstname',$user->firstname) }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-5">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname',$user->lastname) }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-5">
                                    <label>Street Address</label>
                                    <input class="billing-address mb-3" placeholder="House number and street name" type="text" name="address" value="{{ old('address',$user->address) }}">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="billing-info mb-5">
                                    <label>Town / City</label>
                                    {{-- <select class="form-control" name="material_id">
                                        <option value="0" {{ old('material_id') == 0 ? 'selected' : '' }}>----- Root -----</option>
                                        @foreach ($materials as $m)
                                        <option value="{{ $m->id }}" {{ old('material_id', $product->material_id) == $product->material_id ? 'selected' : '' }}>{{ $m->value }}</option>
                                        @endforeach
                                        </select> --}}
                                    {{-- <input type="text"> --}}
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-5">
                                    <label>Postcode / ZIP</label>
                                    <input type="text" name="postcode" value="{{ old('postcode') }}">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-5">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone',$user->phone) }}">
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-5">
                                    <label>Email Address</label>
                                    <input type="text" name="email" value="{{ old('email',$user->email) }}" disabled>
                                </div>
                            </div>
                            <div class="additional-info-wrap">
                                <h4 class="title">Additional information</h4>
                                <div class="additional-info">
                                    <label class="mb-2">Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="note" value="{{ old('note') }}"></textarea>
                                </div>
                            </div>
    
                        </div>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="your-order-area">
            <h3 class="title">Your order</h3>
            <div class="your-order-wrap gray-bg-4">
            <div class="your-order-product-info">
            <div class="your-order-top">
            {{-- <ul>
            <li>Product</li>
            <li>Total</li>
            </ul> --}}
            </div>
            {{-- <div class="your-order-middle">
            <ul>
            <li>
            <span class="order-middle-left">Product Name X 1</span>
            <span class="order-price">$329 </span>
            </li>
            <li>
            <span class="order-middle-left">Product Name X 1</span>
            <span class="order-price">$329 </span>
            </li>
            </ul>
            </div>
            <div class="your-order-bottom">
            <ul>
            <li class="your-order-shipping">Shipping</li>
            <li>Free shipping</li>
            </ul>
            </div> --}}
            <div class="your-order-total">
            <ul>
            <li class="order-total">Total</li>
            <li>{{Cart::total()}}</li>
            </ul>
            </div>
            </div>
            <div class="payment-method">
            <div class="payment-accordion element-mrg">
            <div class="panel-group" id="accordion">
            <div class="panel payment-accordion">
            <div class="panel-heading" id="method-one">
            <h4 class="panel-title">
            <a data-bs-toggle="collapse" href="#method1">
            Direct bank transfer
            </a>
            </h4>
            </div>
            <div id="method1" class="panel-collapse collapse show" data-bs-parent="#accordion">
            <div class="panel-body">
            <p>
            Please send a check to Store Name, Store Street,
            Store Town, Store State / County, Store Postcode.
            </p>
            </div>
            </div>
            </div>
            <div class="panel payment-accordion">
            <div class="panel-heading" id="method-two">
            <h4 class="panel-title">
            <a class="collapsed" data-bs-toggle="collapse" href="#method2">
            Check payments
            </a>
            </h4>
            </div>
            <div id="method2" class="panel-collapse collapse" data-bs-parent="#accordion">
            <div class="panel-body">
            <p>
            Please send a check to Store Name, Store Street,
            Store Town, Store State / County, Store Postcode.
            </p>
            </div>
            </div>
            </div>
            <div class="panel payment-accordion">
            <div class="panel-heading" id="method-three">
            <h4 class="panel-title">
            <a class="collapsed" data-bs-toggle="collapse" href="#method3">
            Cash on delivery
            </a>
            </h4>
            </div>
            <div id="method3" class="panel-collapse collapse" data-bs-parent="#accordion">
            <div class="panel-body">
            <p>
            Please send a check to Store Name, Store Street,
            Store Town, Store State / County, Store Postcode.
            </p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div class="Place-order mt-25">
                <button type="submit">
                    Place Order
                </button>
            
            </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection