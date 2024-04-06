
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
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          
        </div>
        @endif

        @if ($message = Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{Session::get('success')}}
          </div>
        @endif
        @if ($message = Session::has('failed'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{Session::get('failed')}}
          </div>
        @endif
        
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

