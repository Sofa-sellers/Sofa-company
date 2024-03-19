@extends('client.master')
@section('module','Compare')
@section('content')
    <!-- main content start -->
    <section class="compare-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-5 pb-3 text-capitalize">compare</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">product info</th>
                                    <th scope="col" class="text-center">
                                        <img src="{{asset('assets/images/products/product1.jpg')}}" alt="images_not_found">
                                        <span class="sub-title d-block">Gold Metal Clothing Rack With</span>
                                        <a href="cart.html" class="btn btn-dark">
                                            add to cart</a>
                                    </th>
                                    <th scope="col" class="text-center">
                                        <img src="{{asset('assets/images/products/product2.jpg')}}" alt="images_not_found">
                                        <span class="sub-title d-block">Emmy Green Floral Wood Leg</span>
                                        <a href="cart.html" class="btn btn-dark">
                                            add to cart</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Price</th>
                                    <td class="text-center">
                                        <span class="whish-list-price"> $38.24 </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="whish-list-price"> $38.24 </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td class="text-center">
                                        <p>3 Tier Wood With Metal Shelf</p>
                                    </td>
                                    <td class="text-center">
                                        <p>68in. Bronze Metal Coat Rack</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Availability</th>
                                    <td class="text-center">
                                        <span class="badge bg-success">In Stock</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">In Stock</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">weight</th>
                                    <td class="text-center">500 ml</td>
                                    <td class="text-center">400 ml</td>
                                </tr>
                                <tr>
                                    <th scope="row">colors</th>
                                    <td class="text-center">3</td>
                                    <td class="text-center">4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- main content end -->
@endsection