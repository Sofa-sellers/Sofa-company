@extends('master')
@section('module','About Us')
@section('content')

    <!-- main content start -->
    <section class="about-section section-padding-bottom">
        <div class="container">
            <div class="row mb-n7 align-items-center">
                <div class="col-xl-6 mb-4">
                    <div class="about-content">
                        <h2 class="title mb-4">
                            About Our Store
                        </h2>
                        <h3 class="sub-title">We believe that every project existing in world is a result of an idea and every idea
                            has a cause.</h3>
                        <p class="mb-4">
                            For this reason, our every design serves an idea. Our strength in design is reflected by our name, our
                            care for details. Our specialist won't be afraid to go extra miles just to approach near perfection. We
                            don't require everything to be perfect, but we need them to be perfectly cared for. That's a reason why we
                            are willing to give contributions at best. Not a single detail is missed out under Billey's professional
                            eyes. The amount of dedication and effort equals to the level of passion and determination. Get better,
                            together as one.
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 mb-4">
                    <div class="about-content text-center">
                        <div class="about-left-image">
                            <img src="{{asset('client/assets/images/banner/sofa3.jpg')}}" alt="img" class="img-responsive">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- progress section start -->
    <section class="progress-section">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-6 mb-4">
                    <div class="progress-content">
                        <h3 class="progress-title">Functionality</h3>
                        <h3 class="progress-title"> meets perfection</h3>
                        <p>In today’s day and age, one cannot underestimate the importance of design, the art of creating striking
                            visuals to move and captivate your audience. And as the world becomes more and more digitized with each
                            passing second, the importance of graphic design has been rocketed to the top.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="skill-bar" data-ht-offset="50%">
                        <div class="skills">
                            <h4 class="skills-title">UI/UX</h4>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="skills">
                            <h4 class="skills-title">Ideas</h4>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="skills">
                            <h4 class="skills-title">Design</h4>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- progress section end -->


    <section class="static-info-section section-padding-top section-padding-bottom">
        <div class="container">
            <div class="static_info">
                <div class="row mb-n4">
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <div class="box_info">
                            <img src="{{asset('client/assets/images/icon/1.jpg')}}" alt="images_not_found">
                            <div class="txt_info">
                                <h2 class="title">Creative Always</h2>
                                <p>We believe any idea is a good idea, but the best idea wins</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <div class="box_info">
                            <img src="{{asset('client/assets/images/icon/2.jpg')}}" alt="images_not_found">
                            <div class="txt_info">
                                <h2 class="title">Express Customization</h2>
                                <p>Eposi has many Express Customization centers throughout Europe</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <div class="box_info">
                            <img src="{{asset('client/assets/images/icon/3.jpg')}}" alt="images_not_found">
                            <div class="txt_info">
                                <h2 class="title">Premium Integrations</h2>
                                <p>We can build pretty much any integration you want</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <div class="box_info">
                            <img src="{{asset('client/assets/images/icon/4.jpg')}}" alt="images_not_found">
                            <div class="txt_info">
                                <h2 class="title">Real-time Editing</h2>
                                <p>Write, edit and interact with others on the same content, in real time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="service-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <div class="title">Meet Our Leaders</div>
                    </div>
                </div>
            </div>
            <div class="row mb-n5">
                <div class="col-sm-6 col-lg-3 mb-5">
                    <div class="service">
                        <div class="single-thumb mb-4">
                            <img src="{{asset('client/assets/images/about/1.png')}}" alt="single-thumb-naile">
                        </div>
                        <div class="single-service">
                            <h3 class="service-title text-capitalize">Ms. Veronica</h3>
                            <h5 class="sub-title">Web Designer</h5>
                            <div class="social-links about-social">
                                <a class="social-link facebook" href="#"><i class="ion-social-facebook"></i></a>
                                <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5">
                    <div class="service">
                        <div class="single-thumb mb-4">
                            <img src="{{asset('client/assets/images/about/2.png')}}" alt="single-thumb-naile">
                        </div>
                        <div class="single-service">
                            <h3 class="service-title text-capitalize">Missa Santos</h3>
                            <h5 class="sub-title">CEO Founder</h5>
                            <div class="social-links about-social">
                                <a class="social-link facebook" href="#"><i class="ion-social-facebook"></i></a>
                                <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5">
                    <div class="service">
                        <div class="single-thumb mb-4">
                            <img src="{{asset('client/assets/images/about/3.png')}}" alt="single-thumb-naile">
                        </div>
                        <div class="single-service">
                            <h3 class="service-title text-capitalize">Missa Santos</h3>
                            <h5 class="sub-title">Chief Operating Officer</h5>
                            <div class="social-links about-social">
                                <a class="social-link facebook" href="#"><i class="ion-social-facebook"></i></a>
                                <a class="social-link twitter" href="#"><i class="ion-social-twitter"></i></a>
                                <a class="social-link youtube" href="#"><i class="ion-social-youtube"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-instagram"></i></a>
                                <a class="social-link instagram" href="#"><i class="ion-social-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5">
                    <div class="service">
                        <div class="single-thumb mb-4">
                            <img src="{{asset('client/assets/images/about/4.png')}}" alt="single-thumb-naile">
                        </div>
                        <div class="single-service">
                            <h3 class="service-title text-capitalize">Lisa Antonia</h3>
                            <h5 class="sub-title">Chief Operating Officer</h5>
                            <div class="social-links about-social">
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
    </section>
    <!-- main content end -->

@endsection