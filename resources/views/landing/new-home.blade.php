@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <!--====== Hero Section Start ======-->
    <section class="dashboard-section rel z-2 pt-120 mb-20">
        <!-- Banner Section -->
        <section class="banner" style="background-image: url('assets/landing/images/background/banner_website.jpeg');">
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

    {{-- <div class="container mb-20">
        <div class="wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card">
                <div class="card-header wow fadeInUp delay-0-4s " style="visibility: visible; animation-name: fadeInUp;">
                    <h3>Sebaran Talenta Berprestasi</h3>
                </div>

                <div class=" wow fadeInUp delay-0-6s" style="visibility: visible; animation-name: fadeInUp;">
                    <div id='map' style="height: 400px; width: 100wv;"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <section class="container bg-white mt-5 mb-5">
        <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
            Anugrah Talenta Nasional
        </h3>

        <div class="row">
            @foreach ($dataSorotan as $item)
                <div class="col-lg-3 col-md-12">
                    <a href="{{ $item['link'] }}">
                        <div class="sorotan-card wow fadeInUp delay-0-3s"
                            style="visibility: visible; animation-name: fadeInUp; background-image: url('/assets/landing/{{ $item['cover'] }}');">
                            <div class="icon-sorotan">
                                <img src="{{ $item['imageUrl'] }}" class="img" alt="image">
                            </div>
                            <div class="bg-white rounded-lg p-1 mt-50 text-center " style="height: 100px;">
                                <h6 class="text-gray">{{ $item['name'] }}</h6>
                                <p class="text-gray">{{ $item['role'] }}</p>

                            </div>

                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </section>


    <section class="container bg-white mt-5 mb-5">
        <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
            Beasiswa dan Hibah
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
                                Bidang: {{ $item['bidang'] }}
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
                <h3 class="h5 font-weight-bold mb-4">More Videos</h3>
                <ul class="list-unstyled">
                    @foreach ($videos as $index => $videoUrl)
                        <li onclick="setMainVideoSrc('{{ $videoUrl }}')" class="cursor-pointer mb-3" role="button">
                            <div class="embed-responsive embed-responsive-16by9 rounded-lg">
                                <iframe class="embed-responsive-item secondaryIframe" src="{{ $videoUrl }}"
                                    title="YouTube video {{ $index + 1 }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                    loading="lazy"></iframe>
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
                <div class="col-xl-12 col-lg-10 d-flex flex-column align-items-center">
                    <div class="section-title mb-45 text-center d-flex flex-column align-items-center">
                        <p class="w-75">Untuk mengoordinasikan penyelenggaraan DBMTN 2023-2045 yang dilaksanakan oleh
                            kementerian/lembaga, pemerintah daerah provinsi, pemerintah daerah kabupaten/kota, dan pemangku
                            kepentingan dan mengoordinasikan penyelesaian permasalahan dan hambatan (debottlenecking) dalam
                            penyelenggaraan DBMTN 2023-2045 telah dibentuk Gugus Tugas MTN yang diketuai oleh Menteri
                            PPN/Kepala Bappenas dan beranggotakan Menteri/Kepala Lembaga terkait</p>
                    </div>
                    <div class="row justify-content-lg-center">
                        <!-- Partner Logos -->
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
                                <img src="{{ asset('assets/media/logos/Kemenpora_Logo.png') }}" alt="Partner"
                                    style="width: 65%">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Partners Section End ======-->
@endsection

@section('css')
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
@endsection
