@extends('layouts/landing')
@section('title', 'Dashboard')
@section('body')

    <section class="page-banner bg-blue rel z-1" style="">
        <div class="container">
            <div class="banner-inner">
                <h2 class="text-bold text-white wow fadeInUp delay-0-2s">Dashboard</h2>
                <p class="text-white"> Dashboard Manajemen Talenta Nasional adalah platform untuk memantau dan mengelola
                    talenta di Indonesia. Menampilkan jumlah talenta per tahapan pengembangan, grafik indikator rencana aksi
                    KL, dan peta sebaran talenta. Fitur ini memudahkan pengguna melihat kemajuan talenta dan mengevaluasi
                    pencapaian sasaran indikator secara efektif.</p>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>

    <section class="services-section-three bg-lighter pt-50 rel z-1 bg-white">
        <div class="container">
            {{-- <div class="row justify-content-start text-left">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h5>Ringkasan Jumlah Talenta</h5>
                        <p>
                            Berikut adalah ringkasan jumlah talenta yang telah terdaftar di platform kami.
                        </p>
                    </div>
                </div>
            </div> --}}
            <ul class="nav nav-tabs project-filter justify-content-center mb-55 mtn-tab" id="talenta-tab" role="tablist">
                <li class="nav-item current p-10" role="presentation"
                    onclick="showTahapanSasaranMtn(event, 'talenta-tab-1')">
                    <button class="nav-link" id="talenta-1-tab" data-toggle="tab" data-target="#talenta-1" type="button"
                        role="tab" aria-controls="talenta-1" aria-selected="false">Bidang Riset &
                        Inovasi</button>
                </li>
                <li class="nav-item p-10" role="presentation" onclick="showTahapanSasaranMtn(event, 'talenta-tab-2')">
                    <button class="nav-link" id="talenta-2-tab" data-toggle="tab" data-target="#talenta-2" type="button"
                        role="tab" aria-controls="talenta-2" aria-selected="false">Bidang Seni Budaya</button>
                </li>
                <li class="nav-item p-10" role="presentation" onclick="showTahapanSasaranMtn(event, 'talenta-tab-3')">
                    <button class="nav-link " id="talenta-3-tab" data-toggle="tab" data-target="#talenta-3" type="button"
                        role="tab" aria-controls="talenta-3" aria-selected="false">Bidang Olahraga</button>
                </li>
            </ul>

            {{-- Tab Riset Inovasi --}}
            <div class="tab-content" id="talenta-tab-1">
                {{-- Tahapan Riset Inovasi --}}
                <div class="tab-pane fade show active" id="talenta-1" role="tabpanel" aria-labelledby="talenta-1-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50 wow fadeInUp delay-0-2s"
                        style="visibility: visible; animation-name: fadeInUp;">
                        {{-- <div class="py-5"> --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center wow fadeInUp delay-0-2s"
                                        style="visibility: visible; animation-name: fadeInUp; background-color: #3d81c3;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/prabibit_risetdaninovasi.svg"
                                                class="img" alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Prabibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center wow fadeInUp delay-0-3s"
                                        style="visibility: visible; animation-name: fadeInUp; background-color: #3d81c3;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/bibit_risetdaninovasi.svg" class="img"
                                                alt="Prabibit">
                                        </div>
                                        <h5 class="text-white mt-5 ">Bibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center wow fadeInUp delay-0-4s"
                                        style="visibility: visible; animation-name: fadeInUp; background-color: #3d81c3;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/potensi_risetdaninovasi.svg"
                                                class="img" alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Potensi</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="tahapan-card text-center wow fadeInUp delay-0-5s"
                                        style="visibility: visible; animation-name: fadeInUp;
                                        background-color: #3d81c3;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/unggul_risetdaninovasi.svg"
                                                class="img" alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Unggul</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}
                    </ul>
                </div>
                {{-- Tahapan Riset Inovasi end --}}

                <div class="container mb-20">
                    <div class="wow fadeInUp delay-0-6s mb-55 justify-content-center text-center"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <h3>Sasaran Indikator Riset dan Inovasi</h3>
                    </div>
                    <div class="accordion" id="accordionSasaran">
                        <div class="card">
                            <div class="card-header bg-riset" id="headingOne">
                                <div class="fadeInUp delay-0-4s" style="visibility: visible; animation-name: fadeInUp;">
                                    <h2 class="mb-0">
                                        <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                            data-target="#sasaranOne" aria-expanded="true" aria-controls="sasaranOne">
                                            Meningkatnya jumlah dan kualitas SDM Iptek nasional yang berkontribusi bagi
                                            kemajuan
                                            Iptek dan penciptaan inovasi nasional.
                                        </p>
                                    </h2>
                                </div>
                            </div>
                            <div id="sasaranOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionSasaran">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s "
                                                style="visibility: visible; animation-name: fadeInUp;">

                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-1"></div>
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s "
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-2"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s "
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-3"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-4"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-riset" id="headingTwo">
                                <div class="wow fadeInUp delay-0-4s "
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    <h2 class="mb-0">
                                        <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                            data-target="#sasaranTwo" aria-expanded="false" aria-controls="sasaranTwo">
                                            Meningkatnya rekognisi internasional Talenta di bidang Riset dan Inovasi
                                            berbasis ajang
                                            dan portofolio.
                                        </p>
                                    </h2>
                                </div>
                            </div>
                            <div id="sasaranTwo" class="collapse show" aria-labelledby="headingTwo"
                                data-parent="#accordionSasaran">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s"
                                                style="visibility: visible; animation-name: fadeInUp;">

                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-5"></div>
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-6"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wow fadeInUp delay-0-4s"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <figure class="card highcharts-figure">
                                                    <div id="risnov-indikator-7"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab Riset Inovasi End --}}

            {{-- Tab Seni Budaya --}}
            <div class="tab-content" id="talenta-tab-2">
                <div class="tab-pane fade" id="talenta-2" role="tabpanel" aria-labelledby="talenta-2-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #0EAA4B;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/prabibit_senibudaya.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Prabibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #0EAA4B;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/bibit_senibudaya.svg" class="img"
                                                alt="Prabibit">
                                        </div>
                                        <h5 class="text-white mt-5 ">Bibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #0EAA4B;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/potensi_senibudaya.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Potensi</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #0EAA4B;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/unggul_senibudaya.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Unggul</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </ul>
                    <div class="container mt-20 mb-20">
                        <div class="wow fadeInUp delay-0-6s mb-30 justify-content-center text-center"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <h3>Sasaran Indikator Seni Budaya</h3>
                        </div>
                        <div class="accordion" id="accordionSasaran">
                            <div class="card">
                                <div class="card-header bg-seni" id="headingOne">
                                    <div class="fadeInUp delay-0-4s"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h2 class="mb-0">
                                            <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                                data-target="#sasaranOne" aria-expanded="true"
                                                aria-controls="sasaranOne">
                                                Meningkatnya jumlah dan kualitas talenta seni budaya yang kreatif, kritis,
                                                konsisten berkarya, dan berkontribusi bagi pemajuan kebudayaan nasional.
                                            </p>
                                        </h2>
                                    </div>
                                </div>
                                <div id="sasaranOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionSasaran">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">

                                                    <figure class="card highcharts-figure">
                                                        <div id="senbud-indikator-1"></div>
                                                    </figure>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="senbud-indikator-2"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-seni" id="headingTwo">
                                    <div class="fadeInUp delay-0-4s"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h2 class="mb-0">
                                            <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                                data-target="#sasaranTwo" aria-expanded="false"
                                                aria-controls="sasaranTwo">
                                                Meningkatnya rekognisi internasional terhadap talenta seni budaya, serta
                                                penyelenggaraan ajang dan non ajang seni budaya berkelas internasional di
                                                Indonesia.
                                            </p>
                                        </h2>
                                    </div>
                                </div>
                                <div id="sasaranTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionSasaran">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">

                                                    <figure class="card highcharts-figure">
                                                        <div id="senbud-indikator-3"></div>
                                                    </figure>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="senbud-indikator-4"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">

                                                    <figure class="card highcharts-figure">
                                                        <div id="senbud-indikator-5"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab Seni Budaya End --}}

            {{-- Tab Olahraga --}}
            <div class="tab-content" id="talenta-tab-3">
                <div class="tab-pane fade" id="talenta-3" role="tabpanel" aria-labelledby="talenta-3-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #ff4133;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/prabibit_olahraga.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Prabibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #ff4133;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/bibit_olahraga.svg" class="img"
                                                alt="Prabibit">
                                        </div>
                                        <h5 class="text-white mt-5 ">Bibit</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #ff4133;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/potensi_olahraga.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Potensi</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="tahapan-card text-center" style="background-color: #ff4133;">
                                        <div class="icon-tahapan text-danger">
                                            <img src="/assets/media/icons/tahapan/unggul_olahraga.svg" class="img"
                                                alt="">
                                        </div>
                                        <h5 class="text-white mt-5">Unggul</h5>
                                        <h3 class="text-white">17,004 Talenta</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <div class="container mt-20 mb-20">
                        <div class="wow fadeInUp delay-0-6s mb-30 justify-content-center text-center"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <h3>Sasaran Indikator Olahraga</h3>
                        </div>
                        <div class="accordion" id="accordionSasaran">
                            <div class="card">
                                <div class="card-header bg-or" id="headingOne">
                                    <div class="fadeInUp delay-0-4s"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h2 class="mb-0">
                                            <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                                data-target="#sasaranOne" aria-expanded="true"
                                                aria-controls="sasaranOne">
                                                Meningkatnya jumlah dan kualitas Olahragawan berprestasi di tingkat dunia
                                                dan
                                                Tenaga Keolahragaan bersertifikat internasional pada cabang olahraga
                                                Olimpiade
                                                dan Paralimpiade
                                            </p>
                                        </h2>
                                    </div>
                                </div>
                                <div id="sasaranOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionSasaran">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-1"></div>
                                                    </figure>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-2"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-3"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-4"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-or" id="headingTwo">
                                    <div class="fadeInUp delay-0-4s"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h2 class="mb-0">
                                            <p class="btn text-left text-white" type="button" data-toggle="collapse"
                                                data-target="#sasaranTwo" aria-expanded="false"
                                                aria-controls="sasaranTwo">
                                                Meningkatnya rekognisi internasional dan raihan prestasi talenta Olahragawan
                                                Indonesia pada kejuaraan cabang olahraga Olimpiade dan Paralimpiade.
                                            </p>
                                        </h2>
                                    </div>
                                </div>
                                <div id="sasaranTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionSasaran">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">

                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-5"></div>
                                                    </figure>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="wow fadeInUp delay-0-4s mb-50 justify-content-center"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <figure class="card highcharts-figure">
                                                        <div id="or-indikator-6"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab Olahraga end --}}

            {{-- Peta Sebaran --}}
            <div class="container mb-20">
                <div class="wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card">
                        <div class="card-header wow fadeInUp delay-0-4s "
                            style="visibility: visible; animation-name: fadeInUp;">
                            <h3>Sebaran Talenta Berprestasi</h3>
                        </div>

                        <div class=" wow fadeInUp delay-0-6s" style="visibility: visible; animation-name: fadeInUp;">
                            <div id='map' style="height: 400px; width: 100wv;"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Peta sebaran end --}}
        </div>
    </section>

