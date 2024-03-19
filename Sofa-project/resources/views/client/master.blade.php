
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

    @include('client.partials.link')

</body>

</html>

