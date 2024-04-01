<!-- offcanvas menu start -->
<div class="offcanvas offcanvas-start" id="offcanvasExample">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="topbar-nav-info nav">
            <li class="topbar-nav-info-item"><span class="ion-ios-location-outline"></span> Store Location
            </li>
            <li class="topbar-nav-info-item"><span class="ion-ios-email-outline"></span><a
                href="mailto:support@demothemes.com">support@demothemes.com</a></li>
        </ul>
        <!-- offcanvas-form -->
        <form action="#" class="offcanvas-form">
            <input type="text" class="form-control" placeholder="Search product..." />
            <button class="btn-search" type="submit">
            <span class="ion-ios-search-strong"></span>
            </button>
        </form>
        <!-- offcanvas-form end -->
        <!-- offcanvas-mobile-menu start -->
        <nav id="offcanvasNav" class="offcanvas-menu">
            <ul>
                <li>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('shop')}}">shop</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <!-- sub menu start -->
                    <ul>
                        <li><a href="{{route('aboutus')}}">About Page</a></li>
                        <li><a href="{{route('client.showCart')}}">Cart Page</a></li>
                        <li><a href="{{route('client.showCheckout')}}">Checkout Page</a></li>
                        <li><a href="{{route('compare')}}">Compare Page</a></li>
                        <li><a href="{{route('client.account')}}">Account Page</a></li>
                        <li><a href="{{route('client.showWishlist')}}">Wishlist Page</a></li>
                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                    </ul>
                    <!-- sub menu end -->
                </li>
                <li><a href="contact-us.html">Contact</a></li>
            </ul>
        </nav>
        <nav class="simple-menu topbar-default">
            <ul class="topbar-nav nav flex-column">
                <li class="topbar-nav-item">
                    <!-- dropdown menu start -->
                    <ul class="topbar-dropdown-menu menu-position-right">
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">ENG</a>
                        </li>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">FR</a></li>
                    </ul>
                    <!-- dropdown menu end -->
                </li>
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
                <li class="topbar-nav-item">
                    <a class="topbar-nav-link" href="#">My Account</a>
                    <!-- dropdown menu start -->
                    <ul class="topbar-dropdown-menu menu-position-right">
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">My account</a>
                        </li>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">Cart</a></li>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">Wishlist</a>
                        </li>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="#">Checkout</a>
                        </li>
                        <?
                            if(Auth::checked()==true){?>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('showLogin')}}">Log in</a>
                        </li>
                        <?}else {?>
                        <li class="topbar-dropdown-item"><a class="topbar-dropdown-nav-link" href="{{route('logout')}}">Log out</a>
                        </li>
                        <?}
                            ?>
                    </ul>
                    <!-- dropdown menu end -->
                </li>
            </ul>
        </nav>
        <!-- offcanvas-mobile-menu end -->
    </div>
</div>
<!-- offcanvas menu end -->