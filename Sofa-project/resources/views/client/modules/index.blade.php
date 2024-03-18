<!DOCTYPE html>
<html lang="en">
<!-- head start -->

<head>

   @include('client.partials.header')

</head>
<!-- head end -->

<body>
@include('client.partials.menu')
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
                                        <a href="shop-grid-3-column.html" class="btn animated btn-outline-dark">Shop
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
                                        <h2 class="title text-dark delay1 animated">
                                            Capsule Soft
                                        </h2>
                                        <br />
                                        <h2 class="title text-dark delay2 animated">
                                            Seating
                                        </h2>
                                        <br />
                                        <a href="shop-grid-3-column.html" class="btn animated btn-outline-dark">Shop
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
                        <a href="#" class="thumb-nail">
                            <img src="assets/images/banner/banner1.jpg" alt="image_not_found">
                        </a>
                        <!-- thumb-nail end -->
                        <div class="banner-content banner-position-top-left">
                            <span class="banner-sub-title">Furniture</span>
                            <h3 class="banner-title">For Sale</h3>
                            <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Shop Now</a>
                        </div>
                        <!-- banner-content end -->
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="banner">
                        <!-- thumb-nail start -->
                        <a href="#" class="thumb-nail">
                            <img src="assets/images/banner/banner2.jpg" alt="image_not_found">
                        </a>
                        <!-- thumb-nail end -->
                        <div class="banner-content banner-position-bottom-left">
                            <span class="banner-sub-title">Led</span>
                            <h3 class="banner-title">bulbs</h3>
                            <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Shop Now</a>
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
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product1.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">3 Tier
                                                                Wood With Metal Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product2.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">63in.
                                                                White Stucco Floor Lamp</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product3.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">68in.
                                                                Bronze Metal Coat Rack</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00 - $60.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product4.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Emmy
                                                                Green Floral Wood Leg</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot!</span>
                                                        <img src="assets/images/products/product5.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Circle Mirrored Shelf Bar Cart</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product6.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Clothing Rack With</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product7.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Fox Design Trinket Tray</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product8.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Heirloom
                                                                Gold Metal Folding Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product9.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Parkview
                                                                5 Tier Metal & Wood</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product10.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Rabbit
                                                                Grey Faux Fur Pouf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
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
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product1.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">3 Tier
                                                                Wood With Metal Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product2.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">63in.
                                                                White Stucco Floor Lamp</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product3.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">68in.
                                                                Bronze Metal Coat Rack</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00 - $60.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product4.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Emmy
                                                                Green Floral Wood Leg</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot!</span>
                                                        <img src="assets/images/products/product5.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Circle Mirrored Shelf Bar Cart</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product6.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Clothing Rack With</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product7.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Fox Design Trinket Tray</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product8.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Heirloom
                                                                Gold Metal Folding Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product9.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Parkview
                                                                5 Tier Metal & Wood</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product10.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Rabbit
                                                                Grey Faux Fur Pouf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
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
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product1.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">3 Tier
                                                                Wood With Metal Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product2.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">63in.
                                                                White Stucco Floor Lamp</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product3.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">68in.
                                                                Bronze Metal Coat Rack</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price">$85.00 - $60.00</h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product4.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Emmy
                                                                Green Floral Wood Leg</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot!</span>
                                                        <img src="assets/images/products/product5.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Circle Mirrored Shelf Bar Cart</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product6.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Clothing Rack With</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product7.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Gold
                                                                Metal Fox Design Trinket Tray</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="assets/images/products/product8.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Heirloom
                                                                Gold Metal Folding Shelf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-success">new</span>
                                                        <img src="assets/images/products/product9.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Parkview
                                                                5 Tier Metal & Wood</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                            <div class="product-list">
                                                <div class="product-card">
                                                    <a href="single-product.html" class="product-thumb">
                                                        <span class="onsale bg-warning">hot</span>
                                                        <img src="assets/images/products/product10.jpg"
                                                            alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content">
                                                        <h4><a href="single-product.html" class="product-title">Rabbit
                                                                Grey Faux Fur Pouf</a></h4>
                                                        <div class="product-group">
                                                            <h5 class="product-price"><del
                                                                    class="old-price">$85.00</del> <span
                                                                    class="new-price">$60.00</span></h5>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#addto-cart-modal"
                                                                class="product-btn">Add to cart</button>
                                                        </div>

                                                    </div>
                                                    <!-- actions  -->
                                                    <ul class="actions actions-verticale">
                                                        <li class="action whish-list">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></button>
                                                        </li>
                                                        <li class="action quick-view">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal"><i
                                                                    class="ion-ios-eye-outline"></i></button>
                                                        </li>

                                                        <li class="action compare">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#product-modal-compare"><i
                                                                    class="ion-android-sync"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product list end -->
                                        </div>
                                        <!-- swiper-slide end -->
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
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="shop-grid-left-sidebar.html">
                                    <img src="assets/images/decoration/1.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Kitchen Room</h3>
                                    <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="shop-grid-left-sidebar.html">
                                    <img src="assets/images/decoration/2.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Living Room</h3>
                                    <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="shop-grid-left-sidebar.html">
                                    <img src="assets/images/decoration/3.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Bedroom</h3>
                                    <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
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
                        <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Shop Decor</a>
                        <a href="shop-grid-left-sidebar.html" class="btn btn-outline-dark">Shop Furniture</a>
                    </div>
                    <!-- large-banner-content end -->
                    <a href="shop-grid-left-sidebar.html" class="thumb-nail">
                        <img src="assets/images/banner/banner3.jpg" alt="image_not_found">
                    </a>
                    <!-- thumb-nail end-->
                </div>
                <div class="col-lg-8 mb-4">
                    <div class="large-banner-wrap position-relative">
                        <a href="shop-grid-left-sidebar.html" class="large-thumb-nail">
                            <img src="assets/images/banner/banner4.jpg" alt="image_not_found">
                        </a>
                        <!-- thumb-nail end-->
                        <a href="shop-grid-left-sidebar.html" class="small-thumb-nail">
                            <img src="assets/images/banner/banner5.jpg" alt="image_not_found">
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
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                                <span class="onsale bg-danger">sale!</span>
                                                <img src="assets/images/products/product1.jpg" alt="image_not_found">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="shop-grid-left-sidebar.html" class="product-title">3 Tier
                                                        Wood With Metal Shelf</a></h4>
                                                <div class="product-group">
                                                    <h5 class="product-price"><del class="old-price">$85.00</del> <span
                                                            class="new-price">$60.00</span></h5>
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"
                                                        class="product-btn">Add to cart</button>
                                                </div>

                                            </div>
                                            <!-- actions  -->
                                            <ul class="actions actions-verticale">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
                                <!-- swiper-slide end -->
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                                <span class="onsale bg-danger">sale!</span>
                                                <img src="assets/images/products/product3.jpg" alt="image_not_found">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="shop-grid-left-sidebar.html" class="product-title">68in.
                                                        Bronze Metal Coat Rack</a></h4>
                                                <div class="product-group">
                                                    <h5 class="product-price">$85.00 - $60.00</h5>
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"
                                                        class="product-btn">Add to cart</button>
                                                </div>

                                            </div>
                                            <!-- actions  -->
                                            <ul class="actions actions-verticale">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
                                <!-- swiper-slide end -->
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                                <span class="onsale bg-warning">hot!</span>
                                                <img src="assets/images/products/product5.jpg" alt="image_not_found">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="shop-grid-left-sidebar.html" class="product-title">Gold
                                                        Circle Mirrored Shelf Bar Cart</a></h4>
                                                <div class="product-group">
                                                    <h5 class="product-price"><del class="old-price">$85.00</del> <span
                                                            class="new-price">$60.00</span></h5>
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"
                                                        class="product-btn">Add to cart</button>
                                                </div>

                                            </div>
                                            <!-- actions  -->
                                            <ul class="actions actions-verticale">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
                                <!-- swiper-slide end -->
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                                <span class="onsale bg-warning">hot</span>
                                                <img src="assets/images/products/product7.jpg" alt="image_not_found">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="shop-grid-left-sidebar.html" class="product-title">Gold
                                                        Metal Fox Design Trinket Tray</a></h4>
                                                <div class="product-group">
                                                    <h5 class="product-price"><del class="old-price">$85.00</del> <span
                                                            class="new-price">$60.00</span></h5>
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"
                                                        class="product-btn">Add to cart</button>
                                                </div>

                                            </div>
                                            <!-- actions  -->
                                            <ul class="actions actions-verticale">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
                                <!-- swiper-slide end -->
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-card">
                                            <a href="shop-grid-left-sidebar.html" class="product-thumb">
                                                <span class="onsale bg-success">new</span>
                                                <img src="assets/images/products/product9.jpg" alt="image_not_found">
                                            </a>
                                            <!-- thumb end -->
                                            <div class="product-content">
                                                <h4><a href="shop-grid-left-sidebar.html" class="product-title">Parkview
                                                        5 Tier Metal & Wood</a>
                                                </h4>
                                                <div class="product-group">
                                                    <h5 class="product-price"><del class="old-price">$85.00</del> <span
                                                            class="new-price">$60.00</span></h5>
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"
                                                        class="product-btn">Add to cart</button>
                                                </div>

                                            </div>
                                            <!-- actions  -->
                                            <ul class="actions actions-verticale">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product list end -->

                                </div>
                                <!-- swiper-slide end -->
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
                                        <img src="assets/images/brand/1.png" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="assets/images/brand/2.png" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="assets/images/brand/3.png" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="assets/images/brand/4.png" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="assets/images/brand/5.png" alt="images_not_found">
                                    </a>
                                </div>
                                <!-- swiper-slide end-->
                                <!-- swiper-slide start -->
                                <div class="brand-carousel-item swiper-slide">
                                    <a href="#">
                                        <img src="assets/images/brand/6.png" alt="images_not_found">
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
@include('client.partials.footer')
   
    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->

    <script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="./assets/js/plugins/ajax-contact.js"></script>
    <script src="./assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="./assets/js/plugins/ajax-mailchimp.js"></script>
    <script src="./assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="./assets/js/plugins/jquery-ui.min.js"></script>
    <script src="./assets/js/plugins/scroll-up.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>