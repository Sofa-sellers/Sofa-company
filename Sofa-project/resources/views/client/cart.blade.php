@extends('master')
@section('module','Cart List')
@push('js')
<script>
    $(document).ready(function(){
    
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    
        $('input[name="quantity-cart-product"]').change(function(){
            var quantity = $(this).val();
            var productId = $(this).data('productid');
            var url = "{{ route('client.cartUpdate') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: {'id': productId, 'quantity': quantity},
                dataType: "json",
                success: function (response){
                    if(response.status == 200){
                        console.log(reponse);
                        window.location.reload();
                    }
                }
            });
        });
    });
</script>
@endpush
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
                                <th class="text-center" scope="col">Qty</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Total</th>
                                <th class="text-center" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartCollection as $item)
                            <tr>
                                <th class="text-center" scope="row">
                                    <img src="{{asset('uploads/'.$item->options->image)}}" alt="img">
                                </th>
                                <td class="text-center">
                                    <span class="whish-title">{{$item->name}}</span>
                                </td>

                                
                                @if($item->options->has('color'))
                                <?php 
                                    $colorId = $item->options->color; // Lấy giá trị của thuộc tính 'color'
                                    $value_color = \App\Models\AttributeValue::where('id', $colorId)->pluck('value')->first();
                                ?>
                                <td class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{ $value_color }}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8"/>
                                    </svg>
                                </td>
                                @else
                                <td></td>
                                @endif

                                <td class="text-center">
                                    <div class="product-count style">
                                        <div class="count d-flex justify-content-center">
                                            <input type="number" min="1" max="10" step="1" value="{{$item->qty}}" name="quantity-cart-product" data-productId="{{$item->id}}">
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

                                
                                <td class="text-center">
                                    <span class="whish-list-price">{{$item->price}}</span>
                                    
                                </td>
                                
                                <td class="text-center">
                                    <span class="whish-list-price">
                                        {{($item->price)*($item->qty)}}
                                        </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{route('client.cartDelete',['rowId'=>$item->rowId])}}">
                                    <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                </td>
                                {{-- 
                                <td class="text-center">
                                    <a href="#" class="btn btn-dark">add to cart</a>
                                </td>
                                --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @php
Cart::addCost('COST_SHIPPING', 100);
@endphp --}}
<div class="check-out-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                {{-- <div class="billing-info-wrap">
                    <h3 class="title">calculate shipping</h3>  --}}
                    
                    {{-- <form class="personal-information" method="POST" action="/client/shipping-check">

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="billing-info">
                                    <input class="form-control" placeholder="Postcode / ZIP" type="text" name="zip">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="billing-select">
                                    <button type="submit" class="btn btn-dark check-out-btn">Estimate</button>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                    


                            {{-- <div class="col-12">
                                <h3 class="coupon-title">Discount coupon Code</h3>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <input class="form-control" placeholder="coupon Code" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <a href="#" class="btn btn-dark check-out-btn">apply
                                code</a>
                            </div> --}}
                        {{-- </div>
                    </form> --}}



                {{-- </div> --}}
            </div>

           
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="your-order-area">
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li class="order-total">Subtotal</li>
                                    <li>
                                       {{$subtotal}}
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="your-order-top">
                                <ul>
                                    <li>Discount</li>
                                    <li>Discount</li>
                                </ul>
                            </div> --}}
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li class="your-order-shipping">
                                    {{$shippingcost}}
                                    </li>
                                </ul>
                            </div>


                            <div class="your-order-total mb-0">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>
                                        {{$total}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-5">
                        <a class="btn btn-dark me-3" href="#">update cart</a>
                        <a class="btn btn-dark my-2 my-sm-0" href="{{ route('client.showCheckout')}}">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection