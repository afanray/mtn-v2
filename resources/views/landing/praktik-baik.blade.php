@extends('layouts/landing')
@section('title','Praktik Baik')
@section('body')
  <section class="page-banner bg-blue rel z-1" style="">
    <div class="container">
      <div class="banner-inner">
        <h1 class="page-title wow fadeInUp delay-0-2s">Praktik Baik</h1>
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
    <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
    <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png" alt="Shape">
  </section>
  <!--====== Highlight Talenta Section Start ======-->
  <section class="blog-section rel z-1 pb-100 pt-100 rpb-100 rpb-150 rmb-30">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title mb-55">
            <h2>Praktik Baik</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <ul class="project-filter mb-55">
            <li @class(['current'=>!$bidang_id])><a href="{{ route('home.praktik-baik') }}">Semua</a></li>
            @foreach($bidang as $b)
              <li @class(['current'=>$b->id == $bidang_id])><a href="{{ route('home.praktik-baik',['_b'=>$b->id]) }}">{{ $b->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="row align-items-center justify-content-center">
        @foreach($praktik_baik as $h)
          <div class="col-xl-6 col-md-6">
            <div class="blog-item wow fadeInUp delay-0-2s">
              <div class="image">
                <img src="{{ $h->foto ? asset('storage/praktik_baik/'.$h->foto) : '/assets/landing/images/blog/blog1.jpg' }}" alt="Foto">
              </div>
              <div class="blog-author justify-content-center">
                <h5>{{ $h->bidang->name }}</h5>
              </div>
              <div class="blog-content">
                <h4>{{ $h->nama_program }}</h4>
                <p>{{ Illuminate\Support\Str::limit($h->latar_belakang,100) }}</p>
              </div>
              <a href="{{ route('home.praktik-baik-detail',[$h->id.'-'.(Illuminate\Support\Str::slug($h->nama_program,'-'))]) }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        <div class="col-lg-12">
          <div class="d-flex justify-content-center">
            {{ $praktik_baik->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== Highlight Talenta Section End ======-->
@endsection
