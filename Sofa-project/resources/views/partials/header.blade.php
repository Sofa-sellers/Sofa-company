<header>
    <div class="header-topbar topbar-default topbar-border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <ul class="topbar-nav-info nav">
                        <li class="topbar-nav-info-item"><span class="ion-ios-location-outline"></span> Store Location
                        </li>
                        <li class="topbar-nav-info-item"><span class="ion-ios-email-outline"></span><a href="mailto:support@demothemes.com">support@demothemes.com</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <nav class="simple-menu">
                        <ul class="topbar-nav nav justify-content-end">
                            {{-- 
                            <li class="topbar-nav-item">
                                <a class="topbar-nav-link" href="#">Lang</a>
                                <!-- dropdown menu start -->
                                <ul class="topbar-dropdown-menu menu-position-right">
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">ENG</a>
                                    </li>
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">FR</a></li>
                                </ul>
                                <!-- dropdown menu end -->
                            </li>
                            --}}
                            {{-- 
                            <li class="topbar-nav-item">
                                <a class="topbar-nav-link" href="#">Currency</a>
                                <!-- dropdown menu start -->
                                <ul class="topbar-dropdown-menu menu-position-right">
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">USD</a>
                                    </li>
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">EUR</a></li>
                                </ul>
                                <!-- dropdown menu end -->
                            </li>
                            --}}
                            <li class="topbar-nav-item">
                                <a class="topbar-nav-link" href="">
                                <?php if(Auth::check()==true)
                                    {
                                        echo Auth::user()->username;
                                    }else {
                                        echo 'Guest';
                                    }
                                    ?></a>
                                <!-- dropdown menu start -->
                                <ul class="topbar-dropdown-menu menu-position-right">
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('client.account')}}">My account</a>
                                    </li>
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('client.showCart')}}">Cart</a></li>
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('client.showWishlist')}}">Wishlist</a>
                                    </li>
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('client.showCheckout')}}">Checkout</a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('logout')}}">Log out</a>
                                    </li>
                                    @else
                                    <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('showLogin')}}">Log in</a>
                                    </li>
                                    @endif
                                </ul>
                                <!-- dropdown menu end -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- desktop menu start -->
    <div class="header-middle-default d-none d-lg-block active-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-lg-3">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img src="{{asset('client/assets/images/logo/sofalogo2.jpg')}}" style="width:400;height:100" alt="image_not_found">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-6 text-center">
                    <nav class="d-inline-block position-relative">
                        <ul class="main-menu nav align-items-center @@justifyCenter">
                            <li class="main-menu-item"><a style="color:black" class="main-menu" href="{{route('index')}}">Home</a></li>
                            <?php
                                $categories=DB::table('categories')->get();
                            ?>
                            <li class="main-menu-item">
                                <a href="javascript:void(0)" class="main-menu-link">Category</a>
                                <!-- sub menu start -->
                                <ul class="sub-menu">
                                    @foreach ($categories as $item)
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('shop',['id'=>$item->id])}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                                <!-- sub menu end -->
                            </li>
                            {{-- 
                            <li class="main-menu-item position-static"><a href="#" class="main-menu-link">Blog</a></li>
                            --}}
                            <li class="main-menu-item">
                                <a href="javascript:void(0)" class="main-menu-link">Pages</a>
                                <!-- sub menu start -->
                                <ul class="sub-menu">
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('aboutus')}}">About Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('client.showCart')}}">Cart Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('client.checkout')}}">Checkout Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('compare')}}">Compare Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('client.account')}}">Account Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('client.showWishlist')}}">Wishlist Page</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{route('privacy')}}">Privacy Policy</a></li>
                                </ul>
                                <!-- sub menu end -->
                            </li>
                            <li class="main-menu-item"><a href="{{route('contact')}}" class="main-menu" style="color:black">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 col-lg-3">
                    <ul class="nav align-items-center justify-content-end quick-links">
                        <li class="quick-link-item">
                            <a class="quick-link-link search" href="#"><span class="ion-ios-search-strong"></span></a>
                            <div class="header-serch-form header-serch-form-right">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search product...">
                                    <button class="form-search-btn" type="submit"><span class="ion-ios-search-strong"></span></button>
                                </form>
                            </div>
                        </li>
                        <li class="quick-link-item">
                            <a class="quick-link-link wishlist-link" href="wishlist.html">
                            <span class="wishlist-count">3</span>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a class="quick-link-link shopping-cart" >
                            <span class="wishlist-count">
                                
                                {{Cart::count();}}
                            </span>
                            </a>
                            <div class="mini-carts">
                                <ul class="mini-cart">
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/1.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/2.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/3.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                </ul>
                                <!-- mini cart sub total start -->
                                <ul class="mini-cart-sub-total">
                                    <li class="mini-cart-sub-total-item"><span>Subtotal:</span> <span>$2,580.00</span></li>
                                </ul>
                                <a href="#" class="btn btn-dark d-block w-100 mb-3">View cart</a>
                                <a href="#" class="btn btn-dark d-block w-100 mb-4">Checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- desktop menu end -->
    <!-- mobile menu start -->
    <div class="header-middle-default d-lg-none active-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2 col-sm-4">
                    <button class="offcanvas-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                    <span class="ion-android-menu"></span>
                    </button>
                </div>
                <div class="col-8 col-sm-4">
                    <div class="logo mx-auto">
                        <a href="index.html">
                        <img src="{{asset('client/assets/images/logo/sofalogo2.jpg')}}"  style="width:400;height:100" alt="image_not_found">
                        </a>
                    </div>
                </div>
                <div class="col-2 col-sm-4">
                    <ul class="nav align-items-center justify-content-end quick-links">
                        <li class="quick-link-item">
                            <a class="quick-link-link search" href="#"><span class="ion-ios-search-strong"></span></a>
                            <div class="header-serch-form header-serch-form-right">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search product...">
                                    <button class="form-search-btn" type="submit"><span class="ion-ios-search-strong"></span></button>
                                </form>
                            </div>
                        </li>
                        <li class="quick-link-item">
                            <a class="quick-link-link wishlist-link" href="wishlist.html">
                            <span class="wishlist-count">3</span>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a class="quick-link-link shopping-cart" href="#">
                            <span class="wishlist-count">4</span>
                            </a>
                            {{-- <div class="mini-carts">
                                <ul class="mini-cart">
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/1.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/2.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                    <li class="mini-cart-item">
                                        <div class="mini-cart-image">
                                            <a href="#"><img src="{{asset('client/assets/images/mini-cart/3.jpg')}}" alt="image_not_found"></a>
                                        </div>
                                        <div class="mini-cart-content">
                                            <a href="#" class="mini-cart-title">Gold Metal Fox Design Trinket Tray</a>
                                            <button class="remove-mini-cart">×</button>
                                            <span class="mini-cart-quantity">9 × <span class="mini-cart-total">$60.00</span> </span>
                                        </div>
                                    </li>
                                    <!-- mini cart item end -->
                                </ul>
                                <!-- mini cart sub total start -->
                                <ul class="mini-cart-sub-total">
                                    <li class="mini-cart-sub-total-item"><span>Subtotal:</span> <span>$2,580.00</span></li>
                                </ul>
                                <a href="#" class="btn btn-dark d-block w-100 mb-3">View cart</a>
                                <a href="#" class="btn btn-dark d-block w-100 mb-4">Checkout</a>
                            </div> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu end -->
</header>