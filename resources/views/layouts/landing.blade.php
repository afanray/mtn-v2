<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Manajemen Talenta Nasional Bappenas" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Title ======-->
    <title>@yield('title', 'Home') - Manajemen Talenta Nasional Bappenas</title>
    <!--====== Favicon Icon ======-->

    <!--====== Meta media sosial ======-->
    <meta property="og:title" content="@yield('og_title', 'Manajemen Talenta Nasional Bappenas')" />
    <meta property="og:description" content="@yield('og_description', 'Manajemen Talenta Nasional Bappenas')" />
    <meta property="og:image" content="@yield('og_image', asset('https://mtn.bappenas.go.id/assets/media/logos/logo_mtn.png'))" />
    <meta property="og:url" content="@yield('og_url', url()->current())" />
    <meta property="og:type" content="website" />


    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!--====== Google Fonts ======-->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome.5.9.0.min.css') }}">
    <!--====== Flaticon CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/flaticon.css') }}">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.4.5.3.min.css') }}">
    <!--====== Magnific Popup ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css') }}">
    <!--====== Slick Slider ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/slick.css') }}">
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.min.css') }}">
    <!--====== Nice Select ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/nice-select.css') }}">
    <!--====== Padding Margin ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/spacing.min.css') }}">
    <!--====== Menu css ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/menu.css') }}">
    <!--====== Main css ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/my-style.css') }}">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing/css/leaflet-1.9.4.css') }}">

    <!-- Tambahkan CSS Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    @yield('css')
</head>

<body>
    <div class="page-wrapper ">

        <!-- Preloader -->
        <div class="preloader"></div>


        <!--====== Header Part Start ======-->
        <header class="main-header">

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container clearfix">
                    <div class="header-inner py-20">
                        <div class="logo-outer">
                            <div class="logo"><a href="/"><img
                                        src="{{ asset('assets/media/logos/logo_mtn.png') }}" class="logo-landing"
                                        alt="Logo"></a></div>
                        </div>

                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <div class="logo-mobile"><a href="/"><img
                                                src="{{ asset('assets/media/logos/logo_mtn.png') }}" alt="Logo"
                                                class="logo-landing"></a></div>
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse" aria-controls="main-menu">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="main-menu">
                                    <ul class="navigation clearfix">
                                        <li @class(['current' => $activeMenu === 'home'])><a href="/">Home</a></li>
                                        <li @class(['current' => $activeMenu === 'about'])><a
                                                href="{{ route('home.about') }}">Tentang</a></li>
                                        <li @class(['current' => $activeMenu === 'news'])><a href="{{ route('home.news') }}">Berita &
                                                Kegiatan</a></li>
                                        <li @class(['current' => $activeMenu === 'library'])><a href="/pustaka">Pustaka</a></li>
                                        {{-- <li @class(['current' => $activeMenu === 'pb'])><a href="/praktik-baik">Praktik Baik</a></li> --}}
                                        <li @class(['current' => $activeMenu === 'sinergi'])><a href="/sinergi">Sinergi Data</a></li>
                                        <li @class(['current' => $activeMenu === 'contact'])><a href="/contact">Kontak</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        {{-- <div class="menu-right d-none d-lg-flex align-items-center ml-lg-auto">
                            <a href="{{ route('dashboard-capaian') }}" class="theme-btn style-one">Dashboard <i
                                    class="fas fa-arrow-right"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

        </header>
        <!--====== Header Part End ======-->

        @yield('body')

        <!--====== Footer Section Start ======-->
        <footer class="footer-section bg-lighter rel z-1">
            <div class="container pt-4">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-sm-6 col-6 col-small">
                        <div class="footer-widget about-widget" style="max-width: unset">
                            <div class="footer-logo mb-20">
                                <a href="/"><img src="{{ asset('assets/media/logos/logo_mtn.png') }}"
                                        alt="Logo" style="max-width: 235px;"></a>
                            </div>
                            <div class="d-flex">
                                <a href="https://www.bappenas.go.id/" class="d-inline-block w-100 mr-2">
                                    <img src="{{ asset('assets/media/logos/logoc Bappenas.png') }}" alt="Partner">
                                </a>
                                <p class="font-sm" style="font-size: 14px;line-height: 1.5">Kementerian Perencanaan
                                    Pembangunan Nasional / Badan Perencanaan Pembangunan Nasional (Bappenas)</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-5 col-small">
                        <div class="footer-widget link-widget">
                            <h4 class="footer-title">Menu</h4>
                            <ul class="list-style-two">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('home.about') }}">Tentang</a></li>
                                <li><a href="{{ route('home.news') }}">Berita & Kegiatan</a></li>
                                <li><a href="{{ route('home.pustaka') }}">Pustaka</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-5 col-small">
                        <div class="footer-widget link-widget">
                            <h4 class="footer-title">&nbsp;</h4>
                            <ul class="list-style-two">
                                {{-- <li><a href="{{ route('home.praktik-baik') }}">Praktik Baik</a></li> --}}
                                <li><a href="/sinergi">Sinergi Data</a></li>
                                <li><a href="{{ route('home.contact') }}">Kontak</a></li>
                                {{-- <li><a href="{{ route('dashboard-capaian') }}">Dashboard Capaian</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 d-flex flex-column align-items-end">
                        <div class="footer-widget contact-widget">
                            <h4 class="footer-title">Kontak Kami</h4>
                            <ul class="list-style-three">
                                <li><i class="fas fa-home" style="color: #4575B8;"></i> Sekretariat
                                    Nasional Manajemen Talenta
                                    Nasional</li>
                                <li><i class="fas fa-map-marker-alt" style="color: #4575B8;"></i> Jl. Taman Suropati
                                    No.62 Jakarta 10310</li>
                                <li><i class="fas fa-phone" style="color: #4575B8;"></i> <a
                                        href="callto:+620213196207">021-3196207</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright-area text-center">
                    <p>Hak Cipta {{ date('Y') }} <a href="/">Manajemen Talenta Nasional</a>. Hak Cipta
                        Dilindungi Undang-Undang</p>
                </div>
            </div>
            {{--    <img class="dots-shape" src="{{ asset('assets/landing/images/shapes/dots.png')}}" alt="Shape"> --}}
            <img class="tringle-shape" src="{{ asset('assets/landing/images/shapes/tringle.png') }}" alt="Shape">
            <img class="close-shape" src="{{ asset('assets/landing/images/shapes/close.png') }}" alt="Shape">
            <img class="circle-shape" src="{{ asset('assets/landing/images/shapes/circle.png') }}" alt="Shape">
            <div class="left-circles"></div>
            <div class="right-circles"></div>
        </footer>
        <!--====== Footer Section End ======-->

    </div>
    <!--End pagewrapper-->


    <!-- Scroll Top Button -->
    <button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>


    <!--====== Jquery ======-->
    <script src="{{ asset('assets/landing/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <!--====== Bootstrap ======-->
    <script src="{{ asset('assets/landing/js/bootstrap.4.5.3.min.js') }}"></script>
    <!--====== Appear js ======-->
    <script src="{{ asset('assets/landing/js/appear.js') }}"></script>
    <!--====== WOW js ======-->
    <script src="{{ asset('assets/landing/js/wow.min.js') }}"></script>
    <!--====== Isotope ======-->
    <script src="{{ asset('assets/landing/js/isotope.pkgd.min.js') }}"></script>
    <!--====== Circle Progress ======-->
    <script src="{{ asset('assets/landing/js/circle-progress.min.js') }}"></script>
    <!--====== Image loaded ======-->
    <script src="{{ asset('assets/landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <!--====== Nice Select ======-->
    <script src="{{ asset('assets/landing/js/jquery.nice-select.min.js') }}"></script>
    <!--====== Magnific ======-->
    <script src="{{ asset('assets/landing/js/jquery.magnific-popup.min.js') }}"></script>
    <!--====== Slick Slider ======-->
    <script src="{{ asset('assets/landing/js/slick.min.js') }}"></script>
    <!--====== Main JS ======-->
    <script src="{{ asset('assets/landing/js/script.js') }}"></script>
    <!-- Tambahkan JavaScript Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @yield('js')

</body>

</html>
