<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title>Spring Courier Hub</title>
    <!-- Stylesheets -->
    <link href="/fe/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/fe/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="/fe/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="/fe/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION NAVIGATION STYLES -->

    <link href="/fe/css/style.css" rel="stylesheet" />
    <link href="/fe/css/responsive.css" rel="stylesheet" />

    <link rel="shortcut icon" href="/fe/11.png" type="image/x-icon" />
    <link rel="icon" href="/fe/11.png" type="image/x-icon" />

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






    <div id="google_translate_element"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="/fe/translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit">
    </script>
    <style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        #google_translate_element {
            position: fixed;
            bottom: 10px;
            left: 10px;
            z-index: 1000;
        }
    </style>

</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader --
   <div class="preloader">

   </div>-->
        <!-- Main Header-->
        <header class="main-header header-style-one">
            <!-- Header Top -->
            <div class="header-top">
                <div class="top-left">
                    <!-- Info List -->
                    <ul class="list-style-one">
                        <li><i class="fa fa-map-marker-alt"></i> 380 St Kilda Road, New York City</li>
                        <li><i class="fa fa-clock"></i> Mon - Sat: 8am - 5pm</li>
                        <li><i class="fa fa-phone-volume"></i> <a href="tel:+17069365099">+1 (160) 159-67928</a></li>
                    </ul>
                </div>

                <div class="top-right">
                    <ul class="social-icon-one">
                        <li>
                            <a href="#"><span class="fab fa-facebook-square"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="fab fa-twitter"></span></a>
                        </li>

                        <li>
                            <a href="#"><span class="fab fa-instagram"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Top -->

            <!-- Header Lower -->
            <div class="header-lower">
                <!-- Main box -->
                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}"><img src="/assets/logo.png" alt="" title="Tronis"
                                    style="width: 70px;" /></a>
                        </div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer">
                        <nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="current">
                                    <a href="{{ route('welcome') }}">Home</a>

                                </li>
                                <li class="">
                                    <a href="{{ route('about') }}">About</a>

                                </li>
                                <li class="">
                                    <a href="{{ route('services') }}">Services</a>

                                </li>
                                <li class="">
                                    <a href="{{ route('tracking') }}">Tracking</a>

                                </li>


                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box">

                            <a href="#" class="theme-btn btn-style-one alternate"><span class="btn-title">Get A
                                    Quote</span></a>

                            <!-- Mobile Nav toggler -->
                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>

                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo">
                            <a href="#"><img src="logo/humb.jpg" alt="" title="Fesho" /></a>
                        </div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>

                    <ul class="navigation clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>
                    <ul class="contact-list-one">
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+17069365099">+1 (706) 936-5099</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a href="mailto:support@springcourierhub.com">Support@springcourierhub.com</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Timing</span>
                                Available 24/7
                            </div>
                        </li>
                    </ul>

                    <ul class="social-links">
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Mobile Menu -->

            <!-- Header Search -->
            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>

                <div class="search-inner">
                    <form method="post" action="https://pentagonfreightservice.com/index">
                        <div class="form-group">
                            <input type="search" name="search-field" value="" placeholder="Search..."
                                required="" />
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Header Search -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo">
                            <a href="#" title=""><img src="logo/humb.jpg" alt=""
                                    title="" /></a>
                        </div>

                        <!--Right Col-->
                        <div class="nav-outer">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-collapse show collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <!--Keep This Empty / Menu will come through Javascript-->
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->

                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->
        </header>
        <!--End Main Header -->


        {{ $slot }}




        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="bg-image" style="background-image: url(logo/2.html)"></div>
            <div class="anim-icons">
                <span class="icon icon-plane-3 bounce-x"></span>
            </div>

            <!-- Contact info -->
            <div class="contacts-outer">
                <div class="auto-container">
                    <div class="row">
                        <!-- Contact Info Block -->
                        <div class="contact-info-block col-lg-4 col-md-6 col-sm-12 wow fadeInRight">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon flaticon-international-shipping-2"></i></div>
                                <h4 class="title">Address</h4>
                                <div class="text">4200 Regent St Suite 200, Columbus, OH 43219, United States</div>
                            </div>
                        </div>

                        <!-- Contact Info Block -->
                        <div class="contact-info-block col-lg-4 col-md-6 col-sm-12 wow fadeInRight"
                            data-wow-delay="300ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon flaticon-stock-1"></i></div>
                                <h4 class="title">Contact</h4>
                                <div class="text">
                                    <a href="mailto:support@springcourierhub.com">Support@springcourierhub.com</a>
                                    <a href="tel:+16015957928">+1 (160) 159-57928</a>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info Block -->
                        <div class="contact-info-block col-lg-4 col-md-6 col-sm-12 wow fadeInRight"
                            data-wow-delay="600ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon flaticon-24-hours-2"></i></div>
                                <h4 class="title">Timing</h4>
                                <div class="text">Available 24/7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact info -->

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="auto-container">
                    <div class="row">
                        <!--Footer Column-->
                        <div class="footer-column col-xl-3 col-lg-12 col-md-6 col-sm-12">
                            <div class="footer-widget about-widget">
                                <!--<div class="logo">-->
                                <!--	<a href="index"><img src="/fe/logo/humb.jpg" alt="" style="width:200px;"/></a>-->
                                <!--</div>-->
                                <div class="text">We work with a passion of taking challenges and creating new ones
                                    in advertising sector.</div>
                                <a href="#" class="theme-btn btn-style-one hvr-light small"><span
                                        class="btn-title">About</span></a>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget">
                                <h3 class="widget-title">Service</h3>
                                <ul class="user-links">
                                    <li><a href="#">Reliability & Punctuality</a></li>
                                    <li><a href="#">Trusted Franchise</a></li>
                                    <li><a href="#">Warehoues Storage</a></li>
                                    <li><a href="#">Real Time Tracking</a></li>
                                    <li><a href="#">Transparent Pricing</a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->


                        <!--Footer Column-->
                        <div class="footer-column col-xl-6 col-lg-9 col-md-12 col-sm-12">
                            <div class="footer-widget">
                                <h3 class="widget-title">Newsletter</h3>
                                <div class="widget-content">
                                    <div class="subscribe-form">
                                        <div class="text">Subscribe our newsletter to get our latest update & news
                                        </div>
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="email" name="email" class="email" value=""
                                                    placeholder="Email Address" required="" />
                                                <button type="button" class="theme-btn btn-style-one">
                                                    <span class="btn-title"><i class="fa fa-paper-plane"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="copyright-text">
                        <p>&copy; Copyright 2023 by <a href="#">Spring Courier Hub Services</a></p>
                    </div>

                    <ul class="social-icon-two">
                        <li>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </footer>
        <!--End Main Footer -->
    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <script src="/fe/js/jquery.js"></script>
    <script src="/fe/js/popper.min.js"></script>
    <!--Revolution Slider-->
    <script src="/fe/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/fe/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/fe/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="/fe/js/main-slider-script.js"></script>
    <!--Revolution Slider-->
    <script src="/fe/js/bootstrap.min.js"></script>
    <script src="/fe/js/jquery.fancybox.js"></script>
    <script src="/fe/js/jquery-ui.js"></script>
    <script src="/fe/js/wow.js"></script>
    <script src="/fe/js/appear.js"></script>
    <script src="/fe/js/select2.min.js"></script>
    <script src="/fe/js/swiper.min.js"></script>
    <script src="/fe/js/owl.js"></script>
    <script src="/fe/js/bxslider.js"></script>
    <script src="/fe/js/script.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6a1f1af923ea7d1c2c95437f/1jq4o2nsa';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
