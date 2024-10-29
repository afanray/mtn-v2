@extends('layouts/landing')
@section('title', 'Tentang')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s" style="visibility: visible; animation-name: fadeInUp;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Kontak</li>
                </ol>
            </nav> --}}
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">Kontak Kami</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        {{-- <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight"> --}}
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <section class="contact-page-section pt-50 rpt-10 pb-10 rpb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-content-area mr-xl-5 rmb-20 wow fadeInLeft delay-0-2s">
                        <p>Gunakan berbagai informasi kontak berikut untuk mendapatkan informasi lebih lanjut tentang
                            Manajemen Talenta Nasional</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="contact-info-item style-two">
                                    <i class="fas fa-building text-white" style="background-color: #4575B8;"></i>
                                    <div class="contact-info-content">
                                        <span>Kementerian Perencanaan Pembangunan Nasional/ Badan Perencanaan Pembangunan
                                            Nasional (Bappenas)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="contact-info-item style-two">
                                    <i class="fas fa-phone text-white" style="background-color: #4575B8;"></i>
                                    <div class="contact-info-content">
                                        <h5>Nomor Telepon</h5>
                                        <span><a href="callto:+620213196207">021 3193 6207</a></span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="contact-info-item style-two"> --}}
                            {{-- <i class="fas fa-link"></i>
                                    <div class="contact-info-content">
                                        <h5>Website</h5>
                                        <span><a href="{{ env('APP_URL') }}" target="_blank">{{ env('APP_URL') }}</a></span>
                                    </div> --}}
                            {{-- </div>
                            </div> --}}
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="contact-info-item style-two">
                                    <i class="fas fa-map-marker text-white" style="background-color: #4575B8;"></i>
                                    <div class="contact-info-content">
                                        <h5>Alamat</h5>
                                        <span>Sekretariat Nasional Manajemen Talenta Nasional</span><br />
                                        <span>Jl. Taman Suropati No.2 Jakarta 10310</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
