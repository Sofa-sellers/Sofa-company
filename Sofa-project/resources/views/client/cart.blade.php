<?php use App\Models\Product; ?>
@extends('master')
@section('module','Cart List')
{{-- @push('js')
<script>
    $(document).ready(function(){
           $('input[name="quantity-cart-product"]').change(function(){
          
               var quantity = $(this).val();
               var itemKey = $(this).data('itemKey');
              
               alert(itemKey);
            //    var cartItemElement = $(this).closest('.product-subtotal');
               
               
               $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/client/cart-update',
                        data: {
                            itemKey: itemKey, 
                           
                            quantity: quantity,
                        },
                        dataType: "json",
                        success: function(response) {
                            // Update UI based on successful response (e.g., update quantity display)
                            console.log("Success:", response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", status, error);
                        }
                });
    });      
    });  
</script>
@endpush --}}

@section('content')
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
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Total</th>
                                <th class="text-center" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->list() as $item)
                            <tr>
                                <td class="text-center" scope="row">
                                    <img src="{{asset('uploads/'.$item['image'])}}" alt="img">
                                </td>
                                {{-- 
                                <form method="post" action="{{route('client.cartUpdate',['productId' => $item['productId'], 'color'=>$item['option']['color'], 'quantity'=>$item['quantity']])}}">
                                    @csrf --}}
                                    <td class="text-center">
                                        {{-- <input type="hidden" name="productId" value="$item['productId']"> --}}
                                        <span class="whish-title">{{$item['name']}}</span>
                                    </td>
                                    @php
                                    $colorId = $item['option']['color']; // Lấy giá trị của thuộc tính 'color'
                                    $value_color = \App\Models\AttributeValue::where('id', $colorId)->pluck('value')->first();
                                    @endphp
                                    <td class="text-center">
                                        {{-- <input type="hidden" name="color" value="$item['option']['color']"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{ $value_color }}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>
                                    </td>
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <input type="number"  value="{{$item['quantity']}}" name="quantity-cart-product" data-itemKey="{{$item['itemKey']}}">
                                                <div class="button-group">
                                                    <button class="count-btn increment">
                                                    <span class="ion-chevron-up"></span>
                                                    </button>
                                                    <button class="count-btn decrement">
                                                    <span class="ion-chevron-down"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- 
                                    <td>
                                        <button type="submit">update</button>
                                    </td>
                                    --}}
                                    {{-- 
                                </form>
                                --}}
                                <td class="text-center">
                                    <span class="whish-list-price">{{$item['price']}}</span>
                                </td>
                                <td class="text-center">
                                    <span class="whish-list-price product-subtotal">
                                    {{$item['price']*$item['quantity']}}
                                    </span>
                                </td>
                                <td class="text-center" >
                                    <span>
                                        <a href="{{ route('client.cartDelete',['itemKey'=>$item['itemKey']])}}">Delete</a>
                                    </span>
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
<div class="check-out-section section-padding-bottom">
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
                    {{-- <button type="submit" class="btn btn-dark me-3" href="{{route('client.cartUpdate')}}">update cart></button></a> --}}
                    <a class="btn btn-dark my-2 my-sm-0" href="{{ route('client.showCheckout')}}">checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection