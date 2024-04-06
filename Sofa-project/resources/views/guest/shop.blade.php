@extends('master')
@section('module',$categories->name)
@section('content')
    <!-- shop page layout start -->
    <div class="shop-page-layout section-padding-bottom">
        <div class="container">
            <div class="row mb-n5">
                <div class="col-lg-9 mb-5">

                    <div class="row align-items-center mb-5">
                        <div class="col-12 col-md-6">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-tabs justify-content-center justify-content-md-start align-items-center" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link grid active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link list" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex justify-content-center justify-content-md-end align-items-center">
                                <span class="sort-by">Sort by:</span>
                                <select class="form-select" name="orderby" id="orderby">
                                    <option value="-1">Default sorting</option>
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
                                @foreach ($products as $product)
                                <div class="col-sm-6 col-md-4 mb-5">
                                    <div class="product-card">
                                        <a href="{{route('detail',['slug'=>$product->slug])}}" class="product-thumb">
                                            @if ($product->status==1)
                                            <span class="onsale bg-danger">sale!</span>
                                            @endif
                                            @if ($product->featured==1)
                                            <span class="onsale bg-success">Hot!</span>
                                            @endif
                                            @if($product->featured==1)
                                            <span class="onsale bg-warning">New!</span>
                                            @endif
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            width="500" height="400" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="{{route('detail',['slug'=>$product->slug])}}" class="product-title">{{$product->name}}</a></h4>
                                            <div class="product-group">
                                                <h5 class="product-price"><del class="old-price">{{$product->price}}</del> <span class="new-price">{{$product->sale_price}}</span></h5>
                                                <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn">Add to cart</button>
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            <li class="action whish-list">
                                                <button data-bs-toggle="modal" onclick="saveToWishList('{{$product->id}}','{{Auth::user()->id}}')"><i class="ion-ios-heart-outline"></i></button>
                                            </li>

                                            @auth
                                            <li class="action compare">
                                                <button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-android-sync"></i></button>
                                            </li>
                                            @endauth
                                            @guest
                                            <li class="action compare">
                                                <button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}','0')"><i class="ion-android-sync"></i></button>
                                            </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                                {{$products->links("partials.pagination")}}
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
                                @foreach ($products as $product)
                                <div class="col-12 mb-5">
                                    <!-- product card list start -->
                                    <div class="product-card-list row mb-n5">
                                        <a href="{{route('detail',['slug'=>$product->slug])}}" class="product-thumb-list col-md-4 mb-5">
                                            @if ($product->status==1)
                                            <span class="onsale bg-danger">sale!</span>
                                            @endif
                                            @if ($product->status==3)
                                            <span class="onsale bg-success">Hot!</span>
                                            @endif
                                            @if ($product->status==4)
                                            <span class="onsale bg-warning">New!</span>
                                            @endif
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="max-width: 400px; max-height: 500px;" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <h4><a href="{{route('detail',['slug'=>$product->slug])}}" class="product-title">{{$product->name}}</a></h4>
                                            <h5 class="product-price-list"><del class="old-price">{{$product->price}}</del> <span class="new-price">{{$product->sale_price}}</span>
                                            </h5>
                                            <p>{{$product->description}}</p>
                                            <!-- actions  -->
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#product-modal-wishlist"><i class="ion-ios-heart-outline"></i></button>
                                                </li>

                                                @auth
                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-android-sync"></i></button>
                                                </li>
                                                @endauth
                                                @guest
                                                <li class="action compare">
                                                    <button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}','0')"><i class="ion-android-sync"></i></button>
                                                </li>
                                                @endguest

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>
                                @endforeach
                                {{$products->links("partials.pagination")}}
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
                                    @foreach ($categories_child as $item)
                                    <li><a href="{{ route('shop',['cate_id'=>$item->id])}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- shop page layout end -->
    <script>
        function saveToCompareList(productID,userID){
            if(userID==0){
                alert('please login before add product to compare');
            }else{
                $.ajax({
                    "url":'{{route('client.addCompareList')}}',
                    "method":'POSt',
                    'data':{product_id:productID,user_id:userID,_token:'{{csrf_token()}}'},
                    success:function(resp){
                        alert(resp);
                    },
                    error:function(error){
                        alert(error);
                    }
                })
            }
        }

    </script>
    <!-- main content end -->
@endsection