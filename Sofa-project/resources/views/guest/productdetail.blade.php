@extends('master')
@section('module','Product Detail')
@section('content')
<!-- main content start -->
<!-- bread crumb section start -->
<nav class="breadcrumb-section bg-light bread-crumb-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</nav>


{{-- @push('js')
<script>
    $(document).ready(function(){
    
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

    document.getElementById('addToCartBtn').addEventListener('click', function() {
        var productId = {{ $product->id }};
        var quantity = document.querySelector('input[name="quantity"]').value;

        // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route('client.addToCart',['id'=>$product->id, 'quantity'=> $product->quantity])}}', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
                // Redirect hoặc thực hiện hành động khác khi sản phẩm được thêm vào giỏ hàng thành công
            } else {
                alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng!');
            }
        };
        xhr.send(JSON.stringify({ productId: productId, quantity: quantity }));
    });
});
</script>
@endpush --}}

<!-- bread crumb section end -->
<!-- modal gallery slider start -->
<section>
    <div class="container">
        <div class="row mb-n4">
            <div class="col-md-5 mb-4">
                <div class="modal-gallery-slider">
                    <div class="gallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide product-modal-gallery-item">
                                    <img src="{{asset('uploads/'.$product->image)}}" alt="image_not_found" class="img-fluid" style="height: 600px;">
                                </div>
                                @foreach($product->productimages as $pi)
                                <div class="swiper-slide product-modal-gallery-item">
                                    <img src="{{asset('uploads/'.$pi->name)}}" alt="image_not_found" class="img-fluid" style="height: 600px;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="gallery-thumbs">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide product-modal-gallery-thumbs-item">
                                    <a href="javascript:void(0)"> <img src="{{asset('uploads/'.$product->image)}}" alt="image_not_found" class="img-fluid" style="height: 150px;"></a>
                                </div>
                                @foreach($product->productimages as $pi)
                                <div class="swiper-slide product-modal-gallery-thumbs-item">
                                    <a href="javascript:void(0)">
                                    <img src="{{asset('uploads/'.$pi->name)}}" alt="image_not_found" class="img-fluid" style="height: 150px;">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mb-4">
                <div class="modal-product-des">
                    <h3 class="modal-product-title"><a href="#">{{$product->name}}</a></h3>
                    <div class="reviews">
                        <span class="ion-star"></span>
                        <span class="ion-star"></span>
                        <span class="ion-star"></span>
                        <span class="ion-star"></span>
                        <span class="ion-star"></span>
                    </div>
                    <div class="product-price-wrapp-lg">
                        @if(!$product->sale_price)
                        <h4 class="product-price" style="font-size: 40px; color: black">$ {{$product->price}}</h4>
                        @else
                        <span class="product-regular-price-lg">$ {{$product->price}}</span>
                        <span class="product-price-on-sale-lg">$ {{$product->sale_price}}</span>
                        <span class="badge badge-lg bg-dark">Save {{intval(100-($product->sale_price / $product->price * 100))}}%</span>
                        @endif 
                    </div>
                    <div class="product-description-short">
                        <p>{{$product->intro}}</p>
                    </div>
                    <div class="product-variants">
                        <div class="product-variants-item">
                            <span class="control-label">Color</span>
                            <ul>
                                @foreach($colors as $c)
                                @if($c)
                                <li class="input-container">
                                    <label>
                                    <input class="input-color" type="radio" name="color" value="{{$c->id}}" required>
                                    <span class="color" style="background-color: {{ $c->value }} "></span>
                                    </label>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="product-add-to-cart">
                     
                            
                            <div>
                                {{-- <button data-bs-toggle="modal" data-bs-target="#add-to-cart" class="btn btn-dark" > --}}
                                    <a href="{{ route('client.addToCart',['slug'=>$product->slug, 'quantity'=> 1, 'id'=>$c->id])}}">Add to cart</a>
                                {{-- </button> --}}
                            </div>


                            
                        </div>
                        <div class="product-add-to-card">
                            <a class="product-add-to-card-item" href="#"><i class="ion-ios-heart-outline"></i> Add to wishlist</a>
                            <a class="product-add-to-card-item" href="#"><i class="ion-android-sync"></i> My wishlist</a>
                        </div>
                        <div class="product-social-sharing">
                            <span>Share</span>
                            <ul>
                                <li class="facebook"><a href="#" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                <li class="twitter"><a href="#" target="_blank"><i class="ion-social-twitter"></i></a></li>
                                <li class="pinterest"><a href="#" target="_blank"><i class="ion-social-pinterest"></i></a></li>
                                <li class="google"><a href="#" target="_blank"><i class="ion-social-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal gallery slider end -->
<section class="section-padding-bottom section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs single-product-tab justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#productdetails" role="tab" aria-selected="false">Product
                        Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="true">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="description" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="single-product-desc">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="productdetails" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="single-product-desc">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>Material</span>
                                        @foreach ($material as $item)
                                        {{$item->value}}
                                        @endforeach
                                    </li>
                                    <li><span>Dimensions</span>
                                        @foreach ($dimension as $item)
                                        {{$item->value}}
                                        @endforeach
                                    </li>
                                    <li><a href='//'>Download  Direction for Use</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active show" id="reviews" role="tabpanel">
                <div class="single-product-desc">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    {{-- 
                                    <div class="review-img">
                                        <img src="{{asset('client/assets/images/testimonial/1.png')}}" alt="">
                                    </div>
                                    --}}
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci
                                                luctustrices posuere cubilia Curae Suspendisse
                                                viverra ed viverra. Mauris ullarper euismod
                                                vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    {{-- 
                                    <div class="review-img">
                                        <img src="{{asset('client/assets/images/testimonial/2.png')}}" alt="">
                                    </div>
                                    --}}
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci
                                                luctustrices posuere cubilia Curae Sus pen disse
                                                viverra ed viverra. Mauris ullarper euismod
                                                vehicula.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button type="submit" class="btn btn-dark">
                                                    Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured product start -->
<div class="featured-product-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="section-title text-center">
                    <h3 class="title">Featured Products</h3>
                </section>
            </div>
            <div class="col-12">
                <div class="featured-product swiper-arrow arrow-position-center">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach($products_related as $pr)
                            <div class="swiper-slide">
                                <div class="product-list">
                                    <div class="product-card">
                                        <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                        {{-- <span class="onsale bg-danger">sale!</span> --}}
                                        <img src="{{asset('uploads/'.$pr->image)}}" alt="image_not_found" class="img-fluid" style="height: 415px;">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="shop-grid-left-sidebar.html" class="product-title">{{$pr->name}}</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price">
                                                @if(!$pr->sale_price)
                                                $ {{$pr->price}}
                                                @else
                                                <del
                                                    class="old-price">{{ $pr->price }}</del> <span
                                                    class="new-price">{{ $pr->sale_price }}</span>
                                                <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($pr->sale_price / $pr->price * 100))}}%</span>
                                                @endif 
                                                </h5>

                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">
                                                    <a href="{{ route('detail',['slug'=>$pr->slug]) }}">Detail</a>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <!-- product list end -->
                            </div>
                            <!-- swiper-slide end -->
                            @endforeach
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="featured-product swiper-button-prev"></div>
                    <div class="featured-product swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured product end -->
<!-- main content end -->
@endsection