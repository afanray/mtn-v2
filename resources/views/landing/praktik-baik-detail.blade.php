@extends('layouts/landing')
@section('title', 'Praktik Baik')
@section('body')
    <!--====== Page Banner Start ======-->
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h1 class="page-title wow fadeInUp delay-0-2s">{{ $praktik_baik->nama_program }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb wow fadeInUp delay-0-4s" style="visibility: visible; animation-name: fadeInUp;">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Praktik Baik</li>
                    </ol>
                </nav>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        {{-- <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight"> --}}
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <!--====== Page Banner End ======-->


    <!--====== Blog Details Start ======-->
    <section class="blog-details-area pt-130 pb-160 rpt-100 rpb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content rmb-75">
                        <div class="blog-standard-item">
                            <img src="{{ asset('storage/praktik_baik/' . $praktik_baik->foto) }}" alt="Blog"
                                style="object-fit: cover;height: 519px;">
                            <ul class="blog-meta">
                                <li><i
                                        class="far fa-calendar-alt"></i>{{ date('d M Y', strtotime($praktik_baik->created_at)) }}
                                </li>
                                <li><i class="fa fa-map-marker"></i> {{ $praktik_baik->lokasi_waktu }}</li>
                            </ul>
                            <h2>Latar Belakang</h2>
                            <p>
                                {{ $praktik_baik->latar_belakang }}
                            </p>
                            <h2>Tujuan</h2>
                            <p>
                                {{ $praktik_baik->tujuan }}
                            </p>
                            <h2>Luaran, Manfaat dan Dampak</h2>
                            <p>
                                {{ $praktik_baik->luaran_manfaat_dampak }}
                            </p>
                            <h2>Pembelajaran</h2>
                            <p>
                                {{ $praktik_baik->pembelajaran }}
                            </p>
                            <h2>Kolaborasi Multipihak</h2>
                            <p>
                                {{ $praktik_baik->kolaborasi }}
                            </p>
                            <h2>Kontribusi terhadap GEDSI (Kesetaraan Gender, Disabilitas dan Inklusi Sosial)</h2>
                            <p>
                                {{ $praktik_baik->kontribusi }}
                            </p>
                            <h2>Keberlanjutan Program</h2>
                            <p>
                                {{ $praktik_baik->keberlanjutan_program }}
                            </p>
                            <h2>Useful Link</h2>
                            <p>
                                <a href="{{ $praktik_baik->link }}">{{ $praktik_baik->link }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="project-information bg-blue text-white mb-50 mr-xl-5 wow fadeInDown delay-0-2s"
                        style="visibility: visible; animation-name: fadeInDown;margin-top: 0">
                        <h3 class="project-info-title">Info</h3>
                        <div class="project-info-item">
                            <span>Bidang</span>
                            <h4>{{ $praktik_baik->bidang->name }}</h4>
                        </div>
                        <div class="project-info-item">
                            <span>Lembaga Induk</span>
                            <h4>{{ $praktik_baik->lembaga_induk->name }} </h4>
                        </div>
                        <div class="project-info-item">
                            <span>Pusat/Unit/Fakultas</span>
                            <h4>{{ $praktik_baik->lembaga_unit->name }} </h4>
                        </div>
                        <div class="project-info-item">
                            <span>Direktorat/Jurusan</span>
                            <h4>{{ $praktik_baik->lembaga->name }} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Blog Details End ======-->
@endsection
