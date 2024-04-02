
<!DOCTYPE html>
<html lang="en">
<!-- head start -->

<head>

    <!-- Required meta tags -->
    @include('partials.head')

</head>
<!-- head end -->

<body>
    <!-- header section start -->
    @include('partials.header')
    <!-- header section end -->

    <!-- main content start -->
    <!-- bread crumb section start -->
    @include('partials.breadcrumb')
    <!-- bread crumb section end -->
    @yield('content')
    <!-- main content end -->

    <!-- footer section start -->
    <!-- footer start -->
    @include('partials.footer')
    <!-- footer end -->
    <!-- footer section end -->

    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->

    @include('partials.link')

</body>

</html>

