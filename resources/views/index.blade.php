@extends('master')

@section('main-content')
    <!-- ****** Welcome Area Start ****** -->
    <section class="caviar-hero-area" id="home">
        <!-- Welcome Social Info -->
        <div class="welcome-social-info">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <!-- Welcome Slides -->
        <div class="caviar-hero-slides owl-carousel">
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img" style="background-image: url(img/bg-img/hero-1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>hey their</h2>
                                <p>Our restaurant is a life savior when you don’t feel like cooking or wants to eat something else..</p>
                                <a href="#" class="btn caviar-btn"><span></span> Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img" style="background-image: url(img/bg-img/hero-2.jpg);"></div>
            </div>
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img" style="background-image: url(img/bg-img/hero-2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>hey their</h2>
                                <p>Our restaurant is a life savior when you don’t feel like cooking or wants to eat something else..</p>
                                <a href="#" class="btn caviar-btn"><span></span> Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img" style="background-image: url(img/bg-img/hero-1.jpg);"></div>
            </div>
        </div>
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** About Us Area Start ****** -->
    <section class="caviar-about-us-area section-padding-150" id="about">
        <div class="container">
            <!-- About Us Single Area -->
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('img')}}/bg-img/about-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-md-auto">
                    <div class="section-heading">
                        <h2>About Us</h2>
                    </div>
                    <div class="about-us-content">
                        <span>restaurant style</span>
                        <p>A collaboration between chef Dinah Blackburn and interior designer Lee Rainwater, Hunter is where East Austin returns to the Old West. Styled like the saloons of yore, here you can sip cactus wine and enjoy the robust taste of farm-to-table American fare without the frills.
                            </p>
                    </div>
                </div>
            </div>
            <!-- About Us Single Area -->
            <div class="about-us-second-part">
                <div class="row align-items-center pt-200">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="about-us-content">
                            <span>our chef</span>
                            <p>A collaboration between chef Dinah Blackburn and interior designer Lee Rainwater, Hunter is where East Austin returns to the Old West. Styled like the saloons of yore, here you can sip cactus wine and enjoy the robust taste of farm-to-table American fare without the frills.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ml-md-auto">
                        <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                            <img src="{{asset('img')}}/bg-img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->

    <!-- ****** Dish Menu Area Start ****** -->
    <section class="caviar-dish-menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Special</h2>
                    </div>
                    <!-- btn -->
                    <a href="menu.html" class="btn caviar-btn"><span></span> View The Menu</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('img')}}/menu-img/dish-1.png" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum Dolor Sit Amet</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="1s">
                        <img src="{{asset('img')}}/menu-img/dish-2.png" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{asset('img')}}/menu-img/dish-3.png" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum Dolor Sit Amet</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Dish Menu Area End ****** -->

    <!-- ****** Awards Area Start ****** -->
    <section class="caviar-awards-area" id="awards">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-2">
                    <div class="section-heading">
                        <h2>Awards</h2>
                    </div>
                </div>
                <div class="col-12 col-md-9 ml-md-auto">
                    <div class="caviar-awards d-sm-flex justify-content-between">
                        <img src="{{asset('img')}}/awards-img/a-1.png" alt="">
                        <img src="{{asset('img')}}/awards-img/a-2.png" alt="">
                        <img src="{{asset('img')}}/awards-img/a-3.png" alt="">
                        <img src="{{asset('img')}}/awards-img/a-4.png" alt="">
                        <img src="{{asset('img')}}/awards-img/a-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Awards Area End ****** -->

    <!-- ****** Testimonials Area Start ****** -->
    <section class="caviar-testimonials-area" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-content">
                        <div class="section-heading text-center">
                            <h2>Testimonials</h2>
                        </div>
                        <div class="caviar-testimonials-slides owl-carousel">
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                    <img src="{{asset('img')}}/testimonial-img/3.jpg" alt="">
                                    <div class="tes-name">
                                        <h5>Robert Jonson</h5>
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                                <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor. Integer molestie rhoncus nisi a euismod.</p>
                            </div>
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                    <img src="{{asset('img')}}/testimonial-img/2.jpg" alt="">
                                    <div class="tes-name">
                                        <h5>Clara Hudson</h5>
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                                <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor. Integer molestie rhoncus nisi a euismod.</p>
                            </div>
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                    <img src="{{asset('img')}}/testimonial-img/1.jpg" alt="">
                                    <div class="tes-name">
                                        <h5>Jane Black</h5>
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                                <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor. Integer molestie rhoncus nisi a euismod.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Testimonials Area End ****** -->

    <!-- ****** Reservation Area Start ****** -->
    <section class="caviar-reservation-area d-md-flex align-items-center" id="reservation">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Reservation</h2>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Select Persons">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="col-12">
                            <textarea name="reservation-message" class="form-control" id="reservationMessage" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn caviar-btn" style="border: 1px solid ;"><span></span> Reserve Your Desk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="{{asset('img')}}/bg-img/hero-3.jpg" alt="">
        </div>
    </section>
    <!-- ****** Reservation Area End ****** -->
    @endsection