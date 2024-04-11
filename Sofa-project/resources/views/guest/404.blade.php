@extends('master')
@section('content')
    <!-- main content start -->

    <section class="error-section section-padding-top section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="error-title">OOPS! PAGE NOT BE FOUND</h3>
                    <p>Sorry but the page you are looking for does not exist, has been removed, changed or is
                        temporarily unavailable.</p>
                    <a href="{{route('index')}}" class="btn btn-dark">Back to home page/ or contact with us via seolosofa@gmail.com</a>
                </div>
            </div>
        </div>
    </section> 
@endsection
    <!-- main content end -->

