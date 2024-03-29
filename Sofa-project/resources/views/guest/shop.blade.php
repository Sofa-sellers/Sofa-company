@extends('master')
@section('module','Shop')
@section('content')
    <!-- shop page layout start -->
    <div class="shop-page-layout section-padding-bottom">
        <div class="container">
            <div class="row mb-n5">
                <div class="col-lg-9 mb-5">

                    <div class="row align-items-center mb-5">
                        <div class="col-12 col-md-6 ">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-tabs justify-content-center justify-content-md-start align-items-center" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link grid active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link list" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"></a>
                                    </li>
                                    <li>
                                        <span class="total-products text-capitalize">Showing 1–12 of 19 results</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex justify-content-center justify-content-md-end align-items-center">
                                <span class="sort-by">Sort by:</span>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="" value="1">Sort by popularity</option>
                                    <option value="2">Default sorting</option>
                                    <option value="3">Sort by popularity</option>
                                    <option value="4">Sort by average rating</option>
                                    <option value="5">Sort by latest</option>
                                    <option value="6">Sort by price: low to high</option>
                                    <option value="7">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row grid-view mb-n5">

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product1.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">3 Tier Wood With Metal Shelf</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-success">new</span>
                                            <img src="{{asset('client/assets/images/products/product2.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">63in. White Stucco Floor Lamp</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price">$85.00</h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product3.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">68in. Bronze Metal Coat Rack</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price">$85.00 - $60.00</h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-success">new</span>
                                            <img src="{{asset('client/assets/images/products/product4.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Emmy Green Floral Wood Leg</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-warning">hot!</span>
                                            <img src="{{asset('client/assets/images/products/product5.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Gold Circle Mirrored Shelf Bar Cart</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-success">new</span>
                                            <img src="{{asset('client/assets/images/products/product6.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Gold Metal Clothing Rack With</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-warning">hot</span>
                                            <img src="{{asset('client/assets/images/products/product7.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Gold Metal Fox Design Trinket Tray</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product8.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Heirloom Gold Metal Folding Shelf</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="single-product.html" class="product-thumb">
                                            <span class="onsale bg-success">new</span>
                                            <img src="{{asset('client/assets/images/products/product9.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="single-product.html" class="product-title">Parkview 5 Tier Metal & Wood</a>
                                            </h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- pagination -->
                                <div class="col-12 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropleft"></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropright"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row mb-n5 grid-view-list overflow-hidden">
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product1.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">3 Tier Wood With Metal Shelf</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product2.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">63in. White Stucco Floor Lamp</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product3.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">68in. Bronze Metal Coat Rack</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product4.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Emmy Green Floral Wood Leg</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product5.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Gold Circle Mirrored Shelf Bar Cart</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product6.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Gold Metal Clothing Rack With</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product7.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Gold Metal Fox Design Trinket Tray</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product8.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Heirloom Gold Metal Folding Shelf</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            <span class="onsale bg-danger">sale!</span>
                                            <img src="{{asset('client/assets/images/products/product9.jpg')}}" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">Parkview 5 Tier Metal & Wood</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">$85.00</del> <span class="new-price">$60.00</span>
                                            </h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum,
                                                gravida et mattis vulputate, tristique ut lectus</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i
            class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>

                                <!-- col-12 mb-5 end -->
                                <!-- pagination -->
                                <div class="col-12 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropleft"></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropright"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5 order-lg-first">
                    <aside class="aside">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Categories</h3>
                            <nav id="shop-dropdown" class="offcanvas-menu offcanvas-menu-sm">
                                <ul>
                                    <li><a href="#">Acrylic Dining <span>(1)</span></a></li>
                                    <li><a href="#">Floor Décor <span>(3)</span></a>
                                        <ul>
                                            <li><a href="#">Accessories <span>(1)</span></a></li>
                                            <li><a href="#">Chalkboards <span>(1)</span></a></li>
                                            <li><a href="#">Fireplace Screens <span>(1)</span></a></li>
                                            <li><a href="#">Holders Lanterns <span>(1)</span></a></li>
                                            <li><a href="#">Mirrors <span>(1)</span></a></li>
                                            <li><a href="#">Plants Trees <span>(1)</span></a></li>
                                            <li><a href="#">Sculptures <span>(1)</span></a></li>
                                            <li><a href="#">Signs Accents <span>(1)</span></a></li>
                                            <li><a href="#">Vases <span>(1)</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Home Accents <span>(5)</span></a>
                                        <ul>
                                            <li><a href="#">Bookends <span>(2)</span></a></li>
                                            <li><a href="#">Boxes Trunks <span>(2)</span></a></li>
                                            <li><a href="#">Candle Holders <span>(2)</span></a></li>
                                            <li><a href="#">Easels Risers Stands <span class="#">(2)</span></a></li>
                                            <li><a href="#">Figurines <span>(2)</span></a></li>
                                            <li><a href="#">Plates, Bowls <span>(2)</span></a></li>
                                            <li><a href="#">Spheres <span>(2)</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Kitchen Dining<span>(3)</span></a>
                                        <ul>
                                            <li><a href="#">Bar Wine <span>(1)</span></a></li>
                                            <li><a href="#">Bowls, Gadgets Utensils <span>(1)</span></a></li>
                                            <li><a href="#">Dinnerware <span>(1)</span></a> </li>
                                            <li><a href="#">Drinkware <span>(1)</span></a></li>
                                            <li><a href="#">Flatware Cutlery <span>(1)</span></a></li>
                                            <li><a href="#">Floor Mats <span>(1)</span></a></li>
                                            <li><a href="#">Storage <span>(1)</span></a></li>
                                            <li><a href="#">Table Linens <span>(1)</span></a> </li>
                                            <li><a href="#">Trash Cans <span>(1)</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Kitchen Cleaning <span>(1)</span></a></li>
                                    <li><a href="#">Lamps <span>(6)</span></a>
                                        <ul>
                                            <li><a href="#">Accent Lamps <span>(2)</span></a></li>
                                            <li><a href="#">Buffet Lamps <span>(2)</span></a></li>
                                            <li><a href="#">Desk Lamps <span>(2)</span></a></li>
                                            <li class="-64"><a href="#">Floor Lamps <span>(2)</span></a></li>
                                            <li><a href="#">Kids Lamps <span>(2)</span></a></li>
                                            <li><a href="#">Mini Accent Lamps <span>(2)</span></a> </li>
                                            <li><a href="#">Specialty Lamps <span>(2)</span></a></li>
                                            <li><a href="#">Table Lamps <span>(2)</span></a> </li>
                                            <li><a href="#">Task Lamps <span>(2)</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Melamine <span>(1)</span></a> </li>
                                    <li><a href="#">Party Supplies <span>(1)</span></a> </li>
                                    <li><a href="#">Serveware <span>(2)</span></a>
                                    </li>
                                    <li><a href="#">Uncategorized <span>(2)</span></a> </li>
                                    <li><a href="#">Wall Décor <span>(6)</span></a>
                                        <ul>
                                            <li><a href="#">Clocks <span>(1)</span></a> </li>
                                            <li><a href="#">Frames <span>(1)</span></a> </li>
                                            <li><a href="#">Hangers Hardware <span>(2)</span></a></li>
                                            <li><a href="#">Kids Wall Décor <span>(1)</span></a> </li>
                                            <li><a href="#">Mirrors <span>(1)</span></a></li>
                                            <li><a href="#">Organization <span>(2)</span></a></li>
                                            <li><a href="#">Wall Accents <span>(1)</span></a> </li>
                                            <li><a href="#">Wall Art <span>(2)</span></a></li>
                                            <li><a href="#">Wall Shelves <span>(1)</span></a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- sidebar widget end -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Price Filter</h3>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <span class="price-range">Price:</span>
                                    <input type="text" id="amount" name="price" readonly placeholder="Add Your Price" />
                                </div>
                            </div>
                        </div>
                        <!-- sidebar widget end -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Price Filter</h3>
                            <div class="widget-colors">
                                <ul class="colors">
                                    <li><a href="javascript:void(0)">Amber <span>(4)</span></a></li>
                                    <li><a href="javascript:void(0)">Beige <span>(4)</span></a></li>
                                    <li><a href="javascript:void(0)">Bronze <span>(4)</span></a></li>
                                    <li><a href="javascript:void(0)">Purple <span>(5)</span></a></li>
                                    <li><a href="javascript:void(0)">Green <span>(5)</span></a></li>
                                    <li><a href="javascript:void(0)">Red <span>(5)</span></a></li>
                                    <li><a href="javascript:void(0)">White <span>(4)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- sidebar widget end -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Price Filter</h3>
                            <div class="tag-clouds">
                                <a href="#" class="tag-cloud-link">Bedroom</a>
                                <a href="#" class="tag-cloud-link">Classic</a>
                                <a href="#" class="tag-cloud-link">Furniture</a>
                                <a href="#" class="tag-cloud-link">Kitchen</a>
                                <a href="#" class="tag-cloud-link">Living Room</a>
                                <a href="#" class="tag-cloud-link">Modern</a>
                                <a href="#" class="tag-cloud-link">Rugs</a>
                                <a href="#" class="tag-cloud-link">Steel</a>
                                <a href="#" class="tag-cloud-link">Wall</a>
                                <a href="#" class="tag-cloud-link">Wood</a>
                            </div>
                        </div>
                        <!-- sidebar widget end -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- shop page layout end -->

    <!-- main content end -->
@endsection