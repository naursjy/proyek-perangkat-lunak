<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Proyek Perangkat Lunak</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <!-- <link href="{{ asset ('mte/assets/img/favicon.png') }}" rel="icon"> -->
    <!-- <link href="{{ asset ('mte/assets/img/favicon.png') }}" rel="apple-touch-icon"> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('mte/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mte/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('mte/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('mte/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mte/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('mte/assets/css/main.css') }}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('tampilan') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('mte/assets/img/logo.png') }}" alt=""> -->
                <h1 class="sitename">P3M</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('tampilan') }}" class="{{ request()->routeIs('tampilan') ? 'active' : '' }}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Seputar P2M</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('tampilan.berita') }}" class="{{ request()->routeIs('tampilan.berita') ? 'active' : '' }}">Berita</a></li>
                            <li><a href="#">Agenda</a></li>
                            <li><a href="#">Panduan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Sekilas P3M</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Visi Misi</a></li>
                            <li><a href="{{ route('tampilan.struktur') }}">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#about">HKI</a></li> -->
                    <li><a href="https://www.polibang.ac.id/maktab">Jurnal</a></li>
                    <!-- <li><a href="#contact">Contact</a></li> -->
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        </div>
    </header>

    <main class="main">
        @yield('isi')
    </main>

    <footer id="footer" class="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">P3M</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Politeknik Balekambang Jepara</p>
                        <p>Gemiring, Nalumsari, Jepara</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 3301 90210</span></p>
                        <p><strong>Email:</strong> <span>p3mpolibang@gmail.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">P3M POLIBANG</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="{{  asset('mte/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{  asset('mte/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{  asset('mte/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{  asset('mte/assets/js/main.js') }}"></script>

</body>

</html>