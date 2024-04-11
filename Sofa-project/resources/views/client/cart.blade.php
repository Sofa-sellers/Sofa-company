<?php use App\Models\Product; ?>
@extends('master')
@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Alert!</h5>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ $message }}
</div>


@elseif ($message = Session::get('failed'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Failed!</h5>
    {{ $message }}
</div>


@endif
<section class="whish-list-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title mb-5 pb-3 text-capitalize">Your cart items</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Product Image</th>
                                <th class="text-center" scope="col">Product Name</th>
                                <th class="text-center" scope="col">Product Color</th>
                                <th class="text-center" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Update</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Total</th>
                                <th class="text-center" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->list() as $item)
                            <tr>
                                <td class="text-center" scope="row">
                                    <a href="{{ route('detail',['slug'=>$item['slug']])}}"><img src="{{asset('uploads/'.$item['image'])}}" alt="img"></a>
                                </td>
                                
                                <form method="post" action="{{route('client.cartUpdate',['itemKey'=>$item['itemKey']])}}">
                                    @csrf
                                    


                                    <td class="text-center">
                                        <input type="hidden" name="itemKey" value="{{ old('itemKey', $item['itemKey']) }}">
                                        {{-- <input type="hidden" name="productId" value="{{ old('productId', $item['productId']) }}"> --}}
                                        <span class="whish-title">{{$item['name']}}</span>
                                    </td>
                                    @php
                                    $colorId = $item['option']['color']; // Lấy giá trị của thuộc tính 'color'
                                    $value_color = \App\Models\AttributeValue::where('id', $colorId)->pluck('value')->first();
                                    $product = \App\Models\Product::where('id', $item['productId'])->first();
                                    @endphp
                                    <td class="text-center">
                                        {{-- <input type="hidden" name="color" value="{{ old('color', $item['option']['color']) }}"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{ $value_color }}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>
                                    </td>
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <input type="number" min="1"  max="{{$product->quantity}}" style="width: 50%;" name="quantity" value="{{ old('quantity', $item['quantity']) }}">
                                                {{-- <input type="number"  min="1" max="100" value="{{$item['quantity']}}" name="quantity-cart-product" data-color="{{$item['option']['color']}}" data-productId="{{$item['productId']}}">
                                                <div class="button-group">
                                                    <button class="count-btn increment">
                                                    <span class="ion-chevron-up"></span>
                                                    </button>
                                                    <button class="count-btn decrement">
                                                    <span class="ion-chevron-down"></span>
                                                    </button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <button class="text-center btn animated btn-outline-secondary" style="padding: 5px auto; margin: auto" type="submit">update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    
                                </form>
                               
                                <td class="text-center">
                                    <span class="whish-list-price">{{$item['price']}}</span>
                                </td>
                                <td class="text-center">
                                    <span class="whish-list-price product-subtotal">
                                    {{$item['price']*$item['quantity']}}
                                    </span>
                                </td>
                                <td class="text-center" >
                                    <a href="{{ route('client.cartDelete',['itemKey'=>$item['itemKey']])}}">
                                        <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                    
                                </td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="check-out-section section-padding-bottom" >
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                </div>
            </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="your-order-area">
                <div class="your-order-wrap gray-bg-4">
                    <div class="your-order-product-info">
                        <div class="your-order-top">
                            <ul>
                                <li class="order-total">Subtotal</li>
                                <li>
                                    {{$cart->subToTal()}}
                                </li>
                            </ul>
                        </div>
                        {{-- 
                        <div class="your-order-top">
                            <ul>
                                <li>Discount</li>
                                <li>Discount</li>
                            </ul>
                        </div>
                        --}}
                        <div class="your-order-bottom">
                            <ul>
                                <li class="your-order-shipping">Tax</li>
                                @if ($cart->subToTal())
                                    <li class="your-order-shipping">
                                        10%
                                    </li>
                                @endif
                                
                            </ul>
                        </div>
                        <div class="your-order-total mb-0">
                            <ul>
                                <li class="order-total">Total</li>
                                <li>
                                    {{$cart->total()}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="Place-order mt-5">
                    @if (!empty($cart->list()))
                        <a class="btn btn-dark my-2 my-sm-0" href="{{ route('client.showCheckout')}}">Checkout</a>
                        <a class="btn btn-light my-2 my-sm-0" style="border: black solid 1px;" href="{{ route('index')}}">Turn back to Home</a>
                    @else
                    <a class="btn btn-dark my-2 my-sm-0" href="{{ route('index')}}">Your cart is empty. Turn back to Home</a>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @push('js')
<script>
    $(document).ready(function(){
           $('input[name="quantity-cart-product"]').change(function(){
          
               var quantity = $(this).val();

               var color = $(this).data('color');
               var productId = $(this).data('productid');
              
           alert(productId);
                // var cartItemElement = $(this).closest('.product-subtotal');
               
               
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/client/cart-update/' + productId + '/' + color + '/' + quantity,
                    dataType: "json",
                        success: function(response) {
                    console.log("Success:", response);
                // Xử lý phản hồi ở đây nếu cần
                    },  error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                        // Xử lý lỗi ở đây nếu cần

    }});      
    });
});  
</script>
@endpush --}}
@endsection