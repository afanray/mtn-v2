@extends('layouts/landing')
@section('title', 'Berita & Kegiatan')
@section('body')
    <section class="page-banner bg-blue rel z-1" style="">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s" style="visibility: visible; animation-name: fadeInUp;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Berita & Kegiatan </li>
                </ol>
            </nav>
            <div class="banner-inner">
                <h1 class="page-title wow fadeInUp delay-0-2s">Berita & Kegiatan</h1>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <!--====== Highlight Talenta Section Start ======-->
    <section class="blog-section rel z-1 pb-100 pt-100 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Highlight Talenta</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($highlight_talenta as $h)
                    <div class="col-xl-3 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="{{ $h->talenta->foto_talenta ? asset('storage/talenta/' . $h->talenta->foto_talenta) : '/assets/landing/images/blog/blog1.jpg' }}"
                                    alt="Foto">
                            </div>
                            <div class="blog-author justify-content-center">
                                <h5><a href="{{ $h->link_web }}">{{ $h->talenta->nama_talenta }}</a></h5>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a
                                            href="{{ $h->link_web }}">{{ $h->tahun }}</a></li>
                                </ul>
                                <h4><a href="{{ $h->link_web }}">{{ $h->prizes->name }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->desc_penghargaan, 100) }}</p>
                            </div>
                            <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="news-more-btn text-center pt-30">
                        <a href="{{ route('home.highlight-talenta') }}" class="theme-btn style-three">Kunjungi Halaman <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Highlight Talenta Section End ======-->

    <!--====== Anugrah Talenta Section Start ======-->
    <section class="blog-section rel z-1 pb-100 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Anugerah Talenta</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($anugrah_talenta as $h)
                    <div class="col-xl-3 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="{{ $h->foto ? asset('storage/anugrah_talenta/' . $h->foto) : '/assets/landing/images/blog/blog1.jpg' }}"
                                    alt="Foto">
                            </div>
                            <div class="blog-author justify-content-center">
                                <h5><a href="{{ $h->link_web }}">{{ $h->bidang->name }}</a></h5>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a
                                            href="{{ $h->link_web }}">{{ $h->tahun_pelaksanaan }}</a></li>
                                </ul>
                                <h4><a href="{{ $h->link_web }}">{{ $h->nama_kegiatan }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->desc_kegiatan, 100) }}</p>
                            </div>
                            <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="news-more-btn text-center pt-30">
                        <a href="{{ route('home.anugrah-talenta') }}" class="theme-btn style-three">Kunjungi Halaman <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Anugrah Talenta Section End ======-->

    <!--====== Ajang Talenta Section Start ======-->
    <section class="blog-section rel z-1 pb-100 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Ajang Talenta</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($ajang_talenta as $h)
                    <div class="col-xl-3 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="{{ $h->foto ? asset('storage/ajang_talenta/' . $h->foto) : '/assets/landing/images/blog/blog1.jpg' }}"
                                    alt="Foto">
                            </div>
                            <div class="blog-author justify-content-center">
                                <h5><a href="{{ $h->link_web }}">{{ $h->lembaga->name }}</a></h5>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a
                                            href="{{ $h->link_web }}">{{ date('d M Y', strtotime($h->tgl_mulai)) . ' - ' . date('d M Y', strtotime($h->tgl_selesai)) }}</a>
                                    </li>
                                </ul>
                                <h4><a href="{{ $h->link_web }}">{{ $h->nama_ajang }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->desc, 100) }}</p>
                            </div>
                            <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="news-more-btn text-center pt-30">
                        <a href="{{ route('home.ajang-talenta') }}" class="theme-btn style-three">Kunjungi Halaman <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Ajang Talenta Section End ======-->
@endsection
