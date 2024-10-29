@extends('layouts/landing')
@section('title', 'Tentang')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">Manajemen Talenta Nasional (MTN)</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        {{-- <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight"> --}}
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <section class="about-page-section rel z-1 pt-50 pb-50 rpt-100 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="about-page-content rmb-65 wow fadeInLeft delay-0-2s"
                        style="visibility: visible; animation-name: fadeInLeft;">
                        <p>MTN adalah rangkaian upaya terstruktur dan berkelanjutan dalam menghasilkan Talenta, melalui
                            pendekatan makro yang berfokus pada ekosistem pendukung di tingkat negara serta pendekatan mikro
                            yang berfokus pada sinergi dan keberlanjutan proses pembibitan, pengembangan potensi, dan
                            penguatan ketalentaan.
                            <br />
                            Pemerintah Republik Indonesia telah menyusun Desain Besar Manajemen Talenta Nasional (DBMTN)
                            2023-2045 yang merupakan dokumen perencanaan jangka panjang yang berisikan arah kebijakan,
                            strategi, dan fokus Manajemen Talenta Nasional menuju Indonesia emas 2045, Peta Jalan MTN
                            2023-2045, Rencana Aksi MTN, dan Kerangka Kolaborasi Multipihak Penyelenggaraan MTN.
                            <br />
                            DBMTN 2023-2045 berfungsi sebagai pedoman bagi kementerian/lembaga, pemerintah daerah provinsi,
                            pemerintah daerah kabupaten/kota, dan pemangku kepentingan dalam penyelenggaraan MTN.
                            <br />
                            Pelaksanaan Desain Besar MTN 2022-2045 dibagi ke dalam lima tahapan Rencana Aksi (Gambar 1).
                            Pertama, Tahap Transformasi di tahun 2022-2024 untuk mempersiapkan prasyarat terbentuknya
                            ekosistem MTN, mulai dari kerangka regulasi, kelembagaan, basis data terpadu, pemetaan kebutuhan
                            dan ketersediaan talenta, hingga penyediaan atau penguatan infrastruktur pendukung
                        </p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="about-page-images justify-content-lg-end wow fadeInRight delay-0-2s"
                        style="visibility: visible; animation-name: fadeInRight;">
                        <img src="{{ asset('assets/landing/images/background/DBMTN-Grafik.jpg') }}" alt="About">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="solutions-section rel z-1 pb-50 rpb-70">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <h2>Sasaran</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="solution-item wow fadeInUp delay-0-2s"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="solution-content">
                            <i class="flaticon-data-analysis"></i>
                            <h3><a>Bidang Riset & Inovasi</a></h3>
                            <p>Meningkatkan jumlah dan kualitas SDM Iptek nasional yang berkontribusi bagi kemajuan iptek
                                dan penciptaan inovasi nasional; dan Meningkatnya rekognisi internasional talenta di bidang
                                riset dan inovasi berbasis ajang dan portofolio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="solution-item wow fadeInUp delay-0-4s"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="solution-content">
                            <i class="fa fa-palette"></i>
                            <h3><a>Bidang Seni & Budaya</a></h3>
                            <p>Meningkatnya jumlah dan kualitas Talenta Seni Budaya yang kreatif, kritis, konsisten berkarya
                                dan berkontribusi bagi pemajuan kebudayaan nasional; dan Meningkatnya rekognisi
                                internasional terhadap Talenta Seni Budaya, serta penyelenggaraan ajang dan nonajang seni
                                budaya berkelas internasional di Indonesia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="solution-item wow fadeInUp delay-0-6s"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="solution-content">
                            <i class="fa fa-dumbbell"></i>
                            <h3><a>Bidang Olahraga</a></h3>
                            <p>Meningkatnya jumlah dan kualitas Olahragawan berprestasi di tingkat dunia dan Tenaga
                                keolahragaan bersertifikat internasional pada cabang olahraga Olimpiade dan Paralimpiade;
                                dan Meningkatnya rekognisi internasional dan rahan prestasi talenta olahragawan Indonesia
                                pada kejuaraan cabang olahraga Olimpiade dan Paralimpiade</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="dots-shape" src="{{ asset('assets/landing/images/shapes/dots.png') }}" alt="Shape">
        <img class="tringle-shape" src="{{ asset('assets/landing/images/shapes/tringle.png') }}" alt="Shape">
        <img class="close-shape" src="{{ asset('assets/landing/images/shapes/close.png') }}" alt="Shape">
        <img class="circle-shape" src="{{ asset('assets/landing/images/shapes/circle.png') }}" alt="Shape">
    </section>
    <section class="services-section-three bg-white rel z-1 pb-50 rpb-70">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-title rmt-70 mb-55">
                        <h2>Langkah Percepatan</h2>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs project-filter mb-55 mtn-tab" id="talenta-tab" role="tablist">
                <li class="nav-item current p-0" role="presentation">
                    <button class="nav-link active" id="talenta-1-tab" data-toggle="tab" data-target="#talenta-1"
                        type="button" role="tab" aria-controls="talenta-1" aria-selected="false">Bidang Riset &
                        Inovasi</button>
                </li>
                <li class="nav-item p-0" role="presentation">
                    <button class="nav-link " id="talenta-2-tab" data-toggle="tab" data-target="#talenta-2" type="button"
                        role="tab" aria-controls="talenta-2" aria-selected="false">Bidang Seni Budaya</button>
                </li>
                <li class="nav-item p-0" role="presentation">
                    <button class="nav-link " id="talenta-3-tab" data-toggle="tab" data-target="#talenta-3" type="button"
                        role="tab" aria-controls="talenta-3" aria-selected="false">Bidang
                        Olahraga</button>
                </li>
            </ul>
            <div class="tab-content" id="talenta-tab-1">
                <div class="tab-pane fade show active" id="talenta-1" role="tabpanel" aria-labelledby="talenta-1-tab">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>SIMT (Sistem Informasi Manajemen Talenta) Riset dan Inovasi</strong>
                                </div>
                                <div class="card-body">
                                    <p>Mengolaborasikan beragam sumber data seperti PDDIKTI, SINTA, EMIS-PTKI, SIJAFRI,
                                        MATAGARUDA-LPDP, serta basis data lainnya untuk memetakan dan menelusuri talenta
                                        riset dan inovasi terutama berdasarkan portofolio kinerja penelitian dan rumpun
                                        keilmuannya. Hasil analisis SIMT Riset dan Inovasi akan menjadi penentu intervensi
                                        pemberian hibah penelitian, dukungan penguatan jaringan kerja sama, mobilitas
                                        talenta, dan intervensi lainnya. Peran SIMT RIset dan Inovasi sangat penting untuk
                                        analisis longitudinal dan kontinuitas intervensi MTN mengingat target bidang riset
                                        dan inovasi memerlukan rentang waktu yang panjang.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>Program Mobilitas Periset</strong>
                                </div>
                                <div class="card-body">
                                    <p>Memfasilitasi pergerakan talenta riset dan inovasi lintas institusi dan lintas
                                        wilayah/negara dalam rangka transfer pengetahuan dan teknologi serta kerja sama
                                        riset. Pelaksanaan Mobilitas Periset yang dilandasi dengan kolaborasi lintas
                                        institusi ini diantaranya dilakukan melalui program lanjutan pascadoktoral (post
                                        doctoral), periset tamu (visiting professor), dan asisten periset (research
                                        assistantship) magang industry.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>Program Percepatan Kualifikasi S3 SDM Iptek</strong>
                                </div>
                                <div class="card-body">
                                    <p>Fasilitasi jalur cepat peningkatan kualifikasi menuju doktoral (S3) bagi talenta
                                        potensial, diantaranya melalui Program Magister menuju Doktor untuk Sarjana Unggul
                                        (PMDSU) dan Program Pascasarjana Berbasis Riset (PhD by Research). Pelaksanaan
                                        program ini diikuti mekanisme re-entry yang fleksibel untuk memastikan proses
                                        akuisisi talenta.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>Pusat Kolaborasi Riset</strong>
                                </div>
                                <div class="card-body">
                                    <p>Untuk meningkatkan kualitas riset yang lebih terfokus pada keunggulan strategis
                                        dengan pendekatan kolaboratif lintas SDM Iptek, baik dari perguruan tinggi,
                                        organisasi riset, dan industri, dalam dan luar negeri. Beberapa Pusat Kolaborasi
                                        Riset juga difasilitasi untuk menjadi frontier kelompok riset dalam negeri dengan
                                        mengakuisisi diaspora.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>Skema hibah riset unggulan</strong>
                                </div>
                                <div class="card-body">
                                    <p>Skema hibah riset unggulan yang berorientasi pada hasil jangka menengah dan panjang
                                        dengan fleksibilitas administrasi pelaporan pelaksanaan anggaran
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-riset text-white">
                                    <strong>Perluasan dan penguatan apresiasi talenta riset dan inovasi.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="talenta-2" role="tabpanel" aria-labelledby="talenta-2-tab">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card mb-3">
                                <div class="card-header bg-seni text-white">
                                    <strong>SIMT Seni Budaya</strong>
                                </div>
                                <div class="card-body">
                                    <p>SIMT Seni Budaya yang juga terintegrasi (merujuk) pada Sistem Pendataan Kebudayaan
                                        Terpadu (SPKT) dan Data Pokok Kebudayaan (Dapobud) Ditjen Kebudayaan,
                                        Kemendikbudristek, akan mengambil informasi tentang tenaga kebudayaan, lembaga
                                        kebudayaan, serta sarana dan prasarana dari Dapobud. Secara rinci, untuk keperluan
                                        MTN, data talenta seni budaya yang harus tersedia adalah data identitas, data
                                        diklat/pendidikan, rekam jejak/penghargaan, serta proyeksi/visi artistik.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-seni text-white">
                                    <strong>MTN Lab</strong>
                                </div>
                                <div class="card-body">
                                    <p>Sebagai wahana berorientasi edukasional dan regenerasional yang mempertemukan dan
                                        menghubungkan bibit talenta, talenta potensial, talenta unggul, dan talenta maestro
                                        untuk mengembangkan praktik serta wacana seni budaya. Format laboratorium artistik
                                        seperti pelatihan, klinik penciptaan, dan penelitian akan didorong untuk
                                        memfasilitasi perjumpaan talenta secara lintas usia, lintas daerah, dan lintas
                                        bidang sehingga memungkinkan kolaborasi masa depan sekaligus memperluas talent pool
                                        talenta seni budaya
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-seni text-white">
                                    <strong>Konsorsium Nasional Festival Berbasis Komunitas</strong>
                                </div>
                                <div class="card-body">
                                    <p>Sebagai ruang konsolidasi berkala antarpegiat festival (termasuk biennale, triennale,
                                        dll) berbasis komunitas untuk saling mengenali, mengembangkan metode kurasi, berbagi
                                        sumber daya material maupun immaterial, dan memetakan strategi bersama untuk
                                        menciptakan ekosistem festival yang berkelanjutan. Format konsorsium ini akan
                                        menjadi ajang untuk merumuskan rekomendasi kebijakan yang diadvokasi secara nasional
                                        serta memetakan potensi internasionalisasi festival yang akan menjadikan Indonesia
                                        sebagai pusat pergaulan global.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-seni text-white">
                                    <strong>MTN International Hub</strong>
                                </div>
                                <div class="card-body">
                                    <p>Sebagai gelaran promosi (showcase) karya-karya talenta nasional yang diarahkan untuk
                                        menumbuhkan kebanggaan nasional sekaligus secara strategis menarik perhatian serta
                                        memfasilitasi kehadiran agen, kurator, manajer, promotor, produser internasional
                                        untuk mendorong visibilitas talenta di sirkuit global. Format dan strategi
                                        penciptaan hub ini disesuaikan dengan karakter masing-masing bidang prioritas dalam
                                        MTN Seni Budaya.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-seni text-white">
                                    <strong>Anugerah Seni Budaya dari Indonesia untuk Dunia </strong>
                                </div>
                                <div class="card-body">
                                    <p>Sebagai ajang apresiasi untuk maestro internasional, yang karyanya dianggap relevan
                                        dengan politik seni budaya global. Konsep penghargaan ini berbeda dengan Anugerah
                                        Kebudayaan kategori perorangan asing, yang diberikan pada individu yang dinilai
                                        berkontribusi pada pengembangan budaya Indonesia. Melalui ajang anugerah ini
                                        pemerintah Indonesia diharapkan dapat menjadi otoritas rekognisi yang turut
                                        membentuk penciptaan kanon seni budaya dunia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="talenta-3" role="tabpanel" aria-labelledby="talenta-3-tab">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>SIMT Olahraga</strong>
                                </div>
                                <div class="card-body">
                                    <p>SIMT Olahraga menjadi pusat data terpadu keolahragaan secara nasional yang berisi
                                        mengenai sistem informasi dan sistem data memuat informasi bibit talenta hingga
                                        talenta unggul. Data terpadu atlet memuat 3 komponen utama yaitu biodata atlet,
                                        riwayat dan rekam jejak dan hasil tes dan pengukuran atlet yang akan terekam dalam 1
                                        platform/aplikasi.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>Program Siswa Olahragawan (Student Athlete Program)</strong>
                                </div>
                                <div class="card-body">
                                    <p>Ditujukan untuk pembinaan olahraga pendidikan (formal dan nonformal) yang bersinergi
                                        dengan pembinaan olahraga prestasi melalui: Kurikulum pendidikan khusus olahragawan;
                                        Pencarian bibit dan talenta potensial di dalam dan luar negeri; serta
                                        Penyelenggaraan sentra Latihan Olahragawan Muda yang berjenjang dan berkelanjutan di
                                        Daerah.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>Pusat Olahragawan Elit (Elite Athlete Centre)
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p>Ditujukan untuk menciptakan lingkungan latihan berkualitas dari segala aspek yang
                                        mendukung atlet dapat mencapai kualitas performa tingkat tinggi melalui: sentra
                                        Latihan Olahragawan Elit Nasional berstandar Internasional (Elite Athlete/ Para
                                        Athlete Training Centre); sentra latihan olahragawan muda elit nasional berstandar
                                        internasional (Youth Elite Athlete/Para Athlete Training Centre); Rekrutmen Pelatih
                                        Cabor unggulan Olimpiade dan Paralimpiade level dunia.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>Skema Insentif Olahraga (SIO)
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p>Terutama untuk mendorong partisipasi berbagai pihak dalam olahraga sekaligus
                                        memastikan kesejahteraan atlet, melalui: Kebijakan Pengembangan Kemitraan dan
                                        Penghargaan Olahraga; Kebijakan pendanaan olahraga oleh multi-pihak dan skema
                                        insentifnya; Skema insetif bagi pelatih, guru, dan tenaga keolahragaan yang
                                        berdedikasi; Bantuan pemerintah dalam rangka membentuk ekosistem keolahragaan yang
                                        mendukung peningkatan prestasi; serta, Dukungan Pasca Karier bagi atlet yang telah
                                        purna bakti.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>Kompetisi Kelas Dunia (World Class Competition)
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p>Ditujukan untuk mendorong perbaikan jaringan kompetisi talenta yang berjenjang dan
                                        berkelanjutan, serta berbasis kompetisi elit (high level competition) nasional untuk
                                        menghasilkan talenta unggul. Lebih lanjut, juga untuk mendorong peningkatan
                                        penyelenggaraan dan/atau keikutsertaan pada ajang kelas dunia, khususnya kualifikasi
                                        olimpiade dan paralimpiade dalam rangka optimalisasi kapitalisasi talenta unggul.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-or text-white">
                                    <strong>Tenaga Olahraga Kelas Dunia (World Class Sports Teams)
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p>Terutama untuk mendorong peningkatan kualitas dan kuantitas pelatih dan tenaga
                                        olahraga berstandar internasional melalui: Kebijakan tenaga dan organisasi
                                        keolahragaan terutama terkait standar mutu; Fasilitasi pengembangan dan pembinaan
                                        Induk Organisasi Cabor (IOCO) unggulan; Rekruitment pelatih kelas dunia; serta,
                                        Mendorong pelatih dan tenaga keolahragaan nasional untuk memperoleh sertifikasi
                                        internasional.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .about-page-images img:last-child {
            border-radius: 0;
            width: unset;
        }

        .about-page-images img:first-child {
            margin-right: 0;
            max-width: 80%;
        }
    </style>
@endsection
