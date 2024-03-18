<!DOCTYPE html>
<html lang="en">
<!-- head start -->

<head>

    <!-- Required meta tags -->
    @include('client.partials.head')

</head>
<!-- head end -->

<body>
    <!-- offcanvas menu start -->
    @include('client.partials.menu')
    <!-- offcanvas menu end -->

    <!-- header section start -->
    @include('client.partials.header')
    <!-- header section end -->

    <!-- main content start -->
    <!-- bread crumb section start -->
    @include('client.partials.breadcrumb')
    <!-- bread crumb section end -->

    @yield('content')
    <!-- main content end -->

    <!-- footer section start -->
    <!-- footer start -->
    @include('client.partials.footer')
    <!-- footer end -->
    <!-- footer section end -->

    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->

    <script src="{{asset('client/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('client/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('client/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('client/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/ajax-contact.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/ajax-mailchimp.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('client/assets/js/plugins/scroll-up.js')}}"></script>
    <script src="{{asset('client/assets/js/main.js')}}"></script>

</body>

</html>