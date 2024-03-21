@extends('master')
@section('module','Contact Us')
@section('content')
    <!-- main content start -->
    <section class="contact-section section-padding-bottom">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-3 mb-4">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Contact Us</h3>
                    </div>
                    <!-- contact-title-section end -->
                    <div class="contact-address">
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-ios-home"></span>Address</h4>
                            <p>
                                your Address goes here
                            </p>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-ios-telephone"></span>Email</h4>
                            <ul>
                                <li>
                                    <a class="mailto" href="mailto:info@example.com">info@example.com</a>
                                </li>
                                <li>
                                    <a class="mailto" href="mailto:www.example.com">www.example.com</a>
                                </li>
                            </ul>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-email"></span> Phone</h4>
                            <ul>
                                <li>
                                    <a class="phone-number" href="tel:+12345678987">+12345 678 987</a>
                                </li>
                                <li>
                                    <a class="phone-number" href="tel:+98745612321">+98745 612 321</a>
                                </li>
                            </ul>
                        </div>
                        <!-- address-list end -->

                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 mb-4">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Tell Us Your Message</h3>
                    </div>
                    <!-- contact-title-section end -->

                    <form id="contactForm" class="row contact-us-form" action="" method="POST" novalidate="novalidate">

                        <div class="col-12">
                            <label class="form-label" for="name">Your Name (required)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name*">
                        </div>
                        <!-- Name filed end -->
                        <div class="col-12">
                            <label class="form-label" for="email">Your Email (required)</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Your Email*">
                        </div>
                        <!-- email filed end -->
                        <div class="col-12">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject*">
                        </div>
                        <!-- Subject filed end -->
                        <div class="col-12">
                            <label class="form-label" for="massage">Your Message</label>
                            <textarea class="form-control massage-control" name="massage" id="massage" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <!-- Message filed end -->
                        <div class="col-12">
                            <button id="contactSubmit" type="submit" class="btn btn-dark">Send Message</button>
                            <p class="form-message mt-3"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64876600.99126343!2d-31.49658015000001!3d-7.0382327499999855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x65a81cae36eb8ff%3A0xa6342257f310534f!2sAtlantic%20Ocean!5e0!3m2!1sen!2sbd!4v1618893629132!5m2!1sen!2sbd"></iframe>
    </div>
    <!-- main content end -->
@endsection