@endsection
@section('js')
    <script src="{{ asset('assets/landing/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/landing/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/leaflet-1.9.4.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        function showTahapanSasaranMtn(evt, tabName) {
            // Dapatkan semua elemen dengan class="tab-content" dan sembunyikan
            const tabContent = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = 'none';
            }

            // Hapus class "active" dari semua elemen tablinks
            const tabLinks = document.getElementsByClassName('tablinks');
            for (let i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(' active', '');
            }

            // Tampilkan tab yang dipilih dan tambahkan class "active" ke tombol yang dipilih
            document.getElementById(tabName).style.display = 'block';
            evt.currentTarget.className += ' active';
        };

        //   chart risnov start
        Highcharts.chart('risnov-indikator-1', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Rasio SDM iptek per 1 juta penduduk'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024', '2045'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        1151, 1151, 1151, 1151,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        1151, 1151, 1151, 1595.83
                    ]
                },
                // {
                //     name: 'Target Tahunan',
                //     data: [
                //         2000, 2000, 2000, 2000
                //     ]
                // },
                {
                    name: 'Target 2045',
                    data: [
                        4000, 4000, 4000, 4000
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });
        // indikor 2
        Highcharts.chart('risnov-indikator-2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'SDM Iptek Berkulifikasi S3'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        19.6, 19.6, 19.6, 19.6,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        19.6, 19.6, 19.6, 22.6
                    ]
                },
                {
                    name: 'Target 2045',
                    data: [
                        30, 30, 30, 30
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },

        });

        Highcharts.chart('risnov-indikator-3', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah Publikasi Internasional yang disitasi'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        8409, 8409, 8409, 8409,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        8409, 8409, 8409, 13298
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        30000, 30000, 30000, 30000
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('risnov-indikator-4', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah paten yang dilisensikan'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        41, 41, 41, 41,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        41, 41, 41, 52
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        400, 400, 400, 400
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('risnov-indikator-5', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Raihan Olimpiade Sains dan Teknologi dunia tingkat pelajar dan mahasiswa'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        100, 100, 100, 100,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        2000, 2000, 2000, 2000
                    ]
                },
                {
                    name: 'Target 2045',
                    data: [
                        1200, 1200, 1200, 1200
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('risnov-indikator-6', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah SDM Iptek masuk ke dalam pemeringkatan World’s Top 2% Scientists'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        95, 95, 95, 95,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        95, 95, 95, 95
                    ]
                },
                {
                    name: 'Target 2045',
                    data: [
                        200, 200, 200, 200
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('risnov-indikator-7', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Raihan penghargaan riset dan inovasi internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        0, 0, 0, 0,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        0, 0, 0, 0
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        100, 100, 100, 100
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        // chart risnov end

        // chart seni budaya start
        Highcharts.chart('senbud-indikator-1', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Persentase lulusan SMK/MAK dan Perguruan Tinggi (PT) bidang studi seni budaya yang bekerja di bidang seni budaya'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        2.33, 2.33, 2.33, 2.33,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        2.33, 2.33, 2.33, 2.33
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        13.19, 13.19, 13.19, 13.19
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('senbud-indikator-2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Persentase lembaga, sanggar, komunitas seni budaya yang terfasilitasi untuk melakukan proses edukasi dan regenerasi talenta seni budaya secara berkelanjutan'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        28, 28, 28, 28,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        28, 28, 28, 28
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        72, 72, 72, 72
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('senbud-indikator-3', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah karya seni budaya yang memperoleh rekognisi di tingkat internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        9, 9, 9, 9,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        9, 9, 9, 9
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        369, 369, 369, 369
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('senbud-indikator-4', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah talenta seni budaya yang terlibat dalam kegiatan bereputasi baik di tingkat internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        80, 80, 80, 80,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        80, 80, 80, 80
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        4002, 4002, 4002, 4002
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });
        Highcharts.chart('senbud-indikator-5', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah festival dan pameran seni budaya di dalam negeri yang memiliki jangkauan dan reputasi internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        21, 21, 21, 21,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        21, 21, 21, 21
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        117, 117, 117, 117
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });
        // chart seni budaya end

        // chart olahraga start

        Highcharts.chart('or-indikator-1', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah pelatih cabor Olimpiade dan Paralimpiade bersertifikasi internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        0, 0, 0, 0,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        0, 0, 0, 0
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        250, 250, 250, 250
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });
        Highcharts.chart('or-indikator-2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah tenaga keolahragaan lainnya bersertifikasi internasional'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        18, 18, 18, 18,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        18, 18, 18, 18
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        1743, 1743, 1743, 1743
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('or-indikator-3', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah atlet elit nasional level dunia pada cabor Olimpiade dan Paralimpiade unggulan'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        98, 98, 98, 98,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        98, 98, 98, 98
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        650, 650, 650, 650
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('or-indikator-4', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah atlet usia muda level dunia pada cabor Olimpiade dan Paralimpiade unggulan'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        172, 172, 172, 172,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        172, 172, 172, 172
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        3700, 3700, 3700, 3700
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('or-indikator-5', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Peringkat Olympic Games'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        55, 55, 55, 55,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        55, 55, 55, 55
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        5, 5, 5, 5
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('or-indikator-6', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Peringkat Paralympic Games'
            },

            xAxis: {
                categories: [
                    '2021', '2022', '2023', '2024'
                ]
            },
            yAxis: {
                title: {
                    text: 'Capaian'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Baseline 2021',
                    data: [
                        55, 55, 55, 55,
                    ]
                }, {
                    name: 'Capaian',
                    data: [
                        55, 55, 55, 55
                    ]
                },
                {
                    name: 'Target',
                    data: [
                        5, 5, 5, 5
                    ]
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: false
            },
        });


        // chart olahraga end
    </script>

    <script>
        const map = L.map('map').setView([-4.574485818324603, 114.23146202697515], 4);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const baseballIcon = L.icon({
            iconUrl: 'baseball-marker.png',
            iconSize: [32, 37],
            iconAnchor: [16, 37],
            popupAnchor: [0, -28]
        });

        function onEachFeature(feature, layer) {
            let popupContent = `<p>I started out as a GeoJSON ${feature.geometry.type}, but now I'm a Leaflet vector!</p>`;

            if (feature.properties && feature.properties.popupContent) {
                popupContent += feature.properties.popupContent;
            }

            layer.bindPopup(popupContent);
        }

        /* global campus, bicycleRental, freeBus, coorsField */
        // const bicycleRentalLayer = L.geoJSON([bicycleRental, campus], {

        //     style(feature) {
        //         return feature.properties && feature.properties.style;
        //     },

        //     onEachFeature,

        //     pointToLayer(feature, latlng) {
        //         return L.circleMarker(latlng, {
        //             radius: 8,
        //             fillColor: '#ff7800',
        //             color: '#000',
        //             weight: 1,
        //             opacity: 1,
        //             fillOpacity: 0.8
        //         });
        //     }
        // }).addTo(map);

        // const freeBusLayer = L.geoJSON(freeBus, {

        //     filter(feature, layer) {
        //         if (feature.properties) {
        //             // If the property "underConstruction" exists and is true, return false (don't render features under construction)
        //             return feature.properties.underConstruction !== undefined ? !feature.properties
        //                 .underConstruction : true;
        //         }
        //         return false;
        //     },

        //     onEachFeature
        // }).addTo(map);

        // const coorsLayer = L.geoJSON(coorsField, {

        //     pointToLayer(feature, latlng) {
        //         return L.marker(latlng, {
        //             icon: baseballIcon
        //         });
        //     },

        //     onEachFeature
        // }).addTo(map);
    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/landing/css/datatables/dataTables.bootstrap4.min.css') }}">
    <style>
        .solutions-tab-nav .nav-item .nav-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .solutions-tab-nav .nav-item .nav-link .content {
            width: 200px;
        }

        .solutions-tab-nav .nav-item .nav-link p,
        .solutions-tab-nav .nav-item .nav-link .content-p {
            width: 60%;
            color: var(--base-color)
        }

        .solutions-tab-nav .nav-item .nav-link .content-p {
            display: flex;
            gap: 1.5rem;
        }

        .solutions-tab-nav .nav-item .nav-link .content-p div {
            width: 50%;
        }

        .bg-riset {
            background: #256FB2;
        }

        #table-riset.table-striped tbody tr:nth-of-type(odd) {
            background: #DDEAF6;
        }

        #table-riset.table-striped tbody tr:nth-of-type(even) {
            background: #fff;
        }

        .bg-seni {
            background: #F3572C;
        }

        #table-seni.table-striped tbody tr:nth-of-type(odd) {
            background: #FBE3D5;
        }

        #table-seni.table-striped tbody tr:nth-of-type(even) {
            background: #fff;
        }

        .bg-or {
            background: #1CA6B5;
        }

        #table-or.table-striped tbody tr:nth-of-type(odd) {
            background: #E1EFDA;
        }

        #table-or.table-striped tbody tr:nth-of-type(even) {
            background: #fff;
        }
    </style>
@endsection
