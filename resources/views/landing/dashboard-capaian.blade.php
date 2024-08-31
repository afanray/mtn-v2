@extends('layouts/landing')
@section('title', 'Dashboard')
@section('body')
    {{-- <section class="page-banner bg-blue rel z-1" style="">
        <div class="container">
            <div class="banner-inner">
                <h1 class="page-title wow fadeInUp delay-0-2s">Dashboard</h1>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight">
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section> --}}
    <section class="services-section-three bg-lighter rel z-1 pt-150 pb-100 rpb-70">
        <div class="container">
            {{-- <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-title rmt-70 mb-55">
                        <h2>Ringkasan Jumlah Talenta</h2>
                    </div>
                </div>
            </div> --}}
            <ul class="nav nav-tabs project-filter justify-content-end mb-55 mtn-tab" id="talenta-tab" role="tablist">
                <li class="nav-item current p-10" role="presentation">
                    <button class="nav-link active" id="talenta-1-tab" data-toggle="tab" data-target="#talenta-1"
                        type="button" role="tab" aria-controls="talenta-1" aria-selected="false">Bidang Riset &
                        Inovasi</button>
                </li>
                <li class="nav-item p-10" role="presentation">
                    <button class="nav-link" id="talenta-2-tab" data-toggle="tab" data-target="#talenta-2" type="button"
                        role="tab" aria-controls="talenta-2" aria-selected="false">Bidang Seni Budaya</button>
                </li>
                <li class="nav-item p-10" role="presentation">
                    <button class="nav-link " id="talenta-3-tab" data-toggle="tab" data-target="#talenta-3" type="button"
                        role="tab" aria-controls="talenta-3" aria-selected="false">Bidang Olahraga</button>
                </li>
            </ul>
            <div class="tab-content" id="talenta-tab-1">
                <div class="tab-pane fade show active" id="talenta-1" role="tabpanel" aria-labelledby="talenta-1-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50 wow fadeInUp delay-0-2s"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <li class="nav-item">
                            <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab"
                                href="#watching" data-id="1">
                                <i class="flaticon-group mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Pra Bibit Talenta</h3>
                                </div>

                                <span class="font-weight-boldest h1">{{ $ringkasan->riset_pra_bibit }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#sharing"
                                data-id="2">
                                <i class="fa fa-book-open mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Bibit Talenta</h3>
                                </div>

                                <span class="font-weight-boldest h1">{{ $ringkasan->riset_bibit }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab" href="#editing"
                                data-id="3">
                                <i class="flaticon-monitoring mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Talenta Potensial</h3>
                                </div>

                                <span class="font-weight-boldest h1">{{ $ringkasan->riset_potensial }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-riset border-riset get-talenta" data-toggle="tab"
                                href="#comments" data-id="4">
                                <i class="fa fa-building mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Talenta Unggul</h3>
                                </div>

                                <span class="font-weight-boldest h1">{{ $ringkasan->riset_unggul }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="talenta-2" role="tabpanel" aria-labelledby="talenta-2-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
                        <li class="nav-item">
                            <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#watching"
                                data-id="5">
                                <i class="flaticon-group mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Pra Bibit</h3>
                                </div>
                                <p class="mr-5">
                                    <strong>Usia: </strong><span>
                                        < 18 tahun</span><br />
                                            <strong>Jenjang Pendidikan: </strong><span>PAUD s.d SMA</span><br />
                                            <strong>Praktik Arstistik: </strong><span>
                                                < 3 tahun</span><br />
                                                    <strong>Rekognisi: </strong><span>N/A</span><br />
                                </p>
                                <span class="font-weight-boldest h1">{{ $ringkasan->seni_pra_bibit }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab" href="#sharing"
                                data-id="6">
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
                            <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab"
                                href="#editing" data-id="7">
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
                            <a class="nav-link active text-seni border-seni get-talenta" data-toggle="tab"
                                href="#comments" data-id="8">
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
                            <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#watching"
                                data-id="9">
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
                                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga dan Klub IOCO (Sentra Latihan
                                            Daerah)</span><br />
                                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional</span><br />
                                    </div>
                                </div>
                                <span class="font-weight-boldest h1">{{ $ringkasan->or_bibit }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#sharing"
                                data-id="10">
                                <i class="flaticon-monitoring mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Potensial</h3>
                                </div>
                                <div class="content-p mr-5">
                                    <div>
                                        <strong>Usia: </strong><span>12-15 tahun</span><br />
                                        <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Latihan</span><br />
                                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, PPLPD (Sentra
                                            Latihan Daerah) SLOMPN (Sentra Latihan Nasional)</span><br />
                                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah);
                                            Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                                    </div>
                                    <div>
                                        <strong>Usia: </strong><span>15- 18 tahun</span><br />
                                        <strong>Tahapan Pembinaan: </strong><span>Belajar untuk Berkompetisi; serta,
                                            Berlatih untuk Berkompetisi</span><br />
                                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, SKO (Sentra
                                            Latihan SLOMPN (Sentra Latihan Nasional) Nasional)</span><br />
                                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah);
                                            Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                                    </div>
                                </div>
                                <span class="font-weight-boldest h1">{{ $ringkasan->or_potensial }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-or border-or get-talenta" data-toggle="tab" href="#editing"
                                data-id="11">
                                <i class="fa fa-building mr-5"></i>
                                <div class="content mr-5">
                                    <h3>Unggul</h3>
                                </div>
                                <div class="content-p mr-5">
                                    <div>
                                        <strong>Usia: </strong><span>18- 23 tahun</span><br />
                                        <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Berkompetisi; serta,
                                            Belajar untuk Juara</span><br />
                                        <strong>Wadah Pembinaan: </strong><span>PELATNAS Elit Junior</span><br />
                                        <strong>Jaringan Kompetisi: </strong><span>Nasional, Regional, Internasional
                                        </span><br />
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


        {{-- kode baru --}}

    </section>

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
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown()
            $modal.on('shown.bs.modal', function(event) {
                loadChart()
            })
            $modal.on('hide.bs.modal', function(event) {
                if (chart) {
                    chart.destroy();
                }
            })
            $('.open-chart').on('click', function() {
                const id = parseInt($(this).data('id'));
                indikatorDetail = indikator.find(i => parseInt(i.id) === id);
                $modal.modal('show')
            });
            var table = $('#table-talenta').DataTable({
                "columns": [{
                        data: 'id',
                        title: 'No',
                    },
                    {
                        data: 'foto_talenta',
                        title: 'Foto',
                        render: function(data, type, row) {
                            return data !== null ?
                                `<img src="/storage/talenta/${data}" style="width: 75px;height:75px; object-fit: cover;"/>` :
                                '-'
                        }
                    },
                    {
                        data: 'nama_talenta',
                        title: 'Nama Talenta',
                    },
                    {
                        data: 'lembaga_id',
                        title: 'Lembaga',
                        render: function(data, type, row) {
                            return `${row.lembaga_induk.name} - ${row.lembaga_unit.name} - ${row.lembaga.name}`
                        }
                    },
                    {
                        data: 'bidang.name',
                        title: 'Bidang',
                    },

                ],
            });
            $('.get-talenta').on('click', function() {
                const id = $(this).data('id')
                $('#modal-list').on('shown.bs.modal', function() {
                    table.clear();
                    table.draw();
                    $('#modal-list').block({
                        message: 'loading data...'
                    });
                }).modal('show');
                $.ajax({
                    url: '/common/get-talenta',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        catId: id
                    },
                    success: function(res) {
                        $('#modal-list').find('.modal-title span').text(
                            `Daftar Talenta ${res.level.bidang.name} - ${res.level.name}`);
                        table.clear();
                        table.rows.add(res.data);
                        table.on('order.dt search.dt', function() {
                            table.column(0, {
                                search: 'applied',
                                order: 'applied'
                            }).nodes().each(function(cell, i) {
                                cell.innerHTML = i + 1;
                            });
                        }).draw();
                        $('#modal-list').unblock();
                    },
                    error: function(xhr, res) {
                        $('#modal-list').unblock();
                    }
                })
            })
        })

        function loadChart() {
            const baseLine = [...tahunList].map(t => {
                return indikatorDetail.min;
            })
            const target = [...tahunList].map(t => {
                return indikatorDetail.max;
            })
            const capaian = [...tahunList].map(t => {
                return data[t] !== undefined ? (data[t][0][indikatorDetail.field] ? Number(data[t][0][
                    indikatorDetail.field
                ]) : 0) : 0;
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
                    color: '#43C6E5',
                    data: capaian

                }, {
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
                }, {
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
                }, {
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
