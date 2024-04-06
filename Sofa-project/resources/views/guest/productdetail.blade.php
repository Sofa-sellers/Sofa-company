@extends('master')
@section('module','Product Detail')
@section('content')


    <!-- main content start -->
    <!-- bread crumb section start -->
    <!-- <nav class="breadcrumb-section bg-light bread-crumb-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">63in. White Stucco Floor Lamp</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav> -->
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
                <!--Product start  -->
                <div class="col-md-7 mb-4">
                    <form method="post" action="{{ route('client.addToCart')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
        
                        <div class="modal-product-des">
                            <h3 class="modal-product-title"><a href="#">{{$product->name}}</a></h3>
                            
                            {{-- Star --}}
                            {{-- <div class="reviews">
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                            </div> --}}

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
                                            <input type="hidden" name="selected_color" value="{{$c->id}}">
                                        </li>
                                        
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="product-add-to-cart">
                                <span class="control-label">Quantity</span>

                                <div class="product-count style d-flex my-4">
                                    <div class="count d-flex">
                                        <input type="number" min="1" max="100" step="1" value="1" name="quantity" disabled>
                                        <div class="button-group">
                                            <button class="count-btn increment">
                                                <span class="ion-chevron-up"></span>
                                            </button>
                                            <button class="count-btn decrement">
                                                <span class="ion-chevron-down"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#add-to-cart" class="btn animated btn-outline-dark">
                                            Add to cart
                                        </button>
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
                    </form>
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

                {{-- comment --}}
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
                {{-- comment --}}
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
                                                    <h4><a href="{{ route('detail',['slug'=>$pr->slug]) }}" class="product-title">{{ $pr->name }}</a></h4>
                                                    <i><a href="{{ route('detail',['slug'=>$pr->slug]) }}" class="product-title" style="color: gray">{{ $pr->intro }}</a></i>

                                                    <div class="product-group">
                                                        <h5 class="product-price">
                                                            @if(!$pr->sale_price)
                                                            $ {{$pr->price}}
                                                            @else
                                                            <del
                                                                class="old-price">$ {{ $pr->price }}</del> <span
                                                                class="new-price">$ {{ $pr->sale_price }}</span>
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

    <!-- footer section start -->
    <section class="news-letter-sectoin bg-dark">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="border-bottom">
                        <div class="row align-items-center mb-n4">
                            <div class="col-lg-10 col-xl-9 mb-4">
                                <div class="news-letter-wrap">
                                    <div class="news-letter-title">
                                        <h3 class="title">Subscribe to Our Newsletter</h3>
                                        <p>Sign up for our e-mail to get latest news.
                                        </p>
                                    </div>

                                    <form id="mc-form" class="news-letter-form" action="#">
                                        <input id="mc-email" class="form-control" name="email" type="email" placeholder="Your email address">
                                        <button class="sign-up-btn" type="submit">Sign up</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xl-3 mb-4">
                                <h3 class="social-title">Follow us on</h3>
                                <div class="social-links social-links-dark">
                                    <a class="social-link facebook" href="#"><i class="ion-social-facebook"></i></a>
                                    <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                    <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                    <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
                                    <a class="social-link instagram" href="#"><i class="ion-social-rss"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <a class="footer-brand" href="index.html">
                            <img src="assets/images/logo/logo-white.svg" alt="images_not_found">
                        </a>
                        <span class="need-help">Need Help?</span>
                        <p>
                            <a href="mailto:support@demothemes.com">Support@demothemes.com</a>
                            <br>
                            <a href="tel:0123456789">0123456789</a>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">Information</h4>
                        <ul class="footer-menu">
                            <li class="footer-menu-items"><a class="footer-menu-link" href="wishlist.html">Wishlist</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="contact-us.html">Contact us</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="about-us.html">About Us</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="frequently.html">Frequently Questions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">Categories</h4>
                        <ul class="footer-menu">
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Limes</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Mangoes</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Chickpea</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Avocados</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Cauliflower</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">About Us</h4>
                        <p>
                            We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.

                        </p>
                        <p class="mb-0">Address: 4710-4890 Breckinridge St, Fayettevill</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="copy-right bg-dark">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="border-top">
                            <div class="row mb-n4">
                                <div class="col-12 col-md-6 mb-4 order-last order-md-first">
                                    <p class="text-center text-md-start">&copy; <span id="currentYear"></span> Made With <i
                              class="ion-heart"></i> By <a href="https://hasthemes.com">HasThemes</a> All Rights
                                        Reserved </p>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="payment text-center text-md-end">
                                        <a href="#">
                                            <img src="assets/images/logo/payment.png" alt="images_not_found">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- footer end -->
    <!-- footer section end -->
    <!-- modals -->
    <!-- Modal -->
    <div class="modal fade" id="product-modal">
        <div class="modal-dialog modal-dialog-centered product-modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row mb-n7">
                        <div class="col-md-5 mb-7">
                            <div class="modal-gallery-slider">
                                <div class="product-modal-gallery">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide product-modal-gallery-item">
                                                <img src="assets/images/products/large/1.jpg" alt="image_not_found">
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-item">
                                                <img src="assets/images/products/large/2.jpg" alt="image_not_found">
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-item">
                                                <img src="assets/images/products/large/3.jpg" alt="image_not_found">
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-item">
                                                <img src="assets/images/products/large/4.jpg" alt="image_not_found">
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-item">
                                                <img src="assets/images/products/large/5.jpg" alt="image_not_found">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="product-modal-gallery-thumbs">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide product-modal-gallery-thumbs-item">
                                                <a href="javascript:void(0)">
                                                    <img src="assets/images/products/small/1.jpg" alt="image_not_found">
                                                </a>
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-thumbs-item">
                                                <a href="javascript:void(0)"> <img src="assets/images/products/small/2.jpg" alt="image_not_found"></a>
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-thumbs-item">
                                                <a href="javascript:void(0)"> <img src="assets/images/products/small/3.jpg" alt="image_not_found"></a>
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-thumbs-item">
                                                <a href="javascript:void(0)"> <img src="assets/images/products/small/4.jpg" alt="image_not_found"></a>
                                            </div>
                                            <div class="swiper-slide product-modal-gallery-thumbs-item">
                                                <a href="javascript:void(0)"> <img src="assets/images/products/small/5.jpg" alt="image_not_found"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-7 mb-7">
                            <div class="modal-product-des">
                                <h3 class="modal-product-title"><a href="#">Tropical Juice Drink</a></h3>
                                <div class="reviews">
                                    <span class="ion-star"></span>
                                    <span class="ion-star"></span>
                                    <span class="ion-star"></span>
                                    <span class="ion-star"></span>
                                    <span class="ion-star"></span>
                                </div>

                                <div class="product-price-wrapp-lg">
                                    <span class="product-regular-price-lg">€43.80</span>
                                    <span class="product-price-on-sale-lg">€39.42</span>
                                    <span class="badge badge-lg bg-dark">Save 8%</span>
                                </div>

                                <div class="product-description-short">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
                                </div>

                                <div class="product-variants">
                                    <div class="product-variants-item">
                                        <span class="control-label">Size</span>
                                        <select class="form-control form-control-select">
                                            <option value="1" title="S" selected="selected">S</option>
                                            <option value="2" title="M">M</option>
                                            <option value="3" title="L">L</option>
                                            <option value="4" title="XL">XL</option>
                                        </select>
                                    </div>
                                    <div class="product-variants-item">
                                        <span class="control-label">color</span>
                                        <ul>
                                            <li class="input-container">
                                                <label>
                                                    <input class="input-color" type="checkbox">
                                                    <span class="color"></span>
                                                </label>
                                            </li>
                                            <li class="input-container">
                                                <label>
                                                    <input class="input-color" type="checkbox" checked="checked">
                                                    <span class="color"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-add-to-cart">
                                    <span class="control-label">Quantity</span>

                                    <div class="product-count style d-flex my-4">
                                        <div class="count d-flex">
                                            <input type="number" min="1" max="100" step="1" value="1">
                                            <div class="button-group">
                                                <button class="count-btn increment">
                                                    <span class="ion-chevron-up"></span>
                                                </button>
                                                <button class="count-btn decrement">
                                                    <span class="ion-chevron-down"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <button data-bs-toggle="modal" data-bs-target="#add-to-cart" class="btn btn-dark">
                                                Add to cart
                                            </button>
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
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="product-modal-compare">
        <div class="modal-dialog modal-dialog-centered compare-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p> <i class="ion-checkmark"></i> Product added to compare.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="product-modal-wishlist">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p> You must be logged in to manage your wishlist.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addto-cart-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark border-bottom-0 justify-content-center">
                    <span class="ion-android-done me-5"></span>
                    <h4 class="modal-title text-center">Product successfully added to your shopping cart</h4>
                    <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal end -->

@endsection