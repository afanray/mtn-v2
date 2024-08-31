@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <!--====== Hero Section Start ======-->
    <section class="dashboard-section rel z-2 pt-120 pb-75">
        <div class="container">
            <!-- Banner Section -->
            <section class="banner">
                <div class="container">
                    <h2>BASIS DATA TERPADU MANAJEMEN TALENTA NASIONAL</h2>
                </div>
            </section>

            <!-- Content Section -->
            <section class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="talent-card">
                                <div class="icon text-danger">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h5>Bidang Olahraga</h5>
                                <p>Meningkatnya jumlah dan kualitas olahragawan berprestasi serta tenaga keolahragaan
                                    bersertifikat internasional, dengan peningkatan rekognisi dan raihan prestasi di cabang
                                    olahraga Olimpiade dan Paralimpade.</p>
                                <h6>17,004 Talenta</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="talent-card">
                                <div class="icon text-primary">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <h5>Bidang Riset dan Inovasi</h5>
                                <p>Meningkatkan jumlah dan kualitas SDM Iptek nasional, berkontribusi pada inovasi, serta
                                    meningkatkan rekognisi internasional talenta riset dan inovasi melalui ajang dan
                                    portofolio.</p>
                                <h6>35,919 Talenta</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="talent-card">
                                <div class="icon text-success">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <h5>Bidang Seni Budaya</h5>
                                <p>Meningkatnya jumlah dan kualitas Talenta Seni Budaya yang kreatif, berkontribusi pada
                                    kebudayaan nasional, serta peningkatan rekognisi internasional dan penyelenggaraan ajang
                                    seni budaya berkelas internasional di Indonesia.</p>
                                <h6>9,322 Talenta</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--====== Hero Section End ======-->

    <!--====== Partners Section Start ======-->
    <section class="partners-section rel z-1 pt-250 rpt-150 pb-90 rpb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-10 d-flex flex-column align-items-center">
                    <div class="section-title mb-45 text-center d-flex flex-column align-items-center">
                        <h3 class="text-center">Gugus Tugas Manajemen Talenta Nasional</h3>
                        <p class="w-75">Untuk mengoordinasikan penyelenggaraan DBMTN 2023-2045 yang dilaksanakan oleh
                            kementerian/lembaga, pemerintah daerah provinsi, pemerintah daerah kabupaten/kota, dan pemangku
                            kepentingan dan mengoordinasikan penyelesaian permasalahan dan hambatan (debottlenecking) dalam
                            penyelenggaraan DBMTN 2023-2045 telah dibentuk Gugus Tugas MTN yang diketuai oleh Menteri
                            PPN/Kepala Bappenas dan beranggotakan Menteri/Kepala Lembaga terkait</p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/landing/js/jqueryValidation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jqueryValidation/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.add-testimoni').on('click', function() {
                $('#modalTestimoni').modal('show');
            })
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
                    $('#save-testi').prop('disabled', true).text('Mengirim Data...')
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
                            $('#konten_counter').text(0)
                            $('#test_province').val('').trigger('change');
                            $('#test_province').niceSelect('update')
                            $('#test_regency').empty();
                            $('#test_regency').append(
                                `<option value="">Pilih Kabupaten/Kota</option>`);
                            $('#test_regency').niceSelect('update')
                            $('#test-form')[0].reset();
                            validator.resetForm();
                            $('#save-testi').prop('disabled', false).text('Kirim')
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
            $('#save-testi').on('click', function() {
                if ($('input[name="recaptcha"]').val() !== '') {
                    $("#test-form").submit();
                } else {
                    grecaptcha.execute();
                }
            })
            $('#test_konten').on('keypress keyup keydown', function() {
                $('#konten_counter').text($(this).val().length)
            })
        });

        function getR(t) {
            $('input[name="recaptcha"]').val(t);
            $("#test-form").submit();
        }
    </script>
@endsection
