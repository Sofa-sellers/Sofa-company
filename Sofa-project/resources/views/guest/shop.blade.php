@extends('master')
@section('title',$categories->name)
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
                                    <li class="nav-item" role="presentation">
                                        <div class="dropdown select-featured">
                                            <select class="form-select" name="size" id="pagezise">
                                                <option value="9" >9 Products per page</option>
                                                <option value="12">12 Products per page</option>
                                                <option value="15">15 Products per page</option>
                                                <option value="18">18 Products per page</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex justify-content-center justify-content-md-end align-items-center">
                                <span class="sort-by">Sort by:</span>
                                <select class="form-select" name="orderby" id="orderby">
                                    <option value="-1" {{$order==-1?'selected':''}}>Default sorting</option>
                                    {{-- <option value="2">Default sorting</option>
                                    <option value="3">Sort by popularity</option>
                                    <option value="4">Sort by average rating</option> --}}
                                    <option value="1">Sort by latest</option>
                                    <option value="2">Sort by oldest</option>
                                    <option value="3">Sort by price: low to high</option>
                                    <option value="4">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row grid-view mb-n5">

                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        @foreach ($product as $products)
                                        <a href="detail/{{$products->id}}" class="product-thumb">
                                            @if ($products->status==1)
                                            <span class="onsale bg-danger">sale!</span>
                                            @elseif ($products->status==3)
                                            <span class="onsale bg-success">Hot!</span>
                                            @else
                                            <span class="onsale bg-warning">New!</span>
                                            @endif
                                            <img src="{{ asset('uploads/' . $products->image) }}" alt="{{ $products->name }}"
                                            style="max-width: 400px; max-height: 500px;" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="'detail/{{$products->id}}" class="product-title">{{$products->name}}</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">{{$products->price}}</del> <span class="new-price">{{$products->sale_price}}</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i class="ion-ios-heart-outline"></i></button>
                                            </li>
                                            <li class="action quick-view">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                            </li>

                                            <li class="action compare">
                                                <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                                {{$product->links("partials.pagination")}}
                                <!-- pagination -->
                                {{-- <div class="col-12 mb-5">
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
                                </div> --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row mb-n5 grid-view-list overflow-hidden">
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    @foreach ($product as $products)
                                    <div class="product-card-list row mb-n5">
                                        <a href="single-product.html" class="product-thumb-list col-md-4 mb-5">
                                            @if ($products->status==1)
                                            <span class="onsale bg-danger">sale!</span>
                                            @endif
                                            @if ($products->status==3)
                                            <span class="onsale bg-success">Hot!</span>
                                            @endif
                                            @if ($products->status==4)
                                            <span class="onsale bg-warning">New!</span>
                                            @endif
                                            <img src="{{ asset('uploads/' . $products->image) }}" alt="{{ $products->name }}"
                                            style="max-width: 200px; max-height: 200px;" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <div class="product-category-links">
                                                <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                            </div>
                                            <h4><a href="single-product.html" class="product-title">{{$products->name}}</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">{{$products->price}}</del> <span class="new-price">{{$products->sale_price}}</span>
                                            </h5>
                                            <p>{{$products->description}}</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i class="ion-ios-heart-outline"></i></button>
                                                </li>
                                                <li class="action quick-view">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="ion-ios-eye-outline"></i></button>
                                                </li>

                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-compare"><i class="ion-android-sync"></i></button>
                                                </li>

                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- product card list end -->
                                </div>
                                {{$product->links("partials.pagination")}}
                                <!-- col-12 mb-5 end -->
                                <!-- pagination -->
                                {{-- <div class="col-12 mb-5">
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
                                </div> --}}
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
                                    @foreach ($category_list as $category )
                                    <li style="margin-bottom: 20px;">
                                        <a href="{{route('page.shop',['id' => $category->id])}}">{{$category->name}}&nbsp;&nbsp;<span style="padding-left: 10px;">{{count($category->product)}}</span></a>
                                    </li>
                                    @endforeach
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