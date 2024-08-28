@extends('layouts/landing')
@section('title','Home')
@section('body')
  <!--====== Hero Section Start ======-->
  <section class="dashboard-section rel z-2 pt-120 pb-75">
    <div class="container">
      <div class="dashboard-screenshot-wrap">
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
              <h2 class="text-left">Manajemen Talenta Nasional</h2>
              <p class="text-left">
                Manajemen Talenta Nasional adalah rangkaian upaya terstruktur dan berkelanjutan dalam menghasilkan Talenta, melalui pendekatan makro yang berfokus pada ekosistem pendukung di tingkat negara serta pendekatan mikro yang berfokus pada sinergi dan keberlanjutan proses pembibitan, pengembangan potensi, dan penguatan ketalentaan
              </p>
              <a href="{{ route('home.about') }}" class="theme-btn">Tentang MTN <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-1.jpeg') }}" alt="Dashboard Screenshot">
          </div>
        </div>
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
              <h2 class="text-left">Pustaka Digital</h2>
              <p class="text-left">
                Pelajari berbagai referensi kebijakan pemerintah, panduan pelaksanaan, jelajahi video dan infografis rangkuman data dan informasi tentang Manajemen Talenta Nasional (MTN) dalam format media digital di halaman Pustaka.
              </p>
              <a href="{{ route('home.pustaka') }}" class="theme-btn">Pustaka MTN <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-2.png') }}" alt="Dashboard Screenshot">
          </div>
        </div>
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
{{--              <span class="sub-text text-primary text-left">Sistem Managemen Talenta Nasional</span>--}}
              <h2 class="text-left">Berita dan Kegiatan</h2>
              <p class="text-left">
                Berita sorotan talenta dan kumpulan informasi kegiatan intervensi Talenta yang dilaksanakan oleh Kementerian dan Lembaga Gugus Tugas Manajemen Talenta Nasional.
              </p>
              <a href="{{ route('home.news') }}" class="theme-btn">Berita & Kegiatan <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-3.png') }}" alt="Dashboard Screenshot">
          </div>
        </div>
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
              {{--              <span class="sub-text text-primary text-left">Sistem Managemen Talenta Nasional</span>--}}
              <h2 class="text-left">Praktik Baik Intervensi</h2>
              <p class="text-left">
                Kumpulan pengetahuan Praktik Baik yang merupakan pembelajaran dari hasil pelaksanaan kegiatan intervensi Manajemen Talenta Nasional dari pemangku kepentingan pemerintah.
              </p>
              <a href="{{ route('home.praktik-baik') }}" class="theme-btn">Praktik Baik <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-4.png') }}" alt="Dashboard Screenshot">
          </div>
        </div>
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
              {{--              <span class="sub-text text-primary text-left">Sistem Managemen Talenta Nasional</span>--}}
              <h2 class="text-left">Dashboard Monitoring</h2>
              <p class="text-left">
                Dashboard untuk mendukung pemantauan ringkasan jumlah talenta berdasar kategori dan capaian indicator capaian talenta berdasarkan sasaran Desain Besar Manajemen Talenta Nasional
              </p>
              <a href="{{ route('dashboard-capaian') }}" class="theme-btn">Dashboard Monitoring <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-5.png') }}" alt="Dashboard Screenshot">
          </div>
        </div>
        <div class="dashboard-screenshot-item">
          <div class="w-100 carousel-content">
            <div class="cc-content">
              {{--              <span class="sub-text text-primary text-left">Sistem Managemen Talenta Nasional</span>--}}
              <h2 class="text-left">Sinergi Data</h2>
              <p class="text-left">
                Halaman pengelolaan data dan pengaturan pertukaran data Manajemen Talenta Nasional bagi anggota Gugus Tugas dan Administrator Sekretariat MTN
              </p>
              <a href="{{ route('dashboard-capaian') }}" class="theme-btn">Sinergi Data <i class="fas fa-arrow-right"></i></a>
            </div>
            <img src="{{ asset('assets/landing/images/background/mtn-slide-6.png') }}" alt="Dashboard Screenshot">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== Hero Section End ======-->

  <section class="solutions-section rel z-5 pb-100 rpb-70">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title mb-55 d-flex flex-column w-100">
            <h2>Tentang</h2>
            <p>Portal MTN (Manajemen Talenta Nasional) merupakan platform online yang dikembangkan untuk mendukung tata kelola MTN dalam sosialisasi informasi umum mengenai DBMTN 2023-2045 kepada masyarakat luas, penyimpanan data talenta nasional,mendukung fungsi monitoring dan evaluasi serta pengelolaan pengetahuan MTN</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-info-circle"></i>
              <h3><a>Tentang MTN</a></h3>
              <p>Pengenalan MTN, latar belakang, tujuan, sasaran dan kegiatan intervensinya.</p>
            </div>
            <a href="{{ route('home.about') }}" class="learn-more">Halaman Tentang <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-book"></i>
              <h3><a>Pustaka Digital</a></h3>
              <p>Berbagai referensi kebijakan, panduan, media dan infografis MTN.</p>
            </div>
            <a href="{{ route('home.pustaka') }}" class="learn-more">Halaman Pustaka <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-newspaper"></i>
              <h3><a>Berita & Kegiatan</a></h3>
              <p>Sorotan talenta, kegiatan anugerah talenta dan ajang talenta terbaru.</p>
            </div>
            <a href="{{ route('home.news') }}" class="learn-more">Halaman Berita dan Kegiatan <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-check-circle"></i>
              <h3><a>Praktik Baik</a></h3>
              <p>Kumpulan praktik baik hasil pembelajaran dari kegiatan intervensi MTN.</p>
            </div>
            <a href="{{ route('home.praktik-baik') }}" class="learn-more">Halaman Praktik Baik <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-tachometer-alt"></i>
              <h3><a>Dashboard</a></h3>
              <p>Dashboard monitoring jumlah talenta dan capaian indikator MTN.</p>
            </div>
            <a href="{{ route('dashboard-capaian') }}" class="learn-more">Halaman Dashboard <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-5">
          <div class="solution-item wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="solution-content">
              <i class="fa fa-database"></i>
              <h3><a>Sinergi Data</a></h3>
              <p>Halaman pengelolaan dan pengaturan pertukaran data MTN bagi anggota Gugus Tugas MTN.</p>
            </div>
            <a href="{{ route('dashboard-capaian') }}" class="learn-more">Halaman Sinergi Data <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <img class="dots-shape" src="{{ asset('assets/landing/images/shapes/dots.png')}}" alt="Shape">
    <img class="tringle-shape" src="{{ asset('assets/landing/images/shapes/tringle.png')}}" alt="Shape">
    <img class="close-shape" src="{{ asset('assets/landing/images/shapes/close.png')}}" alt="Shape">
    <img class="circle-shape" src="{{ asset('assets/landing/images/shapes/circle.png')}}" alt="Shape">
  </section>

  <!--====== Partners Section Start ======-->
  <section class="partners-section rel z-1 pt-250 rpt-150 pb-90 rpb-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-10 d-flex flex-column align-items-center">
          <div class="section-title mb-45 text-center d-flex flex-column align-items-center">
            <h3 class="text-center">Gugus Tugas Manajemen Talenta Nasional</h3>
            <p class="w-75">Untuk mengoordinasikan penyelenggaraan DBMTN 2023-2045 yang dilaksanakan oleh kementerian/lembaga, pemerintah daerah provinsi, pemerintah daerah kabupaten/kota, dan pemangku kepentingan dan mengoordinasikan penyelesaian permasalahan dan hambatan (debottlenecking) dalam penyelenggaraan DBMTN 2023-2045 telah dibentuk Gugus Tugas MTN yang diketuai oleh Menteri PPN/Kepala Bappenas dan beranggotakan Menteri/Kepala Lembaga terkait</p>
          </div>
          <div class="row justify-content-lg-center">
            <div class="col-lg-2 col-sm-4 col-6">
              <a class="partner-item wow fadeInRight delay-0-2s" href="https://www.bappenas.go.id/">
                <img src="{{ asset('assets/media/logos/logoc Bappenas.png') }}" alt="Partner">
              </a>
            </div>
            <div class="col-lg-2 col-sm-4 col-6">
              <a class="partner-item wow fadeInRight delay-0-4s" href="https://www.brin.go.id/">
                <img src="{{ asset('assets/media/logos/logo BRIN .jpeg') }}" alt="Partner">
              </a>
            </div>
            <div class="col-lg-2 col-sm-4 col-6">
              <a class="partner-item wow fadeInRight delay-0-6s" href="https://www.kemdikbud.go.id/">
                <img src="{{ asset('assets/media/logos/Dinas Pendidikan.png') }}" alt="Partner">
              </a>
            </div>
            <div class="col-lg-2 col-sm-4 col-6">
              <a class="partner-item wow fadeInRight delay-0-8s" href="https://www.ksp.go.id/">
                <img src="{{ asset('assets/media/logos/Kantor_Staf_Presiden.png') }}" alt="Partner">
              </a>
            </div>
            <div class="col-lg-2 col-sm-4 col-6">
              <a class="partner-item wow fadeInRight delay-0-2s" href="https://www.kemenpora.go.id/">
                <img src="{{ asset('assets/media/logos/Kemenpora_Logo.png') }}" alt="Partner" style="width: 65%">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-about-bg">
      <img src="/assets/landing/images/shapes/hero-about-bg.png" alt="Background">
    </div>
  </section>
  <!--====== Partners Section End ======-->

  <!--====== Highlight Talenta Section Start ======-->
  <section class="blog-section rel z-1 pb-210 rpb-100 rpb-150 rmb-30">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title mb-55">
            <span class="sub-title">Highlight Talenta</span>
            <h2>Sorotan Talenta Indonesia Berprestasi Terbaru</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        @foreach($highlight_talenta as $h)
          <div class="col-xl-3 col-md-6">
            <div class="blog-item wow fadeInUp delay-0-2s">
              <div class="image">
                <img src="{{ $h->talenta->foto_talenta ? asset('storage/talenta/'.$h->talenta->foto_talenta) : '/assets/landing/images/blog/blog1.jpg' }}" alt="Foto">
              </div>
              <div class="blog-author justify-content-center">
                <h5><a href="{{ $h->link_web }}">{{ $h->talenta->nama_talenta }}</a></h5>
              </div>
              <div class="blog-content">
                <ul class="blog-meta">
                  <li><i class="far fa-calendar-alt"></i> <a href="{{ $h->link_web }}">{{ $h->tahun }}</a></li>
                </ul>
                <h4><a href="{{ $h->link_web }}">{{ $h->prizes->name }}</a></h4>
                <p>{{ Illuminate\Support\Str::limit($h->desc_penghargaan,100) }}</p>
              </div>
              <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        <div class="col-lg-12">
          <div class="news-more-btn text-center pt-30">
            <a href="{{ route('home.highlight-talenta') }}" class="theme-btn style-three">Lihat Highlight Talenta Lainnya <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== Highlight Talenta Section End ======-->

  <!--====== Anugrah Talenta Section Start ======-->
  <section class="blog-section rel z-1 pb-210 rpb-100 rpb-150 rmb-30">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title mb-55">
            <span class="sub-title">Anugerah Talenta</span>
            <h2>Kegiatan Anugerah Talenta Terbaru</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        @foreach($anugrah_talenta as $h)
          <div class="col-xl-3 col-md-6">
            <div class="blog-item wow fadeInUp delay-0-2s">
              <div class="image">
                <img src="{{ $h->foto ? asset('storage/anugrah_talenta/'.$h->foto) : '/assets/landing/images/blog/blog1.jpg' }}" alt="Foto">
              </div>
              <div class="blog-author justify-content-center">
                <h5><a href="{{ $h->link_web }}">{{ $h->bidang->name }}</a></h5>
              </div>
              <div class="blog-content">
                <ul class="blog-meta">
                  <li><i class="far fa-calendar-alt"></i> <a href="{{ $h->link_web }}">{{ $h->tahun_pelaksanaan }}</a></li>
                </ul>
                <h4><a href="{{ $h->link_web }}">{{ $h->nama_kegiatan }}</a></h4>
                <p>{{ Illuminate\Support\Str::limit($h->desc_kegiatan,100) }}</p>
              </div>
              <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        <div class="col-lg-12">
          <div class="news-more-btn text-center pt-30">
            <a href="{{ route('home.anugrah-talenta') }}" class="theme-btn style-three">Lihat Anugrah Talenta Lainnya <i class="fas fa-arrow-right"></i></a>
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
            <span class="sub-title">Ajang Talenta</span>
            <h2>Kegiatan Ajang Talenta Terbaru</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        @foreach($ajang_talenta as $h)
          <div class="col-xl-3 col-md-6">
            <div class="blog-item wow fadeInUp delay-0-2s">
              <div class="image">
                <img src="{{ $h->foto ? asset('storage/ajang_talenta/'.$h->foto) : '/assets/landing/images/blog/blog1.jpg' }}" alt="Foto">
              </div>
              <div class="blog-author justify-content-center">
                <h5><a href="{{ $h->link_web }}">{{ $h->lembaga->name }}</a></h5>
              </div>
              <div class="blog-content">
                <ul class="blog-meta">
                  <li><i class="far fa-calendar-alt"></i> <a href="{{ $h->link_web }}">{{ date('d M Y', strtotime($h->tgl_mulai)).' - '.date('d M Y', strtotime($h->tgl_selesai)) }}</a></li>
                </ul>
                <h4><a href="{{ $h->link_web }}">{{ $h->nama_ajang }}</a></h4>
                <p>{{ Illuminate\Support\Str::limit($h->desc,100) }}</p>
              </div>
              <a href="{{ $h->link_web }}" class="learn-more">Lihat <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        <div class="col-lg-12">
          <div class="news-more-btn text-center pt-30">
            <a href="{{ route('home.ajang-talenta') }}" class="theme-btn style-three">Lihat Ajang Talenta Lainnya <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== Ajang Talenta Section End ======-->

  <!--====== Praktik Baik Section Start ======-->
  <section class="blog-section rel z-1 pb-100 rpb-100 rpb-150 rmb-30">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <div class="section-title mb-55">
            <span class="sub-title">Praktik Baik</span>
            <h2>Praktik Baik</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        @foreach($praktik_baik as $h)
          <div class="col-xl-3 col-md-6">
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
          <div class="news-more-btn text-center pt-30">
            <a href="{{ route('home.praktik-baik') }}" class="theme-btn style-three">Lihat Praktik Baik Lainnya <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== Praktik Baik Section End ======-->

  <!--====== Feedback Section Start ======-->
  <section class="feedback-section-two rel z-1 pb-130 rpy-100">
    <div class="container">
      <div class="row align-items-end mb-20">
        <div class="col-xl-5 col-lg-8">
          <div class="section-title mb-20">
            <h2>Testimoni</h2>
          </div>
        </div>
        <div class="col-xl-7 col-lg-4 d-flex justify-content-end">
          <button class="theme-btn style-one mr-4 add-testimoni"><i class="fa fa-plus mr-2"></i> Isi Testimoni</button>
          @if(count($testimoni) > 0)
            <div class="slider-arrow-btns text-lg-right">
              <button class="feedback-prev"><i class="fas fa-arrow-left"></i></button>
              <button class="feedback-next"><i class="fas fa-arrow-right"></i></button>
            </div>
          @endif
        </div>
      </div>
      @if(count($testimoni) > 0)
        <div class="feedback-active">
          @foreach($testimoni as $t)
            @php
                $class = '';
                switch($loop->index){
                    case 0:
                      $class = 'wow fadeInUp delay-0-2s';
									  break;
									  case 1:
										  $class = 'wow fadeInUp delay-0-4s';
                    break;
                    case 2:
										  $class = 'wow fadeInUp delay-0-6s';
                    break;
                }
            @endphp
            <div class="feedback-item-two {{ $class }}">
              <p>
                <i>&ldquo;{{ $t->konten }}&rdquo;</i>
              </p>
              <div class="feedback-author">
                <img src="{{ asset('storage/testimoni/'.$t->foto) }}" class="mr-3" alt="avatar" style="width: 60px;height: 60px;border-radius: 50%;object-fit: cover; border: 1px solid var(--primary-color);margin-bottom: 0"/>
                <div class="author-content d-flex flex-column">
                  <h4>{{ $t->nama }}</h4>
                  <span class="font-weight-bolder">{{ $t->nama_lembaga }}</span>
                  <span>{{ $t->alamat_lembaga }}</span>
                  <span>{{ $t->province->name }} - {{ $t->regency->name }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </section>
  <!--====== Feedback Section End ======-->
  <div class="modal fade" id="modalTestimoni" tabindex="-1" aria-labelledby="modalTestimoni" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-4">
          <form id="test-form" action="{{ route('home.common.post-testi') }}">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="test_name">Nama</label>
                <input type="text" class="form-control" id="test_name" name="test_name">
              </div>
              <div class="form-group col-md-6">
                <label for="test_foto">Foto</label>
                <input type="file" class="form-control" id="test_foto" name="test_foto">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="test_no_hp">No HP</label>
                <input type="text" class="form-control" id="test_no_hp" name="test_no_hp">
              </div>
              <div class="form-group col-md-6">
                <label for="test_email">Email</label>
                <input type="text" class="form-control" id="test_email" name="test_email">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="test_bidang">Bidang</label>
                <select class="form-control" name="test_bidang" id="test_bidang" style="height: 56px;">
                  <option value="">Pilih Bidang</option>
                  @foreach($bidang as $b)
                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="lembaga_name">Nama Lembaga</label>
                <input type="text" class="form-control" name="lembaga_name" id="lembaga_name" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="lembaga_address">Alamat Lembaga</label>
              <textarea class="form-control" name="lembaga_address" id="lembaga_address"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="test_province">Provinsi</label>
                <select class="form-control" name="test_province" id="test_province">
                  <option value="">Pilih Provinsi</option>
                  @foreach($province as $p)
                      <option value="{{ $p->id }}">{{ $p->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="test_regency">Kabupaten/Kota</label>
                <select class="form-control" name="test_regency" id="test_regency">
                  <option value="">Pilih Kabupaten/Kota</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="test_konten">Konten</label>
              <div class="position-relative">
                <textarea class="form-control" id="test_konten" name="test_konten" rows="3"></textarea>
                <div class="position-absolute mr-2 mb-2" style="bottom: 0;right: 0">
                  <span id="konten_counter">0</span>/250
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="recaptcha" />
              <div class="g-recaptcha"
                   data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                   data-callback="getR"
                   data-size="invisible">
              </div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="save-testi">Kirim</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('css')
<style>
    #test-form .error{
      font-size: 12px;
      color: red;
      font-style: italic;
    }

    #test-form .form-group label{
      font-size: 1rem;
    }
    .feedback-author .author-content span{
      font-size: 14px;
      margin-bottom: 8px;
      line-height: 100%;
    }
    .nice-select{
      height: 56px;
      padding: 8px 16px;
    }

</style>
@endsection
@section('js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('assets/landing/js/jqueryValidation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/landing/js/jqueryValidation/additional-methods.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('.add-testimoni').on('click',function(){
      $('#modalTestimoni').modal('show');
    })
    $('#test_province').on('change',function(){
      if($(this).val()!==''){
        $.ajax({
          url: '/common/get-regencies',
          data: { province_id: $(this).val() },
          dataType: 'json',
          type: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (res){
            $('#test_regency').empty();
            $('#test_regency').append(`<option value="">Pilih Kabupaten/Kota</option>`);
            $.each(res.data, function(index, item){
              $('#test_regency').append(`<option value="${item.id}">${item.name}</option>`);
            })
            $('#test_regency').niceSelect('update')
          }
        })
      }
    })
    var validator = $("#test-form").validate({
      rules: {
        // simple rule, converted to {required:true}
        test_name: "required",
        test_no_hp: {
          required: true,
          digits: true
        },
        test_foto: {
          required: true,
          accept: "image/*",
          maxsize: 2097152
        },
        // compound rule
        test_email: {
          required: true,
          email: true
        },
        lembaga_name: {
          required: true,
        },
        lembaga_address: {
          required: true,
        },
        recaptcha: {
          required: true,
        },
        test_province: {
          required: true,
        },
        test_regency: {
          required: true,
        },
        test_konten: {
          required: true,
          maxlength: 250
        },
        test_bidang: {
          required: true,
        },
      },
      submitHandler: function(form) {
        $('#save-testi').prop('disabled',true).text('Mengirim Data...')
        const data = new FormData($('#test-form')[0]);
        $.ajax({
          url:$('#test-form').attr('action'),
          data: data,
          dataType: 'json',
          type: 'post',
          cache: false,
          contentType: false,
          processData: false,
          success: function () {
            grecaptcha.reset();
            $('#konten_counter').text(0)
            $('#test_province').val('').trigger('change');
            $('#test_province').niceSelect('update')
            $('#test_regency').empty();
            $('#test_regency').append(`<option value="">Pilih Kabupaten/Kota</option>`);
            $('#test_regency').niceSelect('update')
            $('#test-form')[0].reset();
            validator.resetForm();
            $('#save-testi').prop('disabled',false).text('Kirim')
            $('#modalTestimoni').modal('hide');
            Swal.fire({
              title: 'Sukses',
              text: 'Terima kasih telah mengisi testimoni',
              icon: 'success',
              confirmButtonText: 'Tutup'
            })
          }
        })
      }
    });
    $('#save-testi').on('click', function(){
      if($('input[name="recaptcha"]').val()!==''){
        $("#test-form").submit();
      }else{
        grecaptcha.execute();
      }
    })
    $('#test_konten').on('keypress keyup keydown', function(){
      $('#konten_counter').text($(this).val().length)
    })
  });
  function getR(t){
    $('input[name="recaptcha"]').val(t);
    $("#test-form").submit();
  }
</script>
@endsection
