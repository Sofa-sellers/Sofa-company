@extends('client.master')
@section('module','Cart')
@section('content')
    <!-- main content start -->
    <section class="whish-list-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-5 pb-3 text-capitalize">Your cart items</h3>
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
                                        <img src="{{asset('assets/images/products/product2.jpg')}}" alt="img">
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
                                        <img src="{{asset('assets/images/products/product4.jpg')}}" alt="img">
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
                                        <img src="{{asset('assets/images/products/product6.jpg')}}" alt="img">
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

    <!-- check out section start -->
    <div class="check-out-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3 class="title">calculate shipping</h3>
                        <form class="personal-information" action="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-select">
                                        <select id="inputState" class="form-select mb-3">
                                            <option>Select country</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-select">
                                        <select id="inputState2" class="form-select mb-3">
                                            <option>Select State</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-info">
                                        <input class="form-control" placeholder="Postcode / ZIP" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-select">
                                        <a href="#" class="btn btn-dark check-out-btn">estimate</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h3 class="coupon-title">Discount coupon Code</h3>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info">
                                        <input class="form-control" placeholder="coupon Code" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="#" class="btn btn-dark check-out-btn">apply
                                        code</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div class="your-order-area">
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Product</li>
                                        <li>Total</li>
                                    </ul>
                                </div>

                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Shipping</li>
                                        <li class="your-order-shipping">Free shipping</li>
                                    </ul>
                                </div>
                                <div class="your-order-total mb-0">
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>$329</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-5">
                            <a class="btn btn-dark me-3" href="#">update cart</a>
                            <a class="btn btn-dark my-2 my-sm-0" href="#">checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- check out section end -->
    <!-- main content end -->
@endsection