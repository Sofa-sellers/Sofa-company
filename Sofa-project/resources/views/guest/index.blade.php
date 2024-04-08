@extends('master')
@section('module','Home')
@section('content')
    <!-- main content start -->

    <!-- Hero Slider Start -->
    

    <section class="hero-section">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- swiper-slide start -->
                    <div class="hero-slide-item slider-height1 swiper-slide slide-bg1">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-slide-content">
                                        <p class="text text-white animated">
                                            new collection
                                        </p>
                                        <br>
                                        <h2 class="title text-dark delay1 animated">
                                            Custom Wooden
                                        </h2>
                                        <br />
                                        <h2 class="title text-dark delay2 animated">
                                            Tables Decor
                                        </h2>
                                        <br />
                                        <a href="{{route('indexShop')}}" class="btn animated btn-outline-dark">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->

                    <!-- swiper-slide start -->
                    <div class="hero-slide-item slider-height1 swiper-slide slide-bg2">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-slide-content">
                                        <p class="text text-white animated">
                                            our new design
                                        </p>
                                        <br>
                                        <h2 class="title text-dark delay1 animated" style="color: white !important;">
                                            Capsule Soft
                                        </h2>
                                        <br />
                                        <h2 class="title text-dark delay2 animated" style="color: white !important;">
                                            Seating
                                        </h2>
                                        <br />
                                        <a href="{{route('indexShop')}}" class="btn animated btn-outline-dark" style="color: white !important; border-color: white !important;">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- swiper navigation -->
            <div class="d-none d-lg-block">
                <div class="swiper-button-prev">
                    <i class="ion-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="ion-chevron-right"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Slider End -->

    <!-- Banner section Start -->
    <section class="banner-section section-padding-bottom section-padding-top">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-8 mb-4">
                    <div class="banner">
                        <!-- thumb-nail start -->
                        <a href="{{route('indexShop')}}" class="thumb-nail">
                            <img src="https://www.liveenhanced.com/wp-content/uploads/2019/12/9-curved-sofa.jpg" alt="image_not_found" style="max-height: 600px; min-height:600px;" class="img-fluid">
                        </a>
                        <!-- thumb-nail end -->
                        <div class="banner-content banner-position-top-left">
                            <span class="banner-sub-title">Furniture</span>
                            <h3 class="banner-title">For Sale</h3>

                            <a href="shop-grid-left-sidebar.html" style="color: white !important; border-color: white !important;" class="btn btn-outline-dark">Shop Now</a>
                           
                        </div>
                        <!-- banner-content end -->
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="banner">
                        <!-- thumb-nail start -->
                        <a href="{{route('indexShop')}}" class="thumb-nail">
                            <img src="https://img2.cgtrader.com/items/662848/928da42182/sofa-boconcept-hampton-3d-model-max-obj-fbx.jpg" alt="image_not_found"  style="max-height: 600px; min-height:600px;" class="img-fluid">
                        </a>
                        <!-- thumb-nail end -->
                        <div class="banner-content banner-position-bottom-left">
                            <span class="banner-sub-title">Led</span>
                            <h3 class="banner-title">bulbs</h3>

                            <a href="shop-grid-left-sidebar.html" style="color: white !important; border-color: white !important;" class="btn btn-outline-dark">Shop Now</a>

                        </div>
                        <!-- banner-content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner section End -->


    <!-- product tab section start -->
    <section class="product-tab-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <!-- tabs liks start -->
                <div class="col-12">
                    <ul class="nav nav-pills product-tab-nav" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-arrivals">New
                                Arrivals</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-seller">Best
                                Sellers</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-onsale">On
                                Sale</button>
                        </li>
                    </ul>
                </div>
                <!-- tabs liks end -->
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        <!-- tab-pane one -->
                        <div class="tab-pane fade show active" id="pills-arrivals">
                            <div class="product-tab-list swiper-arrow arrow-position-center">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        @foreach($products_lastest as $item)
                                        {{-- @php
                                            $max = 5; // Số lần lặp
                                        @endphp

                                        @for ($i = 0; $i < $max; $i++) --}}
                                        <div class="swiper-slide">
                                            
                                            {{-- @switch($item->id )
                                                @case($item->id / 2 == 0) --}}
                                                
                                                <div class="product-list">
                                                    <div class="product-card">
                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-thumb">
                                                            {{-- <span class="onsale bg-danger">sale!</span> --}}
                                                            <img src="{{ asset('uploads/'.$item->image) }}"
                                                                alt="image_not_found" class="img-fluid" style="height: 415px;">
                                                        </a>
                                                        <!-- thumb end -->
    
                                                        
                                                        <div class="product-content">
                                                            <h4><a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-title">{{ $item->name }}</a></h4>
                                                            <i><a href="{{ route('detail',['slug'=>$item->slug]) }}" style="color: gray">{{ $item->intro }}</a></i>
                                                            <div class="product-group">
                                                                <h5 class="product-price">
                                                                    @if(!$item->price)
                                                                    $ {{ number_format($item->sale_price, 0, "", ".") }}
                                                                    @else
                                                                    <del
                                                                        class="old-price">$ {{ number_format($item->price, 0, "", ".") }}</del> <span
                                                                        class="new-price">$ {{ number_format($item->sale_price, 0, "", ".") }}</span>
                                                                    <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($item->sale_price / $item->price * 100))}}%</span>
                                                                    @endif 
                                                                    </h5>
                                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">
                                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-btn">Detail</a>
                                                                    </button>
                                                            </div>
    
                                                        </div>
                                                        
    
                                                        <!-- actions  -->
                                                        {{-- <ul class="actions actions-verticale">
                                                            <li class="action wish-list">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist" style="color: black">
                                                                    <a href="{{ route('client.showWishlist') }}">
                                                                        <i class="ion-ios-heart-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                            <li class="action quick-view">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal">
                                                                    <a href="{{ route('detail',['slug'=>$item->slug]) }}">
                                                                        <i class="ion-ios-eye-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                            <li class="action compare">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare">
                                                                    <a href="{{ route('showCompare') }}">
                                                                        <i class="ion-android-sync"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            
                                        
                                        </div>
                                        @endforeach
                                       
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="product-tab-list swiper-button-prev"></div>
                                <div class="product-tab-list swiper-button-next"></div>
                            </div>
                        </div>
                        <!-- tab-pane end -->
                        <!-- tab-pane two -->
                        <div class="tab-pane fade" id="pills-seller">
                            <div class="product-tab-list swiper-arrow arrow-position-center">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        @foreach($products_lastest as $item)
                                        {{-- @php
                                            $max = 5; // Số lần lặp
                                        @endphp

                                        @for ($i = 0; $i < $max; $i++) --}}
                                        <div class="swiper-slide">
                                            
                                            {{-- @switch($item->id )
                                                @case($item->id / 2 == 0) --}}
                                                
                                                <div class="product-list">
                                                    <div class="product-card">
                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-thumb">
                                                        
                                                            <img src="{{ asset('uploads/'.$item->image) }}"
                                                                alt="image_not_found" class="img-fluid" style="height: 415px;">
                                                        </a>
                                                        <!-- thumb end -->
    
                                                        
                                                        <div class="product-content">
                                                            <h4><a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-title">{{ $item->name }}</a></h4>
                                                            <i><a href="{{ route('detail',['slug'=>$item->slug]) }}" style="color: gray">{{ $item->intro }}</a></i>

                                                            <div class="product-group">
                                                                <h5 class="product-price">
                                                                    @if(!$item->price)
                                                                    $ {{ number_format($item->sale_price, 0, "", ".") }}
                                                                    @else
                                                                    <del
                                                                        class="old-price">$ {{ number_format($item->price, 0, "", ".") }}</del> <span
                                                                        class="new-price">$ {{ number_format($item->sale_price, 0, "", ".") }}</span>
                                                                        <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($item->sale_price / $item->price * 100))}}%</span>
                                                                    @endif 
                                                                    </h5>
                    
                                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">
                                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}"class="product-btn">Detail</a>
                                                                    </button>
                                                            </div>
    
                                                        </div>
                                                        
    
                                                        <!-- actions  -->
                                                        {{-- <ul class="actions actions-verticale">
                                                            <li class="action wish-list">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist">
                                                                    <a href="{{ route('client.showWishlist') }}">
                                                                        <i class="ion-ios-heart-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                            <li class="action quick-view">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal">
                                                                    <a href="{{ route('detail',['slug'=>$item->slug]) }}">
                                                                        <i class="ion-ios-eye-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                            <li class="action compare">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare">
                                                                    <a href="{{ route('showCompare') }}">
                                                                        <i class="ion-android-sync"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            

                                        </div>
                                        @endforeach
                                        <!-- swiper-slide end -->
                                        
                                       
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="product-tab-list swiper-button-prev"></div>
                                <div class="product-tab-list swiper-button-next"></div>
                            </div>
                        </div>
                        <!-- tab-pane end -->
                        <!-- tab-pane three -->
                        <div class="tab-pane fade" id="pills-onsale">
                            <div class="product-tab-list swiper-arrow arrow-position-center">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        @foreach($products_lastest as $item)
                                        {{-- @php
                                            $max = 5; // Số lần lặp
                                        @endphp

                                        @for ($i = 0; $i < $max; $i++) --}}
                                        <div class="swiper-slide">
                                            
                                            {{-- @switch($item->id )
                                                @case($item->id / 2 == 0) --}}
                                                
                                                <div class="product-list">
                                                    <div class="product-card">
                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-thumb">

                                                            
                                                            <img src="{{ asset('uploads/'.$item->image) }}"
                                                                alt="image_not_found" class="img-fluid" style="height: 415px;">
                                                        </a>
                                                        <!-- thumb end -->
    
                                                        <div class="product-content">

                                                            <i><a href="{{ route('detail',['slug'=>$item->slug]) }}" style="color: gray">{{ $item->intro }}</a></i>

                                                            <h4><a href="{{route('indexShop')}}" class="product-title">{{ $item->name }}</a></h4>

                                                            <div class="product-group">
                                                                <h5 class="product-price">
                                                                    @if(!$item->price)
                                                                    $ {{ number_format($item->sale_price, 0, "", ".") }}
                                                                    @else
                                                                    <del
                                                                        class="old-price">$ {{ number_format($item->price, 0, "", ".") }}</del> <span
                                                                        class="new-price">$ {{ number_format($item->sale_price, 0, "", ".") }}</span>
                                                                        <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($item->sale_price / $item->price * 100))}}%</span>
                                                                    @endif 
                                                                    </h5>
                    
                                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">
                                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}"class="product-btn">Detail</a>
                                                                    </button>
                                                            </div>
    
                                                        </div>
                                                        
    
                                                        <!-- actions  -->
                                                        {{-- <ul class="actions actions-verticale">
                                                            <li class="action wish-list">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist">
                                                                    <a href="{{ route('client.showWishlist') }}">
                                                                        <i class="ion-ios-heart-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                            <li class="action quick-view">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal">
                                                                    <a href="{{ route('detail',['slug'=>$item->slug]) }}">
                                                                        <i class="ion-ios-eye-outline"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                            <li class="action compare">
                                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare">
                                                                    <a href="{{ route('showCompare') }}">
                                                                        <i class="ion-android-sync"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
    
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            
                                               
                                        </div>
                                        @endforeach
                                   
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="product-tab-list swiper-button-prev"></div>
                                <div class="product-tab-list swiper-button-next"></div>
                            </div>
                        </div>
                        <!-- tab-pane end -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- product tab section end -->

    <!-- decoration slider start -->

    <div class="decoration-slider-section bg-light section-padding-top section-padding-bottom">
        <!-- section title section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="section-title text-center">
                        <h3 class="title">Shop By Room</h3>
                    </section>
                </div>
            </div>
        </div>
        <!-- section title section -->

        <div class="container-fluid px-xl-0">
            <div class="decoration-slider-active swiper-arrow arrow-position-center-fixed">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($categories as $cate)
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="{{ route('shop',['cate_id'=>$cate->id])}}">
                                    <img src="https://i.pinimg.com/originals/1b/75/52/1b755295f7959123be58a813e735a8e7.jpg" alt="image_not_found" class="img-fluid">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">{{$cate->name}}</h3>
                                    <a href="{{ route('shop',['cate_id'=>$cate->id])}}" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="decoration-slider-active swiper-button-prev"></div>
                <div class="decoration-slider-active swiper-button-next"></div>
            </div>
        </div>
    </div>
    <!-- decoration slider end -->

    <!-- large banner section start -->
    <section class="large-banner-section section-padding-top section-padding-bottom">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-4 mb-4">
                    <div class="large-banner-content text-center text-lg-end">
                        <h3 class="large-banner-sub-title">Select Home Decor</h3>
                        <h3 class="large-banner-sub-title">& Furniture</h3>
                        <h4 class="large-banner-title">Up to 35% Off</h4>
                        <a href="{{route('indexShop')}}" class="btn btn-outline-dark">Shop Decor</a>
                        <a href="{{route('indexShop')}}" class="btn btn-outline-dark">Shop Furniture</a>
                    </div>
                    <!-- large-banner-content end -->
                    <a href="shop-grid-left-sidebar.html" class="thumb-nail">
                        <img src="{{asset('client/assets/images/banner/banner3.jpg')}}" alt="image_not_found" style="width:460px; height:400px" class="img-fluid">
                    </a>
                    <!-- thumb-nail end-->
                </div>
                <div class="col-lg-8 mb-4">
                    <div class="large-banner-wrap position-relative">
                        <a href="shop-grid-left-sidebar.html" class="large-thumb-nail">
                            <img src="{{asset('client/assets/images/banner/banner4.jpg')}}" alt="image_not_found" style="width:570px; height:700px" class="img-fluid">
                        </a>
                        <!-- thumb-nail end-->
                        <a href="shop-grid-left-sidebar.html" class="small-thumb-nail">
                            <img src="{{asset('client/assets/images/banner/banner5.jpg')}}" alt="image_not_found" style="width:416px; height:406px" class="img-fluid">
                        </a>
                        <!-- thumb-nail end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- large banner section end -->

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
                                @foreach($products_lastest as $item)
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-thumb">
                                                
                                                <img src="{{ asset('uploads/'.$item->image) }}" alt="image_not_found" style="height: 415px;">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="{{ route('detail',['slug'=>$item->slug]) }}" class="product-title">{{ $item->name }}</a></h4>
                                                <i><a href="{{ route('detail',['slug'=>$item->slug]) }}" style="color: gray">{{ $item->intro }}</a></i>
                                                <div class="product-group">
                                                    <h5 class="product-price">
                                                        @if($item->price==0)
                                                        $ {{ number_format($item->sale_price, 0, "", ".") }}
                                                        @else
                                                        <del class="old-price">$ {{ number_format($item->price, 0, "", ".") }}</del> 
                                                            <span class="new-price">$ {{ number_format($item->sale_price, 0, "", ".") }}</span>
                                                            <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($item->sale_price / $item->price * 100))}}%</span>
                                                        @endif 
                                                        </h5>
        
                                                        <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">
                                                            <a href="{{ route('detail',['slug'=>$item->slug]) }}"class="product-btn">Detail</a>
                                                        </button>
                                                </div>

                                            </div>

                                            
                                            <!-- actions  -->
                                            {{-- <ul class="actions actions-verticale">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#product-modal-wishlist"><i
                                                            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                            class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#product-modal-compare"><i
                                                            class="ion-android-sync"></i></button>
                                                </li>

                                            </ul> --}}
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
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


    <!-- brand carousel start -->
    <div class="brand-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-carousel swiper-arrow arrow-position-center">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/1.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/2.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/3.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/4.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/5.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="{{asset('client/assets/images/brand/6.png')}}" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                            </div>

                        </div>

                        <!-- swiper navigation -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brand carousel end -->
    <!-- main content end -->
@endsection