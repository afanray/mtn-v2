@extends('layouts/landing')
@section('title','Dashboard')
@section('body')
  <section class="page-banner bg-blue rel z-1" style="">
    <div class="container">
      <div class="banner-inner">
        <h1 class="page-title wow fadeInUp delay-0-2s">Dashboard</h1>
      </div>
    </div>
    <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
    <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
    <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
    <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
    <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png" alt="Shape">
  </section>
  <section class="services-section-three bg-lighter rel z-1 pt-100 pb-100 rpb-70">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-title rmt-70 mb-55">
            <h2>Ringkasan Jumlah Talenta</h2>
          </div>
        </div>
      </div>
      <ul class="nav nav-tabs project-filter mb-55 mtn-tab" id="talenta-tab" role="tablist">
        <li class="nav-item current p-0" role="presentation">
          <button class="nav-link active" id="talenta-1-tab" data-toggle="tab" data-target="#talenta-1" type="button" role="tab" aria-controls="talenta-1" aria-selected="false">Bidang Riset & Inovasi</button>
        </li>
        <li class="nav-item p-0" role="presentation">
          <button class="nav-link " id="talenta-2-tab" data-toggle="tab" data-target="#talenta-2" type="button" role="tab" aria-controls="talenta-2" aria-selected="false">Bidang Seni Budaya</button>
        </li>
        <li class="nav-item p-0" role="presentation">
          <button class="nav-link " id="talenta-3-tab" data-toggle="tab" data-target="#talenta-3" type="button" role="tab" aria-controls="talenta-3" aria-selected="false">Bidang Olahraga</button>
        </li>
      </ul>
      <div class="tab-content" id="talenta-tab-1">
        <div class="tab-pane fade show active" id="talenta-1" role="tabpanel" aria-labelledby="talenta-1-tab">
          <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50 wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <li class="nav-item">
              <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#watching" data-id="1">
                <i class="flaticon-group mr-5"></i>
                <div class="content mr-5">
                  <h3>Pra Bibit Talenta</h3>
                </div>
                <p class="mr-5"><strong>Kriteria:</strong> Peserta didik yang memiliki capaian prestasi di bidang riset dan inovasi</p>
                <span class="font-weight-boldest h1">{{ $ringkasan->riset_pra_bibit }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#sharing" data-id="2">
                <i class="fa fa-book-open mr-5"></i>
                <div class="content mr-5">
                  <h3>Bibit Talenta</h3>
                </div>
                <p class="mr-5"><strong>Kriteria:</strong> Lulusan S1 hingga S2. Publikasi artikel ilmiah di media. Publikasi di peer-reviewed jurnal</p>
                <span class="font-weight-boldest h1">{{ $ringkasan->riset_bibit }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#editing" data-id="3">
                <i class="flaticon-monitoring mr-5"></i>
                <div class="content mr-5">
                  <h3>Talenta Potensial</h3>
                </div>
                <p class="mr-5"><strong>Kriteria:</strong> Lulusan S3. Publikasi di peer-reviewed jurnal. Pengalaman menjadi anggota kelompok riset. Penerima hibah penelitian Nasional maupun Internasional</p>
                <span class="font-weight-boldest h1">{{ $ringkasan->riset_potensial }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#comments" data-id="4">
                <i class="fa fa-building mr-5"></i>
                <div class="content mr-5">
                  <h3>Talenta Unggul</h3>
                </div>
                <p class="mr-5"><strong>Kriteria:</strong> Lulusan S3 dan telah menjalani postdoctoral.
                  Publikasi di peer-reviewed jurnal dan menjadi lead author. Memiliki H-index tinggi. Pengalaman memimpin kelompok riset/R&D/Lab.
                  Penerima hibah penelitian Nasional maupun Internasional. Memiliki paten. Perilaku ilmiah, konsistensi, outcomes (penilaian kualitatif, misalnya melalui wawancara)
                </p>
                <span class="font-weight-boldest h1">{{ $ringkasan->riset_unggul }}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-pane fade" id="talenta-2" role="tabpanel" aria-labelledby="talenta-2-tab">
          <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
            <li class="nav-item">
              <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#watching" data-id="5">
                <i class="flaticon-group mr-5"></i>
                <div class="content mr-5">
                  <h3>Pra Bibit</h3>
                </div>
                <p class="mr-5">
                  <strong>Usia: </strong><span>< 18 tahun</span><br />
                  <strong>Jenjang Pendidikan: </strong><span>PAUD s.d SMA</span><br />
                  <strong>Praktik Arstistik: </strong><span>< 3 tahun</span><br />
                  <strong>Rekognisi: </strong><span>N/A</span><br />
                </p>
                <span class="font-weight-boldest h1">{{ $ringkasan->seni_pra_bibit }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#sharing" data-id="6">
                <i class="fa fa-book-open mr-5"></i>
                <div class="content mr-5">
                  <h3>Bibit</h3>
                </div>
                <p class="mr-5">
                  <strong>Usia: </strong><span>18 s.d 26 tahun</span><br />
                  <strong>Jenjang Pendidikan: </strong><span>Lulus SMA s.d S1 +4 tahun</span><br />
                  <strong>Praktik Arstistik: </strong><span>3 s.d 10 tahun</span><br />
                  <strong>Rekognisi: </strong><span>Lokal</span><br />
                </p>
                <span class="font-weight-boldest h1">{{ $ringkasan->seni_bibit }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#editing" data-id="7">
                <i class="flaticon-monitoring mr-5"></i>
                <div class="content mr-5">
                  <h3>Potensial</h3>
                </div>
                <p class="mr-5">
                  <strong>Usia: </strong><span>27 s.d 50 Tahun</span><br />
                  <strong>Jenjang Pendidikan: </strong><span>5 tahun setelah S1</span><br />
                  <strong>Praktik Arstistik: </strong><span>10 s.d 25 tahun berkarya</span><br />
                  <strong>Rekognisi: </strong><span>Nasional, regional, internasional</span><br />
                </p>
                <span class="font-weight-boldest h1">{{ $ringkasan->seni_potensial }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#comments" data-id="8">
                <i class="fa fa-building mr-5"></i>
                <div class="content mr-5">
                  <h3>Unggul</h3>
                </div>
                <p class="mr-5">
                  <strong>Usia: </strong><span>> 50 tahun</span><br />
                  <strong>Jenjang Pendidikan: </strong><span>N/A</span><br />
                  <strong>Praktik Arstistik: </strong><span>> 25 tahun</span><br />
                  <strong>Rekognisi: </strong><span>Nasional, regional, internasional</span><br />
                </p>
                <span class="font-weight-boldest h1">{{ $ringkasan->seni_unggul }}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-pane fade" id="talenta-3" role="tabpanel" aria-labelledby="talenta-3-tab">
          <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
            <li class="nav-item">
              <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#watching" data-id="9">
                <i class="fa fa-book-open mr-5"></i>
                <div class="content mr-5">
                  <h3>Bibit</h3>
                </div>
                <div class="content-p mr-5">
                  <div>
                    <strong>Usia: </strong><span>6-9 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Fundamental (Pembinaan Dasar)</span><br />
                    <strong>Wadah Pembinaan: </strong><span>Klub dan Sekolah</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional</span><br />
                  </div>
                  <div>
                    <strong>Usia: </strong><span>9-12 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Belajar untuk Berlatih</span><br />
                    <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga dan Klub IOCO (Sentra Latihan Daerah)</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional</span><br />
                  </div>
                </div>
                <span class="font-weight-boldest h1">{{ $ringkasan->or_bibit }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#sharing" data-id="10">
                <i class="flaticon-monitoring mr-5"></i>
                <div class="content mr-5">
                  <h3>Potensial</h3>
                </div>
                <div class="content-p mr-5">
                  <div>
                    <strong>Usia: </strong><span>12-15 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Latihan</span><br />
                    <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, PPLPD (Sentra Latihan Daerah) SLOMPN (Sentra Latihan Nasional)</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah); Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                  </div>
                  <div>
                    <strong>Usia: </strong><span>15- 18 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Belajar untuk Berkompetisi; serta, Berlatih untuk Berkompetisi</span><br />
                    <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, SKO (Sentra Latihan SLOMPN (Sentra Latihan Nasional) Nasional)</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah); Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                  </div>
                </div>
                <span class="font-weight-boldest h1">{{ $ringkasan->or_potensial }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#editing" data-id="11">
                <i class="fa fa-building mr-5"></i>
                <div class="content mr-5">
                  <h3>Unggul</h3>
                </div>
                <div class="content-p mr-5">
                  <div>
                    <strong>Usia: </strong><span>18- 23 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Berkompetisi; serta, Belajar untuk Juara</span><br />
                    <strong>Wadah Pembinaan: </strong><span>PELATNAS Elit Junior</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Nasional, Regional, Internasional </span><br />
                  </div>
                  <div>
                    <strong>Usia: </strong><span>23-33 tahun</span><br />
                    <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Juara</span><br />
                    <strong>Wadah Pembinaan: </strong><span>PELATNAS Elit Senior</span><br />
                    <strong>Jaringan Kompetisi: </strong><span>Regional, Internasional</span><br />
                  </div>
                </div>
                <span class="font-weight-boldest h1">{{ $ringkasan->or_unggul }}</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="services-section-three bg-lighter rel z-1 pb-100 rpb-70" id="milestone">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-title rmt-70 mb-30">
            <h2>Capaian Indikator</h2>
          </div>
        </div>
      </div>

      <ul class="nav nav-tabs project-filter mb-30 mtn-tab" id="indikator-tab" role="tablist">
        <li class="nav-item current p-0" role="presentation">
          <button class="nav-link active" id="indikator-1-tab" data-toggle="tab" data-target="#indikator-1" type="button" role="tab" aria-controls="indikator-1" aria-selected="false">Bidang Riset & Inovasi</button>
        </li>
        <li class="nav-item p-0" role="presentation">
          <button class="nav-link " id="indikator-2-tab" data-toggle="tab" data-target="#indikator-2" type="button" role="tab" aria-controls="indikator-2" aria-selected="false">Bidang Seni Budaya</button>
        </li>
        <li class="nav-item p-0" role="presentation">
          <button class="nav-link " id="indikator-3-tab" data-toggle="tab" data-target="#indikator-3" type="button" role="tab" aria-controls="indikator-3" aria-selected="false">Bidang Olahraga</button>
        </li>
      </ul>
      <div class="row justify-content-center text-center mb-30" >
        <div class="col-xl-4 col-lg-6 col-md-8">
          <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle font-weight-bold" type="button" data-toggle="dropdown" aria-expanded="false">
              {{ $activeYearGroup['label'] }} ({{ min($activeYearGroup['data']) }} - {{ max($activeYearGroup['data']) }})
            </button>
            <div class="dropdown-menu">
              @foreach(\App\Constants\Common::getTahun() as $t)
                @if($loop->index != $yearIndex)
                  <a class="dropdown-item" href="{{ '/dashboard-capaian?year_group='.$loop->index.'#milestone' }}">{{ $t['label'] }} ({{ min($t['data']) }} - {{ max($t['data']) }})</a>
                @endif
              @endforeach
            </div>
          </div>

        </div>
      </div>
      <div class="tab-content" id="indikator-tab-1">
        <div class="tab-pane fade show active" id="indikator-1" role="tabpanel" aria-labelledby="indikator-1-tab">
          <div class="table-responsive">
            <table class="table table-bordered table-striped fs-6 gy-5 gx-5" id="table-riset">
              <thead>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">Sasaran</th>
                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">Indikator</th>
                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">Baseline 2021</th>
                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">Target 2045</th>
                <th class="min-w-125px text-center bg-riset text-white" colspan="{{ count($activeYearGroup['data'])*2 }}">Capaian</th>
                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">Status Capaian</th>
                <th class="min-w-125px bg-riset text-white" rowspan="3"></th>
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder" colspan="2">{{ $tahun }}</th>
                @endforeach
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Capaian</th>
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Target</th>
                @endforeach
              </tr>
              </thead>
              <tbody class="fw-semibold text-gray-600">
              @foreach(\App\Constants\Common::sasaranRiset() as $s)
                @foreach(\App\Constants\Common::indikatorRisetSasaran($s['id']) as $ind)
                  <tr>
                    @if($loop->index === 0)
                      <td rowspan={{$s['jumlahIndikator']}} class="bg-white">{{ $s['text'] }}</td>
                    @endif
                    <td>{{ $ind['text'] }}</td>
                    <td>
                      {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                      @if($ind['min_satuan'])
                        @if($ind['min_satuan_style'] === 'sup')
                          <sup>{{ $ind['min_satuan'] }}</sup>
                        @else
                          <span class="ml-2">{{ $ind['min_satuan'] }}</span>
                        @endif
                      @endif
                      @if($ind['min_subs'])
                        <br />
                        <span>{{ $ind['min_subs'] }}</span>
                      @endif
                    </td>
                    <td>
                      {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                      @if($ind['max_satuan'])
                        @if($ind['max_satuan_style'] === 'sup')
                          <sup>{{ $ind['max_satuan'] }}</sup>
                        @else
                          <span class="ml-2">{{ $ind['max_satuan'] }}</span>
                        @endif
                      @endif
                      @if($ind['max_subs'])
                        <br />
                        <span>{{ $ind['max_subs'] }}</span>
                      @endif
                    </td>
                    @foreach($activeYearGroup['data'] as $tahun)
                      <td class="text-center">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</td>
                      <td class="text-center">
                        <span class="text-target" id="text-target-{{ $targetRiset[$ind['field']][$tahun][0]['id'] }}">{{ $targetRiset[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                      </td>
                    @endforeach
                    <td>N/A</td>
                    <td>
                      <a href="javascript:void(0)" class="font-weight-bold open-chart" data-id="{{ $ind['id'] }}">Lihat Grafik</a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="indikator-2" role="tabpanel" aria-labelledby="indikator-2-tab">
          <div class="table-responsive">
            <table class="table table-bordered table-striped fs-6 gy-5 gx-5" id="table-seni">
              <thead>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">Sasaran</th>
                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">Indikator</th>
                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">Baseline 2021</th>
                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">Target 2045</th>
                <th class="min-w-125px text-center bg-seni text-white" colspan="{{ count($activeYearGroup['data'])*2 }}">Capaian</th>
                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">Status Capaian</th>
                <th class="min-w-125px bg-seni text-white" rowspan="3"></th>
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder" colspan="2">{{ $tahun }}</th>
                @endforeach
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Capaian</th>
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Target</th>
                @endforeach
              </tr>
              </thead>
              <tbody class="fw-semibold text-gray-600">
              @foreach(\App\Constants\Common::sasaranSeni() as $s)
                @foreach(\App\Constants\Common::indikatorSeniSasaran($s['id']) as $ind)
                  <tr>
                    @if($loop->index === 0)
                      <td rowspan={{$s['jumlahIndikator']}} class="bg-white">{{ $s['text'] }}</td>
                    @endif
                    <td>{{ $ind['text'] }}</td>
                    <td>
                      {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                      @if($ind['min_satuan'])
                        @if($ind['min_satuan_style'] === 'sup')
                          <sup>{{ $ind['min_satuan'] }}</sup>
                        @else
                          <span class="ml-2">{{ $ind['min_satuan'] }}</span>
                        @endif
                      @endif
                      @if($ind['min_subs'])
                        <br />
                        <span>{{ $ind['min_subs'] }}</span>
                      @endif
                    </td>
                    <td>
                      {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                      @if($ind['max_satuan'])
                        @if($ind['max_satuan_style'] === 'sup')
                          <sup>{{ $ind['max_satuan'] }}</sup>
                        @else
                          <span class="ml-2">{{ $ind['max_satuan'] }}</span>
                        @endif
                      @endif
                      @if($ind['max_subs'])
                        <br />
                        <span>{{ $ind['max_subs'] }}</span>
                      @endif
                    </td>
                    @foreach($activeYearGroup['data'] as $tahun)
                      <td class="text-center">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</td>
                      <td class="text-center">
                        <span class="text-target" id="text-target-{{ $targetSeni[$ind['field']][$tahun][0]['id'] }}">{{ $targetSeni[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                      </td>
                    @endforeach
                    <td>N/A</td>
                    <td>
                      <a href="javascript:void(0)" class="font-weight-bold" data-id="2-{{ $ind['id'] }}">Lihat Grafik</a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="indikator-3" role="tabpanel" aria-labelledby="indikator-3-tab">
          <div class="table-responsive">
            <table class="table table-bordered table-striped fs-6 gy-5 gx-5" id="table-or">
              <thead>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">Sasaran</th>
                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">Indikator</th>
                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">Baseline 2021</th>
                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">Target 2045</th>
                <th class="min-w-125px text-center bg-or text-white" colspan="{{ count($activeYearGroup['data'])*2 }}">Capaian</th>
                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">Status Capaian</th>
                <th class="min-w-125px bg-or text-white" rowspan="3"></th>
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder" colspan="2">{{ $tahun }}</th>
                @endforeach
              </tr>
              <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                @foreach($activeYearGroup['data'] as $tahun)
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Capaian</th>
                  <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Target</th>
                @endforeach
              </tr>
              </thead>
              <tbody class="fw-semibold text-gray-600">
              @foreach(\App\Constants\Common::sasaranOR() as $s)
                @foreach(\App\Constants\Common::indikatorORSasaran($s['id']) as $ind)
                  <tr>
                    @if($loop->index === 0)
                      <td rowspan={{$s['jumlahIndikator']}} class="bg-white">{{ $s['text'] }}</td>
                    @endif
                    <td>{{ $ind['text'] }}</td>
                    <td>
                      @if(is_array($ind['min']))
                        @foreach($ind['min'] as $min)
                          @if($loop->index !== 0)
                            <br />
                          @endif
                          {{ is_int($min) ? number_format($min, 0, ',', '.') : $min }}
                          @if($ind['min_satuan_style'][$loop->index] === 'sup')
                            <sup>{{ $ind['min_satuan'][$loop->index] }}</sup>
                          @else
                            <span>{{ $ind['min_satuan'][$loop->index] }}</span>
                          @endif
                        @endforeach
                      @else
                        {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                        @if($ind['min_satuan'])
                          @if($ind['min_satuan_style'] === 'sup')
                            <sup>{{ $ind['min_satuan'] }}</sup>
                          @else
                            <span>{{ $ind['min_satuan'] }}</span>
                          @endif
                        @endif
                      @endif
                      @if($ind['min_subs'])
                        <br />
                        <span>{{ $ind['min_subs'] }}</span>
                      @endif
                    </td>
                    <td>
                      @if(is_array($ind['max']))
                        @foreach($ind['max'] as $max)
                          @if($loop->index !== 0)
                            <br />
                          @endif
                          {{ is_int($max) ? number_format($max, 0, ',', '.') : $max }}
                          @if($ind['max_satuan_style'][$loop->index] === 'sup')
                            <sup>{{ $ind['max_satuan'][$loop->index] }}</sup>
                          @else
                            <span class="ml-2">{{ $ind['max_satuan'][$loop->index] }}</span>
                          @endif
                        @endforeach
                      @else
                        {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                        @if($ind['max_satuan'])
                          @if($ind['max_satuan_style'] === 'sup')
                            <sup>{{ $ind['max_satuan'] }}</sup>
                          @else
                            <span class="">{{ $ind['max_satuan'] }}</span>
                          @endif
                        @endif
                      @endif
                      @if($ind['max_subs'])
                        <br />
                        <span>{{ $ind['max_subs'] }}</span>
                      @endif
                    </td>
                    @foreach($activeYearGroup['data'] as $tahun)
                      <td class="text-center">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</td>
                      <td class="text-center">
                        <span class="text-target" id="text-target-{{ $targetOr[$ind['field']][$tahun][0]['id'] }}">{{ $targetOr[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                      </td>
                    @endforeach
                    <td>N/A</td>
                    <td>
                      <a href="javascript:void(0)" class="font-weight-bold" data-id="2-{{ $ind['id'] }}">Lihat Grafik</a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="modal-chart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Grafik Tren</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <div id="chart" style="min-width: 600px; max-width: 700px; height: 400px"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal text-left" id="modal-list" tabindex="-1" role="dialog" aria-labelledby="modal-list" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title" id="list-label"><i class="ft-eye mr-2"></i><span class="text-white">Daftar Talenta</span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-talenta"></table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script src="{{ asset('assets/landing/js/jquery.blockUI.js') }}"></script>
  <script src="{{ asset('assets/landing/js/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/landing/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    const data = {{ Js::from($data) }};
    const indikator = {{ Js::from(\App\Constants\Common::indikatorRiset()) }};
    const tahunList = {{ Js::from($activeYearGroup['data']) }};
    const $modal = $('#modal-chart');
    var chart = null
    var indikatorDetail = null
    $(document).ready(function(){
      $('.dropdown-toggle').dropdown()
      $modal.on('shown.bs.modal', function (event) {
       loadChart()
      })
      $modal.on('hide.bs.modal', function (event) {
        if(chart){
          chart.destroy();
        }
      })
      $('.open-chart').on('click',function(){
        const id = parseInt($(this).data('id'));
        indikatorDetail = indikator.find(i => parseInt(i.id) === id);
        $modal.modal('show')
      });
      var table = $('#table-talenta').DataTable({
        "columns": [
          {
            data: 'id',
            title: 'No',
          },
          {
            data: 'foto_talenta',
            title: 'Foto',
            render: function (data, type, row) {
              return data !== null ? `<img src="/storage/talenta/${data}" style="width: 75px;height:75px; object-fit: cover;"/>` : '-'
            }
          },
          {
            data: 'nama_talenta',
            title: 'Nama Talenta',
          },
          {
            data: 'lembaga_id',
            title: 'Lembaga',
            render: function (data, type, row) {
              return `${row.lembaga_induk.name} - ${row.lembaga_unit.name} - ${row.lembaga.name}`
            }
          },
          {
            data: 'bidang.name',
            title: 'Bidang',
          },

        ],
      });
      $('.get-talenta').on('click', function(){
        const id = $(this).data('id')
        $('#modal-list').on('shown.bs.modal',function (){
          table.clear();
          table.draw();
          $('#modal-list').block({message:'loading data...'});
        }).modal('show');
        $.ajax({
          url:'/common/get-talenta',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'POST',
          dataType:'json',
          data:{catId: id},
          success: function(res){
            $('#modal-list').find('.modal-title span').text(`Daftar Talenta ${res.level.bidang.name} - ${res.level.name}`);
            table.clear();
            table.rows.add(res.data);
            table.on( 'order.dt search.dt', function () {
              table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
              } );
            } ).draw();
            $('#modal-list').unblock();
          },
          error:function (xhr,res) {
            $('#modal-list').unblock();
          }
        })
      })
    })
    function loadChart(){
      const baseLine = [...tahunList].map(t => {
        return indikatorDetail.min;
      })
      const target = [...tahunList].map(t => {
        return indikatorDetail.max;
      })
      const capaian = [...tahunList].map(t => {
        return data[t] !== undefined ? (data[t][0][indikatorDetail.field] ? Number(data[t][0][indikatorDetail.field]) : 0) : 0;
      })
      const targetPerTahun = Object.keys(indikatorDetail.target).map(t => {
        return indikatorDetail.target[t];
      });
      console.log(capaian);
      chart = Highcharts.chart('chart', {
        title: {
          text: indikatorDetail.text
        },
        xAxis: {
          categories: tahunList,
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: ''
          }
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0
          }
        },
        series: [{
          type: 'column',
          name: 'Capaian',
          color:'#43C6E5',
          data: capaian

        },{
          type: 'spline',
          name: 'Baseline',
          data: baseLine,
          lineColor: '#1A59C4',
          marker: {
            lineWidth: 2,
            lineColor: '#1A59C4',
            color: '#1A59C4',
            fillColor: '#1A59C4'
          }
        },{
          type: 'spline',
          name: 'Target 2045',
          data: target,
          lineColor: '#F73E3E',
          marker: {
            lineWidth: 2,
            lineColor: '#F73E3E',
            color: '#F73E3E',
            fillColor: '#F73E3E'
          }
        },{
          type: 'line',
          name: 'Target per Tahun',
          data: targetPerTahun,
          lineColor: '#50cd89',
          marker: {
            lineWidth: 2,
            lineColor: '#50cd89',
            color: '#50cd89',
            fillColor: '#50cd89'
          }
        }]
      });
    }
  </script>
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing/css/datatables/dataTables.bootstrap4.min.css') }}">
    <style>
        .solutions-tab-nav .nav-item .nav-link{
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        .solutions-tab-nav .nav-item .nav-link .content{
          width: 200px;
        }
        .solutions-tab-nav .nav-item .nav-link p,
        .solutions-tab-nav .nav-item .nav-link .content-p
        {
          width: 60%;
          color: var(--base-color)
        }
        .solutions-tab-nav .nav-item .nav-link .content-p{
          display: flex;
          gap: 1.5rem;
        }
        .solutions-tab-nav .nav-item .nav-link .content-p div{
          width: 50%;
        }
        .bg-riset{
          background: #256FB2;
        }
        #table-riset.table-striped tbody tr:nth-of-type(odd){
          background: #DDEAF6;
        }
        #table-riset.table-striped tbody tr:nth-of-type(even){
          background: #fff;
        }
        .bg-seni{
          background: #F3572C;
        }
        #table-seni.table-striped tbody tr:nth-of-type(odd){
          background: #FBE3D5;
        }
        #table-seni.table-striped tbody tr:nth-of-type(even){
          background: #fff;
        }
        .bg-or{
          background: #1CA6B5;
        }
        #table-or.table-striped tbody tr:nth-of-type(odd){
          background: #E1EFDA;
        }
        #table-or.table-striped tbody tr:nth-of-type(even){
          background: #fff;
        }
    </style>
@endsection
