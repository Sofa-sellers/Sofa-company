@extends('master')
@section('module','404')
@section('content')
    <!-- main content start -->

    <section class="error-section section-padding-top section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="error-title">OOPS! PAGE NOT BE FOUND</h3>
                    <p>Sorry but the page you are looking for does not exist, has been removed, changed or is
                        temporarily unavailable.</p>
                    <div class="error-serch-form">
                        <form>
                            <input class="form-control" type="search" placeholder="Search product...">
                            <button class="form-search-btn" type="submit"><span
                                    class="ion-ios-search-strong"></span></button>
                        </form>
                    </div>
                    <a href="index.html" class="btn btn-dark">Back to home page/ or contact with us via seolosofa@gmail.com</a>
                </div>
            </div>
        </div>
    </section> 
@endsection
    <!-- main content end -->

