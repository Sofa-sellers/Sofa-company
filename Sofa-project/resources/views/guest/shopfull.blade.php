@extends('master')
@section('module','Shop')
@section('content')
<nav class="breadcrumb-section bg-light bread-crumb-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
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
                                {{-- <form action="search_data" method="GET"> --}}
                                <form>
                                    <input class="form-control" id="search" type="text" name="search" placeholder="Search product...">
                                    <button class="form-search-btn" class="ion-ios-search" type="submit"></button>
                                </form>
                                <span class="sort-by">Sort by:</span>
                                <form>
                                    <select class="form-select" onchange="this.form.submit()" name="orderby" id="orderby">
                                        <option value="-1"{{request()->orderby==-1?'selected':''}}>Default sorting</option>
                                        <option value="1" {{request()->orderby==1?'selected':''}}>Sort by latest</option>
                                        <option value="2" {{request()->orderby==2?'selected':''}}>Sort by oldest</option>
                                        <option value="3" {{request()->orderby==3?'selected':''}}>Sort by price: low to high</option>
                                        <option value="4" {{request()->orderby==4?'selected':''}}>Sort by price: high to low</option>
                                    </select>
                                </form>
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
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            width="500" height="400" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content">
                                            <h4><a href="{{route('detail',['slug'=>$product->slug])}}" class="product-title">{{$product->name}}</a></h4>
                                            <div class="product-group">
                                                @if ($product->price==0)
                                                <h5 class="product-price"><span class="old-price">{{number_format($product->sale_price, 0, "", ".")}}</span></h5>
                                                <a href="{{route('detail',['slug'=>$product->slug])}}" class="product-btn">View Detail</a>
                                                @else
                                                <h5 class="product-price"><del class="old-price">{{number_format($product->price, 0, "", ".")}}</del> <span class="new-price">{{number_format($product->sale_price, 0, "", ".")}}</span></h5>
                                                <a href="{{route('detail',['slug'=>$product->slug])}}" class="product-btn">View Detail</a>
                                                @endif
                                            </div>

                                        </div>
                                        <!-- actions  -->
                                        <ul class="actions actions-verticale">
                                            @auth
                                            <li class="action whish-list"><button data-bs-toggle="modal" onclick="saveToWishlist('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-ios-heart-outline"></i></button></li>
                                            <li class="action compare"><button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-android-sync"></i></button></li>
                                            @endauth
                                            @guest
                                            <li class="action whish-list"><button data-bs-toggle="modal" onclick="saveToWishlist('{{$product->id}}','0')"><i class="ion-ios-heart-outline"></i></button></li>
                                            <li class="action compare"><button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}','0')"><i class="ion-android-sync"></i></button></li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                                {{$products->withQueryString()->links("partials.pagination")}}
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
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="max-width: 400px; max-height: 500px;" alt="image_not_found">
                                        </a>
                                        <!-- thumb end -->
                                        <div class="product-content-list col-md-8 mb-5">
                                            <h4><a href="{{route('detail',['slug'=>$product->slug])}}" class="product-title">{{$product->name}}</a></h4>
                                            @if(empty($product->price))
                                
                                            <h4 class="product-price" style="font-size: 40px; color: black">$ {{ number_format($product->sale_price, 0, "", ".") }}</h4>
                                            @else
                                            
                                            <span class="product-regular-price-lg">$ {{ number_format($product->price, 0, "", ".") }}</span>
                                            <span class="product-price-on-sale-lg">$ {{ number_format($product->sale_price, 0, "", ".") }}</span>
                                            <span class="badge badge-lg bg-dark">Save {{intval(100-($product->sale_price / $product->price * 100))}}%</span>
                                            @endif
                                            <p>{{$product->brand->name}}</p>
                                            <!-- actions  -->
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <ul class="actions actions-horizontal">
                                                <li class="action whish-list">
                                                    <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal"><i class="ion-bag"></i></button>
                                                </li>
                                            @auth
                                            <li class="action whish-list"><button data-bs-toggle="modal" onclick="saveToWishlist('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-ios-heart-outline"></i></button></li>
                                            <li class="action compare"><button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-android-sync"></i></button></li>
                                            @endauth
                                            @guest
                                            <li class="action whish-list"><button data-bs-toggle="modal" onclick="saveToWishlist('{{$product->id}}','0')"><i class="ion-ios-heart-outline"></i></button></li>
                                            <li class="action compare"><button data-bs-toggle="modal" onclick="saveToCompareList('{{$product->id}}','0')"><i class="ion-android-sync"></i></button></li>
                                            @endguest

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product card list end -->
                                </div>
                                @endforeach
                                {{$products->withQueryString()->links("partials.pagination")}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5 order-lg-first">
                    <aside class="aside">
                        <div class="sidebar-widget">
                            <a class="widget-title">Categories</a>
                            <nav id="shop-dropdown" class="offcanvas-menu offcanvas-menu-sm">
                                <ul>
                                    @foreach ($categories_child as $item)
                                    <li><a href="{{ route('shop',['cate_id'=>$item->id])}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </br>
                            <a class="widget-title">Brand</a>
                            <nav id="shop-dropdown" class="offcanvas-menu offcanvas-menu-sm">
                                <ul>
                                    @foreach ($brand as $item)
                                    <li><a href="{{ route('shopBrand',['brand_id'=>$item->id])}}">{{$item->name}}</a></li>
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

    <!-- main content end -->
    <script>
        function saveToCompareList(productID,userID){
            if(userID==0){
                alert('please login before add product to compare');
            }else{
                $.ajax({
                    "url":'{{route('client.addCompareList')}}',
                    "method":'POST',
                    'data':{product_id:productID,user_id:userID,_token: '{{csrf_token()}}'},
                    success:function(resp){
                        alert(resp);
                    },
                    error:function(error){
                        alert(error);
                    }
                })
            }
        }

        function saveToWishlist(productID,userID){
            if(userID==0){
                alert('please login before add product to wishlist');
            }else{
                $.ajax({
                    "url":'{{route('client.addToWishlist')}}',
                    "method":'POST',
                    'data':{product_id:productID,user_id:userID,_token: '{{csrf_token()}}'},
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
@endsection
