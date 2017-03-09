<?php
$base_url = asset('sh/');// base_url("assets");
?><!doctype html>

<html>
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Style CSS -->

    <link rel="stylesheet" type="text/css" href="{{ $base_url }}/style.css?id=9">

    <!-- Responsive CSS -->

    <link rel="stylesheet" type="text/css" href="{{ $base_url }}/css/responsive.css">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" href="{{ $base_url }}/images/assets/favicon.png"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="{{ $base_url }}/js/ie9/html5shiv.min.js"></script>

    <script src="{{ $base_url }}/js/ie9/respond.min.js"></script>

    <![endif]-->

    <style>
        .my-logo{
            width: initial !important;
            max-width: inherit !important;
        }
    </style>

    @section('css')

    @show
</head>



<body class="home9 header9">

<div id="pageloader">

    <div class="pageloader">

        <div class="thecube">

            <div class="cube c1"></div>

            <div class="cube c2"></div>

            <div class="cube c4"></div>

            <div class="cube c3"></div>

        </div>



        <div class="textedit">

            <span class="site-name">Cambodian University For Specailties</span>

            <span class="site-tagline">Education for an Excellent Career</span>

        </div>

    </div><!-- .pageloader -->

</div><!-- #pageloader -->



<div id="wrapper">

    <header id="header" class="site-header">

        <div class="mid-header">

            <div class="container">

                <div class="row">

                    <div class="col-md-4 col-sm-8 col-xs-9">

                        <div class="site-brand">

                            <a class="" href="#index.html">

                              {{--  <img src="{{ $base_url }}/images/assets/logo2.png" alt="Universum">--}}
                                <img class="my-logo" style="width: auto !important;height: 100px !important;" src="{{ $base_url }}/images/logo20.png" alt="CUS Kompot">


                            </a>

                        </div><!-- .site-brand -->

                    </div>



                    <div class="col-md-8 col-sm-4 col-xs-3">

                        <nav class="main-menu">

                            <span class="mobile-btn"><i class="fa fa-bars"></i></span>

                            <ul>

                                <li class="current-menu-item"><a href="#index.html">Home</a>

                                    <ul class="sub-menu">

                                        <li><a href="#index.html">Home Version 1</a></li>

                                        <li><a href="#index2.html">Home Version 2</a></li>

                                        <li><a href="#index3.html">Home Version 3</a></li>

                                        <li><a href="#index4.html">Home Version 4</a></li>

                                        <li><a href="#index5.html">Home Version 5</a></li>

                                        <li><a href="#index6.html">Home Version 6</a></li>

                                        <li><a href="#index7.html">Home Version 7</a></li>

                                        <li><a href="#index8.html">Home Version 8</a></li>

                                        <li class="current-menu-item"><a href="#index9.html">Home Version 9</a></li>

                                    </ul>

                                </li>

                                <li><a href="#courses.html">Academic</a>

                                    <div class="sub-menu mega-menu">

                                        <div class="row">

                                            <div class="col-md-3">

                                                <h3>DOCTORAL</h3>

                                                <ul>

                                                    <li><a href="#courses.html"> Law </a></li>

                                                    <li><a href="#courses-fullwidth.html">Social Science & Law</a></li>


                                                </ul>

                                            </div>



                                            <div class="col-md-3">

                                                <h3>MASTER</h3>

                                                <ul>

                                                    <li><a href="#single-course.html">Business Administration &    Economics</a></li>

                                                    <li><a href="#single-course-v2.html">Social Science and Law</a></li>

                                                    <li><a href="#single-course-v3.html">Arts, Humanity & Linguistics</a></li>

                                                    <li><a href="#single-course-v3.html">Science and Technology</a></li>
                                                    <li><a href="#single-course-v3.html">Engineering</a></li>
                                                </ul>

                                            </div>



                                            <div class="col-md-3">

                                                <h3>BACHELOR</h3>

                                                <ul>

                                                    <li><a href="#single-course.html">Business Administration &    Economics</a></li>

                                                    <li><a href="#single-course-v2.html">Social Science and Law</a></li>

                                                    <li><a href="#single-course-v3.html">Arts, Humanity & Linguistics</a></li>

                                                    <li><a href="#single-course-v3.html">Science and Technology</a></li>


                                                </ul>

                                            </div>



                                            <div class="col-md-3">

                                                <h3>ASSOCIATE</h3>

                                                <ul>

                                                    <li><a href="#single-course.html">Business Administration &    Economics</a></li>

                                                    <li><a href="#single-course-v2.html">Social Science and Law</a></li>

                                                    <li><a href="#single-course-v3.html">Arts, Humanity & Linguistics</a></li>

                                                    <li><a href="#single-course-v3.html">Science and Technology</a></li>


                                                </ul>

                                            </div>

                                        </div><!-- .row -->

                                    </div><!-- .mega-menu -->

                                </li>
                                <li><a href="#blog.html">{{ _t('CUS KP Office') }}</a>

                                    <ul class="sub-menu">
                                        <li><a href="">{{ _t('Job Club') }}</a></li>
                                        <li><a href="">{{ _t('Job Specification') }}</a></li>
                                        <li>{{ nbs(5) }}a. <a href="">xxxx</a></li>
                                        <li>{{ nbs(5) }}b. <a href="">xxxx</a></li>
                                        <li>{{ nbs(5) }}c. <a href="">xxxx</a></li>
                                        <li>{{ nbs(5) }}d. <a href="">xxxx</a></li>
                                    </ul>

                                </li>
                                <li><a href="#event-grid.html">Gallery</a></li>

                                <li><a href="#shop.html">Partners</a>

                                    <ul class="sub-menu">

                                        <li><a href="#shop.html">Shop Grid</a></li>

                                        <li><a href="#shop-list.html">Shop List</a></li>

                                        <li><a href="#shop-fullwidth.html">Shop Fullwidth</a></li>

                                        <li><a href="#single-product.html">Single Product Left Sidebar</a></li>

                                        <li><a href="#single-product-right-sidebar.html">Single Product Right Sidebar</a></li>

                                        <li><a href="#cart.html">Shoping Cart</a></li>

                                        <li><a href="#checkout.html">Checkout</a></li>

                                    </ul>

                                </li>





                                <li><a href="#about.html"> Library </a></li>

                                <li><a href="#contact.html">Other</a></li>

                            </ul>

                        </nav>

                    </div>

                </div><!-- .row -->

            </div><!-- .container -->

        </div><!-- .mid-header -->

    </header><!-- .site-header -->


    @yield('content')


    <section id="home-partner">

        <div class="container">

            <div class="carousel animation-element fade-in">

                <div class="slider">

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner1.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner2.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner3.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner4.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner5.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner6.png" alt=""></a>

                    </div>

                    <div class="item">

                        <a href="#"><img src="{{ $base_url }}/images/placeholder/partner1.png" alt=""></a>

                    </div>

                </div><!-- .slider -->

            </div><!-- .carousel -->

        </div><!-- .container -->

    </section><!-- .home-partner -->



    <div id="bottom" class="site-bottom">

        <div class="container">
{{--

            <div class="footer-widget bottom1">

                <div class="row">

                    <div class="col-md-3 col-md-6">

                        <div class="widget">

                            <h3 class="widget-title">About Universum</h3>

                            <div class="text-widget">

                                <p>Universum design for education themes,  university, event and online education Vestibulum at consectetur ligula. Morbi facilisis vestibulum tellus, id lacinia purus blandit quis. Ut fermentum, ipsum non sagittis viverra, nisl nibh tincidunt libero, a efficitur nibh magna et magna. Vestibulum vel vulputate turpis. </p>

                            </div>

                        </div><!-- .widget -->

                    </div>



                    <div class="col-md-3 col-md-6">

                        <div class="widget">

                            <h3 class="widget-title">All Courses</h3>

                            <ul>

                                <li><a href="#">Accounting Technologies</a></li>

                                <li><a href="#">Business Law</a></li>

                                <li><a href="#">Entrepreneurship</a></li>

                                <li><a href="#">Marketing Online</a></li>

                                <li><a href="#">Business Economics</a></li>

                                <li><a href="#">Public Health</a></li>

                                <li><a href="#">Health Policy</a></li>

                                <li><a href="#">History of Science</a></li>

                            </ul>

                        </div><!-- .widget -->

                    </div>



                    <div class="col-md-3 col-md-6">

                        <div class="widget">

                            <h3 class="widget-title">Quick links</h3>

                            <ul>

                                <li><a href="#">Studream Notices</a></li>

                                <li><a href="#">Future Students</a></li>

                                <li><a href="#">Why Studream?</a></li>

                                <li><a href="#">Admissions, fees & Applications</a></li>

                                <li><a href="#">Research Centres</a></li>

                                <li><a href="#">International Students</a></li>

                                <li><a href="#">Single subjects & Short courses</a></li>

                                <li><a href="#">Faculties & Graduate Schools</a></li>

                            </ul>

                        </div><!-- .widget -->

                    </div>



                    <div class="col-md-3 col-md-6">

                        <div class="widget contact-widget">

                            <h3 class="widget-title">Contact Us</h3>

                            <ul>

                                <li class="address">197 Grand Poin Street, Suite 7S New York, NY 10013</li>

                                <li class="mobile">+(112) 345 7689<br />+(112) 345 7689</li>

                                <li class="email"><a href="mailto:contact@university.com">contact@university.com</a></li>

                                <li class="time-work">Mon - Fri 8.00 - 18.00<br />Sat 9.00 - 16.00</li>

                            </ul>

                        </div><!-- .widget -->

                    </div>

                </div>

            </div><!-- .bottom1 -->


--}}

            <div class="footer-widget bottom2">

                <div class="row">

                    <div class="col-md-3 col-md-6">

                        <div class="widget">

                            <h3 class="widget-title">Contact Us</h3>

                            <ul>

                                <li class="address">Building Nº 21, 1 Ousaphea Village, Sangkat Kampong Kandal,
                                    Kampot City, Kampot Province.</li>

                                <li class="mobile">+855 12 76 92 20</li>

                                <li class="email"><a href="mailto:info@cus.edu.kh">info@cus.edu.kh</a></li>

                               {{-- <li class="time-work">Mon - Fri 8.00 - 18.00<br />Sat 9.00 - 16.00</li>--}}

                            </ul>

                        </div><!-- .widget -->

                    </div>

                    <div class="col-md-3 col-md-6">

                        <div class="widget">

                            <h3 class="widget-title">Our Socials</h3>

                            <p>Follow our sosials sagittis viverra, nisl nibh tincidunt libero </p>

                            <div class="socials">

                                <ul>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>

                                </ul>

                            </div>

                        </div><!-- .widget -->

                    </div>

                    <div class="col-md-3 col-md-6">

                        <div class="widget newsletter-widget">

                            <h3 class="widget-title">Newsletter</h3>

                            <p>Sign up for our mailing ist to get new course and course updates.</p>

                            <form action="#" method="get">

                                <input type="email" placeholder="Enter email address">

                                <input type="submit" value="Subscribe">

                            </form>

                        </div><!-- .widget -->

                    </div>

                    <div class="col-md-3 col-md-6">

                        <div class="widget instargram-widget">

                            <h3 class="widget-title">Instargram</h3>

                            <div class="instargram">

                                <ul>

                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram1.jpg" alt="">

                                        </a></li>



                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram2.jpg" alt="">

                                        </a></li>



                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram3.jpg" alt="">

                                        </a></li>



                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram4.jpg" alt="">

                                        </a></li>



                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram5.jpg" alt="">

                                        </a></li>



                                    <li><a href="#" target="_blank">

                                            <img src="{{ $base_url }}/images/placeholder/instargram6.jpg" alt="">

                                        </a></li>

                                </ul>

                            </div><!-- .instargram -->

                        </div><!-- .widget -->

                    </div>

                </div>

            </div><!-- .bottom2 -->

        </div><!-- .container -->

    </div><!-- .site-bottom -->



    <footer id="footer" class="site-footer">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="copyright">

                        <p>Copyright © 2016 University. <a href="http://itcthemes.com/">ItcThemes.com</a></p>

                    </div><!-- .copyright -->

                </div>



                <div class="col-md-6">

                    <nav class="nav-footer">

                        <ul>

                            <li><a href="#">Privacy Policy</a></li>

                            <li><a href="#">Disclaimer</a></li>

                            <li><a href="#">Feedback</a></li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div><!-- .container -->

    </footer><!-- .site-footer -->


</div><!-- #wrapper -->



<!-- jQuery -->

<script src="{{ $base_url }}/js/jquery-1.11.3.js"></script>

<!-- Boostrap -->

<script src="{{ $base_url }}/js/vendor/bootstrap.min.js"></script>

<!-- Jquery Parallax -->

<script src="{{ $base_url }}/js/vendor/parallax.min.js"></script>

<!-- jQuery UI -->

<script src="{{ $base_url }}/js/vendor/jquery-ui.min.js"></script>

<!-- jQuery Sticky -->

<script src="{{ $base_url }}/js/vendor/jquery.sticky.js"></script>

<!-- OWL CAROUSEL Slider -->

<script src="{{ $base_url }}/js/vendor/owl.carousel.js"></script>

<!-- PrettyPhoto -->

<script src="{{ $base_url }}/js/vendor/jquery.prettyPhoto.js"></script>

<!-- Jquery Isotope -->

<script src="{{ $base_url }}/js/vendor/isotope.pkgd.min.js"></script>

<!-- Main -->

<script src="{{ $base_url }}/js/main.js?id=1"></script>



<script>
    $(function () {
        $('.my-logo').css('width', '');
        $('.my-logo').css('max-width', '');
    });
</script>

@section('script')

@show

</body>

</html>

