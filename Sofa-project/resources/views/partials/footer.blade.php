<section class="news-letter-sectoin bg-dark">
    <div class="container">
        <div class="row g-0">
            <div class="col-12">
                <div class="border-bottom">
                    <div class="row align-items-center mb-n4">
                        {{-- <div class="col-lg-10 col-xl-9 mb-4">
                            <div class="news-letter-wrap">
                                <div class="news-letter-title">
                                    <h3 class="title">Subscribe to Oxford Sofa</h3>
                                    <p>Sign up for our e-mail to get latest news or coupon.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-2 col-xl-3 mb-4">
                            <h3 class="social-title">Follow us on</h3>
                            <div class="social-links social-links-dark">
                                <a class="social-link facebook" href="https://www.facebook.com/profile.php?id=100045289038840"><i class="ion-social-facebook"></i></a>
                                <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
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
                    <a class="footer-brand" href="{{route('index')}}">
                    <img src="{{asset('client/assets/images/logo/OxfordLogoBlack.jpg')}}" alt="images_not_found">
                    </a>
                    <span class="need-help">Need Help?</span>
                    <p>
                        <a href="mailto:seolosofa@gmail.com">seolosofa@gmail.com</a>
                        <br>
                        <a href="tel:0878212516">0878212516</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="footer-widget">
                    <h4 class="title">Information</h4>
                    <ul class="footer-menu">
                        <li class="footer-menu-items"><a class="footer-menu-link" href="{{route('contact')}}">Contact us</a></li>
                        <li class="footer-menu-items"><a class="footer-menu-link" href="{{route('aboutus')}}">About Us</a></li>
                        <li class="footer-menu-items"><a class="footer-menu-link" href="{{route('privacy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="footer-widget">
                    <?php
                        $categories_child= App\Models\Category::where('parent_id','!=',0)->where('status','!=',2)->get();  
                    ?>
                    <h4 class="title">Categories</h4>
                    <ul class="footer-menu">
                        @foreach ($categories_child as $cate)
                        <li class="footer-menu-items"><a class="footer-menu-link" href="{{route('shop',['cate_id'=>$cate->id])}}">{{$cate->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="footer-widget">
                    <h4 class="title">About Us</h4>
                    <p>
                        We are a team of designers and developers that create an exciting web for selling sofa
                    </p>
                    <p class="mb-0">Address: censored</p>
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
                                    class="ion-heart"></i> By SofaSeller All Rights
                                    Reserved 
                                </p>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="payment text-center text-md-end">
                                    <a href="#">
                                    <img src="{{asset('client/assets/images/logo/payment.png')}}" alt="images_not_found">
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