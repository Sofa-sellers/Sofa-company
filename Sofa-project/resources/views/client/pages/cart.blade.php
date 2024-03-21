@extends('master')

@section('content')
<div class="check-out-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3 class="title">calculate shipping</h3>
                    <form class="personal-information" action="assets/php/contact.php">
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
@endsection