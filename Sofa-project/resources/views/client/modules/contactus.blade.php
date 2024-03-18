@extends('client.master')
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

                    <form id="contactForm" class="row contact-us-form" action="assets/php/contact.php" method="POST" novalidate="novalidate">

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

    <!-- footer section start -->
    <section class="news-letter-sectoin bg-dark">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="border-bottom">
                        <div class="row align-items-center mb-n4">
                            <div class="col-lg-10 col-xl-9 mb-4">
                                <div class="news-letter-wrap">
                                    <div class="news-letter-title">
                                        <h3 class="title">Subscribe to Our Newsletter</h3>
                                        <p>Sign up for our e-mail to get latest news.
                                        </p>
                                    </div>

                                    <form id="mc-form" class="news-letter-form" action="#">
                                        <input id="mc-email" class="form-control" name="email" type="email" placeholder="Your email address">
                                        <button class="sign-up-btn" type="submit">Sign up</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xl-3 mb-4">
                                <h3 class="social-title">Follow us on</h3>
                                <div class="social-links social-links-dark">
                                    <a class="social-link facebook" href="#"><i class="ion-social-facebook"></i></a>
                                    <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                    <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                    <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
                                    <a class="social-link instagram" href="#"><i class="ion-social-rss"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <a class="footer-brand" href="index.html">
                            <img src="assets/images/logo/logo-white.svg" alt="images_not_found">
                        </a>
                        <span class="need-help">Need Help?</span>
                        <p>
                            <a href="mailto:support@demothemes.com">Support@demothemes.com</a>
                            <br>
                            <a href="tel:0123456789">0123456789</a>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">Information</h4>
                        <ul class="footer-menu">
                            <li class="footer-menu-items"><a class="footer-menu-link" href="wishlist.html">Wishlist</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="contact-us.html">Contact us</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="about-us.html">About Us</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="frequently.html">Frequently Questions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">Categories</h4>
                        <ul class="footer-menu">
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Limes</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Mangoes</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Chickpea</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Avocados</a></li>
                            <li class="footer-menu-items"><a class="footer-menu-link" href="#">Cauliflower</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="title">About Us</h4>
                        <p>
                            We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.

                        </p>
                        <p class="mb-0">Address: 4710-4890 Breckinridge St, Fayettevill</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="copy-right bg-dark">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="border-top">
                            <div class="row mb-n4">
                                <div class="col-12 col-md-6 mb-4 order-last order-md-first">
                                    <p class="text-center text-md-start">&copy; <span id="currentYear"></span> Made With <i
                              class="ion-heart"></i> By <a href="https://hasthemes.com">HasThemes</a> All Rights
                                        Reserved </p>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="payment text-center text-md-end">
                                        <a href="#">
                                            <img src="assets/images/logo/payment.png" alt="images_not_found">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- footer end -->
    <!-- footer section end -->

    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->

    <script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="./assets/js/plugins/ajax-contact.js"></script>
    <script src="./assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="./assets/js/plugins/ajax-mailchimp.js"></script>
    <script src="./assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="./assets/js/plugins/jquery-ui.min.js"></script>
    <script src="./assets/js/plugins/scroll-up.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>