@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <!--====== Hero Section Start ======-->
    <section class="dashboard-section rel z-2 pt-120 pb-75">
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

    <!--====== Hero Section End ======-->
    <section class="dashboard-section-rotator rel z-2 ">
        <section class="banner-rotator mx-auto"
            style="background-image: url('assets/landing/images/background/spacers_200px.svg');">
            <div class="relative flex  mx-auto px-4 py-12">
                <div class="max-w-3xl w-full h-auto mt-12">
                    <p class="text-white text-sm-center items-center justify-center text-center text-[25px]"
                        id="rotating-text">
                    </p>
                </div>
            </div>
        </section>
    </section>

    <section class="container bg-white dark:bg-gray-800 px-5 sm:px-8 md:px-16 lg:px-40 pt-5 dark:border-gray-700 mt-50">
        <h3 class="text-gray-900 sm:text-5xl md:text-6xl lg:text-3xl font-bold text-left mx-auto max-w-6xl mt-7 mb-5">
            Anugrah Talenta Nasional
        </h3>

        <div class="row">
            @foreach ($dataSorotan as $item)
                <div class="col-lg-3 col-md-12 ">

                    <a href="{{ $item['link'] }}">
                        <div class="sorotan-card wow fadeInUp delay-0-3s"
                            style="visibility: visible; animation-name: fadeInUp; background-image: url('/assets/landing/{{ $item['cover'] }}')">
                            <div class="icon-sorotan">
                                <img src="{{ $item['imageUrl'] }}" class="img" alt="image">
                            </div>
                            <h6 class="text-white mt-100">{{ $item['name'] }}</h6>
                            <p class="text-white">{{ $item['role'] }}</p>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </section>


    <section class="container bg-white dark:bg-gray-800 px-5 sm:px-8 md:px-16 lg:px-40 pt-5 dark:border-gray-700 mt-50">
        <h3 class="text-gray-900 sm:text-5xl md:text-6xl lg:text-3xl font-bold text-left mx-auto max-w-6xl mt-7 mb-5">
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


    <section class="container bg-white mt-50 mb-50">
        <h3 class=" font-bold text-left mx-auto max-w-6xl mt-7 mb-5">
            Videografis Manajemen Talenta Nasional
        </h3>

        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <!-- Main Video -->
                    <iframe class="w-full h-60 mb-6" id="mainVideo" height="448" src="{{ $mainVideoSrc }}" scrolling="no"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-3 bg-white ">
                <h3 class="text-2xl font-semibold mb-4">More Videos</h3>
                <ul class="space-y-4">
                    @foreach ($videos as $index => $videoUrl)
                        <li onclick="setMainVideoSrc('{{ $videoUrl }}')" class="cursor-pointer relative"
                            role="button">
                            <iframe class="w-full secondaryIframe mb-20" src="{{ $videoUrl }}"
                                title="YouTube video {{ $index + 1 }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen loading="lazy"></iframe>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </section>


    <section class="banner-rotator mx-auto"
        style="background-image: url('assets/landing/images/background/spacers_200px.svg');">
        <div class="relative flex  mx-auto px-4 py-12">
            <div class="max-w-3xl w-full h-auto mt-12">
                <p class="text-white items-center justify-center text-center text-[25px]">Gugus Tugas Manajemen Talenta
                    Nasional</p>
            </div>
        </div>
    </section>


    <!--====== Partners Section Start ======-->
    <section class="partners-section rel z-1 pt-30 rpt-150 pb-90 rpb-60">
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
    </style>
@endsection

@section('js')
    <script>
        function setMainVideoSrc(src) {
            document.getElementById('mainVideo').src = src;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Example data array
            const talentData = [{
                    iconClass: 'fas fa-dumbbell',
                    icon: '/assets/media/icons/bidang/ic_olahraga.jpeg',
                    title: 'Bidang Olahraga',
                    description: 'Meningkatnya jumlah dan kualitas olahragawan berprestasi serta tenaga keolahragaan bersertifikat internasional, dengan peningkatan rekognisi dan raihan prestasi di cabang olahraga Olimpiade dan Paralimpade.',
                    count: '17,004 Talenta'
                },
                {
                    iconClass: 'fas fa-flask',
                    icon: '/assets/media/icons/bidang/ic_risnov.jpeg',
                    title: 'Bidang Riset dan Inovasi',
                    description: 'Meningkatkan jumlah dan kualitas SDM Iptek nasional, berkontribusi pada inovasi, serta meningkatkan rekognisi internasional talenta riset dan inovasi melalui ajang dan portofolio.',
                    count: '35,919 Talenta'
                },
                {
                    iconClass: 'fas fa-palette',
                    icon: '/assets/media/icons/bidang/ic_senbud.jpeg',
                    title: 'Bidang Seni Budaya',
                    description: 'Meningkatnya jumlah dan kualitas Talenta Seni Budaya yang kreatif, berkontribusi pada kebudayaan nasional, serta peningkatan rekognisi internasional dan penyelenggaraan ajang seni budaya berkelas internasional di Indonesia.',
                    count: '9,322 Talenta'
                }
            ];

            const container = document.getElementById('talent-cards-container');

            talentData.forEach(talent => {
                const card = document.createElement('div');
                card.className = 'col-md-4';
                const iconClass = talent.title === 'Bidang Olahraga' ? 'text-danger' : talent.title ===
                    'Bidang Seni Budaya' ? 'text-success' : 'text-primary';

                card.innerHTML = `
                <div class="talent-card ">

                    <div class="icon-tahapan text-danger">
                        <img src="${talent.icon}"
                            class="img" alt="">
                    </div>
                    <h5>${talent.title}</h5>
                    <p>${talent.description}</p>
                    <h6>${talent.count}</h6>
                </div>
            `;

                container.appendChild(card);
            });


        });
        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Mempersiapkan Talenta yang berdaya saing dan terekognisi di tingkat internasional pada bidang Riset dan Inovasi, Seni Budaya, serta Olahraga.",
                "Menjamin penyelenggaraan upaya pembibitan, pengembangan, dan penguatan Talenta nasional secara holistik, terintegrasi, dan berkelanjutan."
            ];

            let index = 0;
            const textElement = document.getElementById('rotating-text');

            function rotateText() {
                textElement.textContent = texts[index];
                index = (index + 1) % texts.length;
            }

            setInterval(rotateText, 3000); // Rotate every 3 seconds

            // Initialize the first text
            rotateText();
        });
    </script>
@endsection
