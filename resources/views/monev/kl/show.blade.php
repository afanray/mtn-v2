@extends('layouts/dashboard')
@section('title', 'Detail Rencana Aksi')
@section('body')

    <div class="card mb-5 mb-xl-10 ">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_app_content_container" aria-expanded="true" aria-controls="kt_app_content_container">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0 text-uppercase">Detail Rencana Aksi</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body border-top p-5">
                <div class="row mb-6">
                    <!--begin::Col-->
                    <div class="col-lg-7 fv-col">
                        <div class="row-lg-4 mb-5 rounded-1">
                            <div class="col-12 fv-col">
                                <div class="row">
                                    <div class="col-lg-4 fv-row">
                                        <select class="form-select form-select-solid" id="select-year" name="year"
                                            <option value="">Pilih Tahun</option>
                                            @foreach (\App\Constants\Common::getTahun() as $t)
                                                <optgroup label="{{ $t['label'] }}">
                                                    @foreach ($t['data'] as $tahun)
                                                        <option value="{{ $tahun }}" @selected($tahun == old('tahun', date('Y')))>
                                                            {{ $tahun }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-8 text-end">
                                        <a href="{{ route('monev.kl.monitoring.add', ['id' => $model->id]) }}"
                                            class="btn btn-primary me-4 btn-sm py-5">
                                            <i class="fa fa-plus"></i> Tambah Monitoring
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-lg-4 mt-5 mb-5 p-5 bg-light-success rounded-1">
                            <div class="col-12 fv-row mt-2">
                                <p class="badge badge-success text-white p-2 text-uppercase text-lg">
                                    {{ $model->kode_ro }}
                                </p>
                                <h4 class="text-gray-600">
                                    {{ $model->rincian_output }}
                                </h4>
                            </div>
                        </div>
                        <div class="row-lg-4 mt-5 mb-5 p-5 bg-light-warning rounded-1">
                            <div class="col-12 fv-row mt-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4 class="text-gray-600 font-weight-normal">Target</h4>
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <h4 class="text-gray-600">
                                                {{ $model->target }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="text-gray-600 font-weight-normal">Satuan</h4>
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <h4 class="text-gray-600">
                                                {{ $model->satuan }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="text-gray-600 font-weight-normal">Alokasi Anggaran</h4>
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <h4 class="text-gray-600">
                                                {{ $model->alokasi_anggaran }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-lg-4 mt-5 mb-5 p-5 bg-light-info rounded-1">
                            <div class="col-12 fv-row mt-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <div id="graph-capaian" style="width: 100%; height: 300px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <div id="graph-realisasi-anggaran" style="width: 100%; height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-lg-4 mt-5 mb-5 p-5 bg-light-info rounded-1">
                            <div class="col-12 fv-row mt-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <div id="targetPerMont" style="height: 400px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                            <div id="anggaranPerMont" style="height: 400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 fv-row">
                        <div class="col-lg-12 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Kementrian Lembaga</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->instansi_pelaksana }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Fokus Pelaksanaan</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->fokus_pelaksanaan }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Arah Kebijakan</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->arah_kebijakan }}
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Strategi Terobosan</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->strategi_terobosan }}
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Tantangan Pelaksanaan</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->rencana_aksi_pelaksanaan->last()?->tantangan_pelaksanaan ?? '-' }}
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Strategi Pelaksanaan</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->rencana_aksi_pelaksanaan->last()?->strategi_pelaksanaan ?? '-' }}
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5 mb-5">
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <div class="col-12 fv-row bg-white p-4 mt-2 rounded-1">
                                    <div id="capaianCurrentPeriode" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('monev.kl.index') }}"
                            class="btn btn-light  btn-light-secondary me-2 text-gray-600">Tutup</a>
                    </div>
                </div>
            </div>
        @endsection
        @section('js')

            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/highcharts-more.js"></script> <!-- WAJIB -->
            <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <script type="text/javascript">
                const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
                    message: 'hapus data...',
                })

                function showImage(imagePath) {
                    console.log("diklik");
                    // Mengubah src dari img di dalam modal
                    document.getElementById('modalImage').src = imagePath;
                }

                $(document).ready(function() {
                    $('body').on('click', '.delete-row', function() {
                        const id = $(this).attr('id')
                        Swal.fire({
                            title: 'Hapus Talenta',
                            text: 'Anda yakin akan menghapus data ini?',
                            icon: 'warning',
                            buttonsStyling: false,
                            confirmButtonText: 'Hapus',
                            showCancelButton: true,
                            cancelButtonText: 'Batal',
                            customClass: {
                                confirmButton: 'btn btn-danger',
                                cancelButton: 'btn btn-light',
                            },
                        }).then(function(result) {
                            if (result.value) {
                                blockUI.block()
                                $.ajax({
                                    url: '/dashboard/data-master/talenta/delete/' + id,
                                    type: 'GET',
                                    success: function(res) {
                                        blockUI.release()
                                        // table.draw()
                                        Swal.fire({
                                            title: 'Hapus Data',
                                            text: 'Hapus Data Berhasil',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 2000,
                                        }).then(function() {
                                            location
                                                .reload(); // Reload halaman setelah Swal ditutup
                                        });
                                    },
                                    error: function(request, status, error) {
                                        Swal.fire('Something Wrong. Please try Again', '',
                                            'error')
                                    },
                                })
                            }
                        })
                    })
                });
            </script>

            <script>
                const rencanaAksiDetails = @json($model->rencana_aksi_details);
                const target = {{ $model->target ?? 0 }};
                const alokasi_anggaran = {{ $model->alokasi_anggaran ?? 0 }};

                const targetPerTahun = @json($model->target);
            </script>

            <script>
                function getBulanSekarang() {
                    const bulanIndo = [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];
                    const tanggal = new Date();
                    return bulanIndo[tanggal.getMonth()];
                }
                document.addEventListener('DOMContentLoaded', function() {
                    const bulan = getBulanSekarang();
                    const selectYear = document.getElementById('select-year');
                    const graphCapaian = Highcharts.chart('graph-capaian', getChartOptions('Capaian', bulan, selectYear
                        .value));
                    const graphRealisasi = Highcharts.chart('graph-realisasi-anggaran', getChartOptions(
                        'Realisasi Anggaran', bulan, selectYear.value));

                    function getChartOptions(title, bulan, tahun) {
                        return {
                            credits: {
                                enabled: false
                            },
                            chart: {
                                type: 'solidgauge'
                            },
                            title: {
                                text: title
                            },

                            subtitle: {
                                text: 'Per ${bulan} Tahun ${tahun} ',
                                style: {
                                    fontSize: '14px',
                                    color: '#666'
                                },
                                y: 30
                            },
                            pane: {
                                startAngle: -90,
                                endAngle: 90,
                                background: [{
                                    outerRadius: '100%',
                                    innerRadius: '60%',
                                    backgroundColor: '#EEE',
                                    borderWidth: 0,
                                    shape: 'arc'
                                }]
                            },
                            tooltip: {
                                enabled: false
                            },
                            yAxis: {
                                min: 0,
                                max: 100,
                                stops: [
                                    [0, '#f44336'], // Hijau mulai dari >80
                                    [1, '#A6CE39']
                                ],
                                lineWidth: 0,
                                tickWidth: 0,
                                minorTickInterval: null,
                                tickAmount: 2,
                                labels: {
                                    y: 16
                                }
                            },
                            plotOptions: {
                                solidgauge: {
                                    dataLabels: {
                                        y: -20,
                                        borderWidth: 0,
                                        useHTML: true,
                                        format: '<div style="text-align:center">' +
                                            '<span style="font-size:36px">{y}</span><br/>' +
                                            '<span style="font-size:16px; color:gray">Persen</span>' +
                                            '</div>'
                                    }
                                }
                            },

                            series: [{
                                data: [0],
                                dataLabels: {
                                    format: '<div style="text-align:center"><span style="font-size:25px">{y:.1f}%</span></div>'
                                }
                            }]
                        };
                    }

                    function updateCharts(year) {
                        const totalCapaian = rencanaAksiDetails
                            .filter(detail => parseInt(detail.tahun) === parseInt(year))
                            .reduce((sum, detail) => sum + (parseFloat(detail.capaian) || 0), 0);

                        const totalRealisasi = rencanaAksiDetails
                            .filter(detail => parseInt(detail.tahun) === parseInt(year))
                            .reduce((sum, detail) => sum + (parseFloat(detail.realisasi_anggaran) || 0), 0);

                        const capaianPercent = target > 0 ? (totalCapaian / target) * 100 : 0;
                        const realisasiPercent = alokasi_anggaran > 0 ? (totalRealisasi / alokasi_anggaran) * 100 : 0;

                        graphCapaian.series[0].setData([capaianPercent]);
                        graphRealisasi.series[0].setData([realisasiPercent]);

                        graphCapaian.setTitle(null, {
                            text: `Per ${bulan} Tahun ${year}`
                        });
                        graphRealisasi.setTitle(null, {
                            text: `Per ${bulan} Tahun ${year}`
                        });

                    }
                    updateCharts(selectYear.value);
                    selectYear.addEventListener('change', function() {
                        updateCharts(this.value);
                    });
                });
            </script>

            <script>
                function getMonthlyChartData(year) {
                    const bulanCount = 12;
                    const capaianData = Array(bulanCount).fill(0);
                    const anggaranData = Array(bulanCount).fill(0);

                    rencanaAksiDetails.forEach(detail => {
                        const bulan = parseInt(detail.bulan);
                        const tahun = parseInt(detail.tahun);

                        if (tahun === parseInt(year) && bulan >= 1 && bulan <= 12) {
                            capaianData[bulan - 1] += parseFloat(detail.capaian || 0);
                            anggaranData[bulan - 1] += parseFloat(detail.realisasi_anggaran || 0);
                        }
                    });

                    return {
                        capaianData,
                        anggaranData
                    };
                }
            </script>
            <script>
                let chartCapaian, chartAnggaran;

                function renderCharts(year) {
                    const {
                        capaianData,
                        anggaranData
                    } = getMonthlyChartData(year);

                    const categories = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

                    if (chartCapaian) {
                        chartCapaian.series[0].setData(capaianData);
                        chartCapaian.setTitle({
                            text: 'Capaian Target Perbulan Tahun ' + year
                        });
                    } else {
                        chartCapaian = Highcharts.chart('targetPerMont', {
                            credits: {
                                enabled: false
                            },
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Capaian Target Perbulan Tahun ' + year
                            },
                            xAxis: {
                                categories: categories,
                                title: {
                                    text: 'Bulan Monev'
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Capaian'
                                },
                                maxPadding: 0.2
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.3,
                                    borderWidth: 0,
                                    color: '#00aaff'
                                }
                            },
                            series: [{
                                name: 'Capaian',
                                data: capaianData,
                                marker: {
                                    enabled: true,
                                    symbol: 'circle',
                                    radius: 6
                                }
                            }]
                        });
                    }

                    if (chartAnggaran) {
                        chartAnggaran.series[0].setData(anggaranData);
                        chartAnggaran.setTitle({
                            text: 'Realisasi Anggaran Perbulan Tahun ' + year
                        });
                    } else {
                        chartAnggaran = Highcharts.chart('anggaranPerMont', {
                            credits: {
                                enabled: false
                            },
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Realisasi Anggaran Perbulan Tahun ' + year
                            },
                            xAxis: {
                                categories: categories,
                                title: {
                                    text: 'Bulan Monev'
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Realisasi'
                                },
                                maxPadding: 0.2
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.3,
                                    borderWidth: 0,
                                    color: '#00aaff'
                                }
                            },
                            series: [{
                                name: 'Realisasi',
                                data: anggaranData,
                                marker: {
                                    enabled: true,
                                    symbol: 'circle',
                                    radius: 6
                                }
                            }]
                        });
                    }
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const selectYear = document.getElementById('select-year');
                    renderCharts(selectYear.value);

                    selectYear.addEventListener('change', function() {
                        renderCharts(this.value);
                    });
                });
            </script>

            <script>
                function getCapaianSummaryByYear() {
                    const summary = {};

                    rencanaAksiDetails.forEach(detail => {
                        const tahun = detail.tahun;
                        const capaian = parseFloat(detail.capaian) || 0;

                        if (!summary[tahun]) {
                            summary[tahun] = 0;
                        }

                        summary[tahun] += capaian;
                    });

                    const years = Object.keys(summary).sort();
                    const capaianValues = years.map(t => summary[t]);

                    return {
                        years,
                        capaian: capaianValues
                    };
                }
            </script>
            <script>
                function getCapaianSummaryByYear() {
                    const summary = {};

                    rencanaAksiDetails.forEach(detail => {
                        const tahun = detail.tahun;
                        const capaian = parseFloat(detail.capaian) || 0;

                        if (!summary[tahun]) {
                            summary[tahun] = 0;
                        }

                        summary[tahun] += capaian;
                    });

                    const years = Object.keys(summary).sort();
                    const capaianValues = years.map(t => summary[t]);

                    return {
                        years,
                        capaian: capaianValues
                    };
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const {
                        years,
                        capaian
                    } = getCapaianSummaryByYear();

                    const baseline = years.map(() => 1200); // contoh baseline tetap
                    const target2045 = years.map(() => 4000); // contoh tetap
                    const targetTahunan = years.map(() => parseFloat(targetPerTahun) || 0); // ← ini penting

                    Highcharts.chart('capaianCurrentPeriode', {
                        credits: {
                            enabled: false
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Capaian Periode Saat Ini',
                            style: {
                                color: '#3A65B0',
                                fontWeight: 'bold',
                                fontSize: '22px'
                            }
                        },
                        xAxis: {
                            categories: years,
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: ''
                            }
                        },
                        legend: {
                            align: 'center',
                            verticalAlign: 'bottom'
                        },
                        tooltip: {
                            shared: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            },
                            line: {
                                marker: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                                name: 'Capaian',
                                type: 'column',
                                data: capaian,
                                color: '#42caff'
                            },
                            {
                                name: 'Baseline',
                                type: 'line',
                                data: baseline,
                                color: '#004080'
                            },
                            {
                                name: 'Target 2045',
                                type: 'line',
                                data: target2045,
                                color: '#e74c3c'
                            },
                            {
                                name: 'Target per Tahun',
                                type: 'line',
                                data: targetTahunan,
                                color: '#27ae60'
                            }
                        ]
                    });
                });
            </script>
        @endsection
