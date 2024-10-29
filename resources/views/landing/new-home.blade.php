@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <!--====== Hero Section Start ======-->
    <section class="dashboard-section rel z-2 pt-120 mb-20">
        <!-- Banner Section -->
        <section class="banner" style="background-image: url('assets/landing/images/background/banner_website2.jpg');">
            <div class="container text-white">
                <h2>BASIS DATA TERPADU MANAJEMEN TALENTA NASIONAL</h2>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="row" id="talent-cards-container">
                    <!-- Talent cards will be dynamically inserted here -->
                </div>
            </div>
        </section>
    </section>

    <!-- Content Section -->

    <section class="container bg-white  mb-5 p-10 rounded-lg">
        <section class="banner-rotator mx-auto text-center justify-content-center align-items-center "
            style="background-image: url('assets/landing/images/background/spacers_200px.svg'); background-size: cover; background-position: center;">
            <div class="d-flex justify-content-center align-items-center py-5">
                <p class="text-white" id="rotating-text">
                    <!-- Teks yang berotasi akan muncul di sini -->
                </p>
            </div>
        </section>
    </section>

    <section class="container bg-white mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
                    Highlight Talenta Nasional
                </h3>
            </div>
        </div>

        <div class="swiper-container" style="overflow: hidden;">
            <div class="swiper-wrapper">
                @foreach ($dataSorotan->take(8) as $item)
                    <div class="swiper-slide">
                        <a href="{{ $item['link_web'] }}">
                            <div class="card"
                                style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 450px; overflow: hidden; display: flex; flex-direction: column;">
                                <div class="ribbon"
                                    style="position: absolute; top: 10px; left: 10px; 
                            @if ($item['bidang_id'] == 1) background-color: #4575B8; 
                            @elseif ($item['bidang_id'] == 2) background-color: #ACAC2E; 
                            @elseif ($item['bidang_id'] == 3) background-color: #ED3672; 
                            @else background-color: #4575B8; @endif
                            color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px;">
                                    {{ $item['tahun'] }}
                                </div>
                                <img class="card-img-top"
                                    src="{{ $item['talenta']['foto_talenta'] ? asset('storage/talenta/' . $item['talenta']['foto_talenta']) : 'https://avatar.iran.liara.run/public/boy?username=Ash' }}"
                                    alt="Profile Image"
                                    style="border-radius: 10px 10px 0 0; height: 200px; object-fit: cover;">
                                <div class="card-body text-center" style="flex-grow: 1;">
                                    <h5 class="card-title text-uppercase">{{ $item['talenta']['nama_talenta'] }}</h5>
                                    <div class="info text-left">
                                        <span class="info-icon">
                                            <i class="fas fa-award"></i>
                                        </span>
                                        <span class="card-text">
                                            {{ \Illuminate\Support\Str::words($item['desc_penghargaan'], 10, '...') }}
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ $item['link_web'] }}" class="btn mt-3 text-white w-75"
                                    style="border-radius: 5px; padding: 10px 20px; position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: #4575B8;">
                                    Lihat Rekognisi
                                </a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- <!-- Navigasi Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}

            <!-- Pagination Slider -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="container bg-white mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
                    Berita & Kegiatan Terbaru
                </h3>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                @foreach ($dataBerita as $key => $item)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <!-- Carousel Inner -->
            <div class="carousel-inner shadow  ">
                @foreach ($dataBerita as $key => $item)
                    <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">

                        <div class="card wow fadeInUp delay-0-3s border-0 shadow p-20 rounded">
                            <div class="row no-gutters">
                                <div class="col-md-2 d-flex ml-20 align-items-center justify-content-center">
                                    <img src="storage/berita_kegiatan/{{ $item['image'] }}" alt="Profile Picture"
                                        class="rounded img-fluid">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">{{ $item['title'] }}</h5>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit(strip_tags($item['content']), 300) !!}
                                        </p>
                                        <a href="{{ route('berita-kegiatan.view', $item['slug']) }}"
                                            class="btn btn-primary" style="background-color: #4575B8;">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="container bg-white mt-5 mb-5">
        <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
            Stakeholder Parnertship
        </h3>

        <div class="row">
            @foreach ($dataBeasiswa as $item)
                <div class="col-lg-4 col-md-12 ">
                    <a href="{{ $item['url'] }}">
                        <div class="beasiswa-card text-center wow fadeInUp delay-0-3s"
                            style="visibility: visible; animation-name: fadeInUp; ">
                            <div class="icon-beasiswa">
                                <img src="{{ $item['image'] }}" class="img" alt="image">
                            </div>

                            <h5 class="text-lg md:text-2xl font-bold text-center mb-4 text-blue-600 dark:text-blue-300">
                                {{ $item['bidang'] }}
                            </h5>
                            <p class="text-sm ">
                                {{ $item['deskripsi'] }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="container bg-white mt-5 mb-10">
        <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
            Videografis Manajemen Talenta Nasional
        </h3>

        <div class="row">
            <!-- Main Video Section -->
            <div class="col-lg-9 mb-4 mb-lg-0">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9 rounded-lg">
                        <iframe class="embed-responsive-item" id="mainVideo" src="{{ $mainVideoSrc }}"
                            title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- More Videos Section -->
            <div class="col-lg-3">
                <h3 class="h5 font-weight-bold mb-4">Video lainnya</h3>
                <ul class="list-unstyled">
                    @foreach ($videos as $index => $videoUrl)
                        <li onclick="setMainVideoSrc('{{ $videoUrl }}')" class="cursor-pointer mb-3" role="button">
                            <div class="embed-responsive embed-responsive-16by9 rounded-lg">
                                <iframe class="embed-responsive-item secondaryIframe" src="{{ $videoUrl }}"
                                    title="YouTube video {{ $index + 1 }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="banner-rotator mx-auto justify-content-center align-items-center"
        style="background-image: url('assets/landing/images/background/spacers_200px.svg');">

        <div class="d-flex justify-content-center align-items-center p-5 ">
            <h3 class="text-white text-center text-bold " id="rotating-text">
                Gugus Tugas Manajemen Talenta
                Nasional
                <!-- Teks yang berotasi akan muncul di sini -->
            </h3>
        </div>

    </section>


    <!--====== Partners Section Start ======-->
    <section class="partners-section rel z-1 mt-10 mb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-10 d-flex flex-column align-items-center mt-30">
                    <div class="section-title text-center d-flex flex-column align-items-center">
                        <p class="w-75">Untuk mengoordinasikan penyelenggaraan DBMTN 2024-2045 yang dilaksanakan oleh
                            kementerian/lembaga, pemerintah daerah provinsi, pemerintah daerah kabupaten/kota, dan
                            pemangku
                            kepentingan dan mengoordinasikan penyelesaian permasalahan dan hambatan (debottlenecking)
                            dalam
                            penyelenggaraan DBMTN 2024-2045 telah dibentuk Gugus Tugas MTN yang diketuai oleh Menteri
                            PPN/Kepala Bappenas dan beranggotakan Menteri/Kepala Lembaga terkait</p>
                    </div>

                    <div class="col-lg-12">
                        <img src=" {{ asset('assets/landing/images/background/gugus-tugas-mtn.png') }}" class="img-fluid"
                            alt="anggota gugus tugas">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Partners Section End ======-->
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        #test-form .error {
            font-size: 12px;
            color: red;
            font-style: italic;
        }

        #test-form .form-group label {
            font-size: 1rem;
        }

        .feedback-author .author-content span {
            font-size: 14px;
            margin-bottom: 8px;
            line-height: 100%;
        }

        .nice-select {
            height: 56px;
            padding: 8px 16px;
        }

        #rotating-text {
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out {
            opacity: 0;
        }

        .fade-in {
            opacity: 1;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/landing/js/leaflet-1.9.4.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/landing/js/jqueryValidation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jqueryValidation/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-testimoni').on('click', function() {
                $('#modalTestimoni').modal('show');
            });

            $('#test_province').on('change', function() {
                if ($(this).val() !== '') {
                    $.ajax({
                        url: '/common/get-regencies',
                        data: {
                            province_id: $(this).val()
                        },
                        dataType: 'json',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            $('#test_regency').empty();
                            $('#test_regency').append(
                                `<option value="">Pilih Kabupaten/Kota</option>`);
                            $.each(res.data, function(index, item) {
                                $('#test_regency').append(
                                    `<option value="${item.id}">${item.name}</option>`
                                );
                            });
                            $('#test_regency').niceSelect('update');
                        }
                    });
                }
            });

            var validator = $("#test-form").validate({
                rules: {
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
                    test_email: {
                        required: true,
                        email: true
                    },
                    lembaga_name: "required",
                    lembaga_address: "required",
                    recaptcha: "required",
                    test_province: "required",
                    test_regency: "required",
                    test_konten: {
                        required: true,
                        maxlength: 250
                    },
                    test_bidang: "required",
                },
                submitHandler: function(form) {
                    $('#save-testi').prop('disabled', true).text('Mengirim Data...');
                    const data = new FormData($('#test-form')[0]);
                    $.ajax({
                        url: $('#test-form').attr('action'),
                        data: data,
                        dataType: 'json',
                        type: 'post',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function() {
                            grecaptcha.reset();
                            $('#konten_counter').text(0);
                            $('#test_province').val('').trigger('change');
                            $('#test_province').niceSelect('update');
                            $('#test_regency').empty();
                            $('#test_regency').append(
                                `<option value="">Pilih Kabupaten/Kota</option>`);
                            $('#test_regency').niceSelect('update');
                            $('#test-form')[0].reset();
                            validator.resetForm();
                            $('#save-testi').prop('disabled', false).text('Kirim');
                            $('#modalTestimoni').modal('hide');
                            Swal.fire({
                                title: 'Sukses',
                                text: 'Terima kasih telah mengisi testimoni',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            });
                        }
                    });
                }
            });

            $('#save-testi').on('click', function() {
                if ($('input[name="recaptcha"]').val() !== '') {
                    $("#test-form").submit();
                } else {
                    grecaptcha.execute();
                }
            });

            $('#test_konten').on('keypress keyup keydown', function() {
                $('#konten_counter').text($(this).val().length);
            });
        });

        function getR(t) {
            $('input[name="recaptcha"]').val(t);
            $("#test-form").submit();
        }

        function setMainVideoSrc(src) {
            document.getElementById('mainVideo').src = src;
        }

        const baseUrl = `${window.location.protocol}//${window.location.host}/`;

        document.addEventListener('DOMContentLoaded', async function() {
            const container = document.getElementById('talent-cards-container');
            const apiEndpoint = `${baseUrl}api/bidang-count`; // Ganti dengan endpoint API Anda
            // Menampilkan indikator loading

            console.log(apiEndpoint);
            container.innerHTML = '<p>Loading data...</p>';
            try {
                const response = await fetch(apiEndpoint);

                // Memeriksa apakah respons berhasil
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const talentData = await response.json();

                // Memastikan container kosong sebelum menambahkan elemen baru
                container.innerHTML = '';

                talentData.forEach(talent => {
                    const card = document.createElement('div');
                    card.className = 'col-md-4';

                    card.innerHTML = `
                <div class="talent-card">
                    <div class="icon-tahapan ">
                        <img src="/assets/media/icons/bidang/${talent.image}" class="img" alt="${talent.bidang}">
                    </div>
                    <h5>${talent.bidang}</h5>
                    <p>${talent.deskripsi}</p>
                    <h6>${talent.total} Talenta</h6>
                </div>
            `;

                    container.appendChild(card);
                });
            } catch (error) {
                console.error('Error fetching talent data:', error);
                container.innerHTML = '<p>Terjadi kesalahan saat memuat data. Silakan coba lagi nanti.</p>';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Mempersiapkan Talenta yang berdaya saing dan terekognisi di tingkat internasional pada bidang Riset dan Inovasi, Seni Budaya, serta Olahraga.",
                "Menjamin penyelenggaraan upaya pembibitan, pengembangan, dan penguatan Talenta nasional secara holistik, terintegrasi, dan berkelanjutan.",
                "Mengoordinasikan dan menyelaraskan kebijakan dan program oleh kementerian/ lembaga, pemerintah daerah provinsi, pemerintah daerah kabupaten/kota, dan peran Pemangku Kepentingan dalam rangka pembibitan, pengembangan, dan penguatan Talenta."
            ];

            let index = 0;
            const textElement = document.getElementById('rotating-text');

            function rotateText() {
                textElement.classList.add('fade-out'); // Add fade-out class for smooth transition
                setTimeout(() => {
                    textElement.textContent = texts[index];
                    textElement.classList.remove('fade-out');
                    textElement.classList.add('fade-in'); // Add fade-in class for smooth transition
                    index = (index + 1) % texts.length;
                }, 500); // Time matches the CSS transition time for fade-out
            }

            setInterval(rotateText, 3000); // Rotate every 3 seconds

            // Initialize the first text
            rotateText();
        });
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
        const legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {

            const div = L.DomUtil.create('div', 'info legend');
            const grades = [0, 10, 20, 50, 100, 200, 500, 1000];
            const labels = [];
            let from, to;

            for (let i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1];

                labels.push(`<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);
    </script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1, // Default 1 slide untuk perangkat kecil
            spaceBetween: 20, // Jarak antar card
            loop: true, // Loop aktif
            autoplay: {
                delay: 3000, // Durasi tiap slide
                disableOnInteraction: false,
            },
            breakpoints: { // Menggunakan responsivitas dari Swiper
                576: {
                    slidesPerView: 2, // 2 card untuk layar kecil
                },
                768: {
                    slidesPerView: 3, // 3 card untuk layar medium
                },
                992: {
                    slidesPerView: 4, // 4 card untuk layar besar
                },
                1200: {
                    slidesPerView: 4, // Tetap 4 card di layar yang lebih besar
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
