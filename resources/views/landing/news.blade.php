@extends('layouts/landing')
@section('title', 'Berita & Kegiatan')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">Berita & Kegiatan</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        {{-- <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight"> --}}
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>


    <div class="container my-20">
        <div class="row">
            <!-- Berita Utama sebagai Carousel -->
            <div class="col-md-8">
                <div id="beritaUtamaCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner rounded">
                        @foreach ($mainNews as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <a href="{{ route('berita-kegiatan.view', $item['slug']) }}">
                                    <div class="position-relative">
                                        <img src="storage/berita_kegiatan/{{ $item['image'] }}" class="d-block"
                                            alt="{{ $item['image'] }}"
                                            style="width: 100%; height: 480px; object-fit: cover;">

                                        <!-- Gradient Overlay -->
                                        <div class="overlay-gradient"></div>

                                        <div class="carousel-caption d-none d-md-block p-10 rounded">
                                            <h5 class="text-white text-bold">{{ $item['title'] }}</h5>
                                            <div class="mb-3 text-muted">
                                                <small class="text-white"> {{ $item->user->name }} |
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigasi Carousel -->
                    <a class="carousel-control-prev" href="#beritaUtamaCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#beritaUtamaCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Berita Kecil Kiri -->
            <div class="col-md-4 mt-10">
                @foreach ($oldNews as $item)
                    <div class="card mb-3">
                        <img src="storage/berita_kegiatan/{{ $item['image'] }}" class="card-img-top"
                            alt="{{ $item['image'] }}" style="width: auto; height: 100px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['title'] }}</h5>
                            <div class="text-muted">
                                <small class="text-light-secondary"> {{ $item->user->name }} |
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Berita Trending -->
        <div class="row mt-20">
            <div class="col-12">
                <h4 class="mb-4">Berita sebelumnya</h4>
            </div>
            @foreach ($moreNews as $item)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('berita-kegiatan.view', $item['slug']) }}">
                        <div class="card">
                            <img src="storage/berita_kegiatan/{{ $item['image'] }}" class="card-img-top"
                                alt="{ $item['image'] }}" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <div class="text-muted">
                                    <small class="text-light-secondary"> {{ $item->user->name }} |
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    <!--====== Highlight Talenta Section Start ======-->
    <section class="blog-section rel z-1 pb-100 rpb-100 rpb-150 rmb-30">
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
                                <img src="{{ $h->talenta->foto_talenta ? asset('storage/talenta/' . $h->talenta->foto_talenta) : 'https://avatar.iran.liara.run/public/boy?username=Ash' }}"
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
                            <a href="{{ $h->link_web }}" class="learn-more text-white"
                                style="background-color : #4575B8;">Lihat <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="news-more-btn text-center pt-30">
                        <a href="{{ route('home.highlight-talenta') }}" class="theme-btn text-white"
                            style="background-color : #4575B8;">Kunjungi Halaman <i
                                class="fas
                            fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Highlight Talenta Section End ======-->

    <!--====== Anugrah Talenta Section Start ======-->
    {{-- <section class="blog-section rel z-1 pb-100 rpb-100 rpb-150 rmb-30">
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
                            <a href="{{ $h->link_web }}" class="learn-more">Lihat <i
                                    class="fas fa-arrow-right"></i></a>
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
    </section> --}}
    <!--====== Ajang Talenta Section End ======-->
@endsection

@section('css')
    <style>
        .overlay-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2));
            /* Adjust the rgba values to control the opacity and colors of the gradient */
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            z-index: 2;
        }
    </style>

@endsection
