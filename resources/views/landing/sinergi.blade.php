@extends('layouts/landing')
@section('title','Sinergi Data')
@section('body')
  <section class="page-banner bg-blue rel z-1" style="">
    <div class="container">
      <div class="banner-inner">
        <h1 class="page-title wow fadeInUp delay-0-2s">Sinergi Data</h1>
      </div>
    </div>
    <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
    <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
    <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
    <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
    <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png" alt="Shape">
  </section>
  <section class="solutions-section rel z-5 pb-100 rpb-70 mt-100">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-8 col-lg-8 col-md-10">
          <div class="section-title mb-55 d-flex flex-column w-100">

            <p>Penyelenggaraan Desain Besar MTN 2023-2045 didukung dengan pembangunan Basis Data Terpadu MTN (BDT-MTN) yang berfungsi untuk menghimpun data talenta dan intervensi pembinaan secara terintegrasi sesuai alur MTN dikoordinasikan oleh Kementerian Menteri PPN/Bappenas sebagai bagian dari Satu Data Indonesia.
              <br />
              <br />
              Untuk mendukung pengelolaan dan integrasi data Basis Data Terpadu MTN (BDT-MTN), Kementerian Menteri PPN/Bappenas telah menyediakan layanan Dashboard Data dan antarmuka pertukaran data memanfaatkan Application Programming Interface yang dapat diakses melalui Service Bus Kementerian Menteri PPN/Bappenas.
              <br />
              <br />
              Layanan pengelolaan dan integrasi data Basis Data Terpadu MTN (BDT-MTN) ini disediakan bagi para wali data MTN, yaitu Kementerian dan Lembaga anggota Gugus Tugas MTN.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              {{--              <i class="flaticon-data-analysis"></i>--}}
              <h3><a>Pembuatan Akun</a></h3>
              <p>Untuk dapat mengakses layanan ini silahkan kontak Sekretariat Manajemen Talenta untuk mendapatkan Username dan Password</p>
            </div>
            <a href="{{ route('home.about') }}" class="learn-more">Link <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              {{--              <i class="flaticon-data-analysis"></i>--}}
              <h3><a>Masuk ke Aplikasi</a></h3>
              <p>Kunjungi halaman pengelolaan data MTN.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="learn-more inverse">Buka Aplikasi <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <img class="dots-shape" src="{{ asset('assets/landing/images/shapes/dots.png')}}" alt="Shape">
    <img class="tringle-shape" src="{{ asset('assets/landing/images/shapes/tringle.png')}}" alt="Shape">
    <img class="close-shape" src="{{ asset('assets/landing/images/shapes/close.png')}}" alt="Shape">
    <img class="circle-shape" src="{{ asset('assets/landing/images/shapes/circle.png')}}" alt="Shape">
  </section>
@endsection
@section('css')
    <style>
      .learn-more.inverse {
        padding: 10px;
        display: block;
        font-weight: 700;
        text-align: center;

        color: white;
        background: var(--primary-color);
      }

      .learn-more.inverse:hover {
        color: var(--primary-color);
        background: #ffffff;
      }
    </style>
@endsection


