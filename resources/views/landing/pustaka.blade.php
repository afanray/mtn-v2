@extends('layouts/landing')
@section('title', 'Pustaka')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">Pustaka MTN</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <section class="blog-section rel z-1 pb-50 pt-100 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Kebijakan</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                @foreach ($kebijakan as $h)
                    <div class="col-xl-6 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="/storage/pustaka/{{ $h->image }}" alt="Foto">
                            </div>
                            <div class="blog-content">
                                <h4><a href="{{ $h->link }}" download="">{{ $h->title }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->description, 100) }}</p>
                            </div>
                            <a href="{{ $h->link }}" class="learn-more" download="">Unduh <i
                                    class="fas fa-file-download"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="blog-section rel z-1 pb-50 pt-50 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Pedoman Teknis</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                @foreach ($pedomanTeknis as $h)
                    <div class="col-xl-6 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="/storage/pustaka/{{ $h->image }}" alt="Foto">
                            </div>
                            <div class="blog-content">
                                <h4><a href="{{ $h->link }}" download="">{{ $h->title }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->description, 100) }}</p>
                            </div>
                            <a href="{{ $h->link }}" class="learn-more" download="">Unduh <i
                                    class="fas fa-file-download"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="blog-section rel z-1 pb-50 pt-50 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Pustaka Video</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($pustakaVideo as $h)
                    <div class="col-12 col-xl-6">
                        <video width="100%" controls>
                            <source src="/storage/pustaka/{{ $h->link }}" type="video/mp4">
                        </video>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="blog-section rel z-1 pb-50 pt-50 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Pustaka Infografis</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                @foreach ($pustakaInfo as $h)
                    <div class="col-xl-6 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="/storage/pustaka/{{ $h->image }}" alt="Foto">
                            </div>
                            <div class="blog-content">
                                <h4><a href="{{ $h->link }}" download="">{{ $h->title }}</a></h4>
                                <p>{{ Illuminate\Support\Str::limit($h->description, 100) }}</p>
                            </div>
                            <a href="{{ $h->link }}" class="learn-more" download="">Unduh <i
                                    class="fas fa-file-download"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
