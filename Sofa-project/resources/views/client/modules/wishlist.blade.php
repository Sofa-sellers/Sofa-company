@extends('client.master')
@section('module','Wishlist')
@section('content')
    <!-- main content start -->
    <section class="whish-list-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-5 pb-3 text-capitalize">Your wishlist items</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" scope="col">Product Image</th>
                                    <th class="text-center" scope="col">Product Name</th>
                                    <th class="text-center" scope="col">Stock Status</th>
                                    <th class="text-center" scope="col">Qty</th>
                                    <th class="text-center" scope="col">Price</th>
                                    <th class="text-center" scope="col">action</th>
                                    <th class="text-center" scope="col">Checkout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center" scope="row">
                                        <img src="assets/images/products/product2.jpg" alt="img">
                                    </th>
                                    <td class="text-center">
                                        <span class="whish-title">Gold Metal Clothing Rack With</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">In Stock</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <input type="number" min="1" max="100" step="1" value="1">
                                                <div class="button-group">
                                                    <button class="count-btn increment">
                                                        <span class="ion-chevron-up"></span>
                                                    </button>
                                                    <button class="count-btn decrement">
                                                        <span class="ion-chevron-down"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="text-center">
                                        <span class="whish-list-price"> $38.24 </span>
                                    </td>

                                    <td class="text-center">
                                        <a href="#">
                                            <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-dark">add to cart</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">
                                        <img src="assets/images/products/product4.jpg" alt="img">
                                    </th>
                                    <td class="text-center">
                                        <span class="whish-title">Emmy Green Floral Wood Leg</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">In Stock</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <input type="number" min="1" max="100" step="1" value="1">
                                                <div class="button-group">
                                                    <button class="count-btn increment">
                                                        <span class="ion-chevron-up"></span>
                                                    </button>
                                                    <button class="count-btn decrement">
                                                        <span class="ion-chevron-down"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="whish-list-price"> $38.24 </span>
                                    </td>

                                    <td class="text-center">
                                        <a href="#">
                                            <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-dark">add to cart</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">
                                        <img src="assets/images/products/product6.jpg" alt="img">
                                    </th>
                                    <td class="text-center">
                                        <span class="whish-title">Heirloom Gold Metal Folding Shelf</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">In Stock</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="product-count style">
                                            <div class="count d-flex justify-content-center">
                                                <input type="number" min="1" max="100" step="1" value="1">
                                                <div class="button-group">
                                                    <button class="count-btn increment">
                                                        <span class="ion-chevron-up"></span>
                                                    </button>
                                                    <button class="count-btn decrement">
                                                        <span class="ion-chevron-down"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="whish-list-price"> $38.24 </span>
                                    </td>

                                    <td class="text-center">
                                        <a href="#">
                                            <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-dark">add to cart</a>
                                    </td>
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
