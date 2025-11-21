@extends('layouts.dashboard')

@section('body')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row align-items-center mb-4">
            <div class="col">
                <h1 class="fw-bold text-primary">Detail Rincian Output (RO)</h1>
                <p class="text-primary">KB.6680.ADI.002.051 - Pengembangan Kompetensi SDM Bidang Riset dan Inovasi</p>
            </div>
            <div class="col text-end">
                <button class="btn btn-primary shadow-sm" id="btnTambahCapaian" data-bs-toggle="modal"
                    data-bs-target="#tambahCapaianModal">
                    Tambah Capaian
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tambahCapaianModal" tabindex="-1" aria-labelledby="tambahCapaianModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form id="tambahCapaianForm" method="POST"
                        action="{{ route('rencanaAksi.detail.store', ['rencanaAksiId' => $rencanaAksiIdFilter]) }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahCapaianModalLabel">Tambah Capaian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="tahun" id="tahunInput" value="{{ $tahunFilter }}">

                                <label>Target</label>
                                <input type="text" name="target" class="form-control">

                                <label>Capaian</label>
                                <input type="text" name="capaian" class="form-control">

                                <label>Alokasi Anggaran</label>
                                <input type="text" name="alokasi_anggaran" class="form-control">

                                <label>Realisasi Anggaran</label>
                                <input type="text" name="realisasi_anggaran" class="form-control">

                                <label>Tantangan Pelaksanaan</label>
                                <input type="text" name="tantangan_pelaksanaan" class="form-control">

                                <label>Strategi Pelaksanaan</label>
                                <input type="text" name="strategi_pelaksanaan" class="form-control">

                                <label>Status Pelaksanaan</label>
                                <select name="status_pelaksanaan" class="form-select" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak_aktif">Tidak Aktif</option>
                                </select>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" id="btnSimpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                document.getElementById('btnSimpan').addEventListener('click', function(e) {
                    // Show a smiley alert before submitting
                    if (confirm("😊 Apakah Anda yakin ingin menyimpan data ini?")) {
                        document.getElementById('tambahCapaianForm').submit();
                    }
                });
            </script>

        </div>

        <!-- Targets and Budget -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4">
                    <h6 class="text-muted">Target</h6>
                    <h4><strong>{{ number_format($target, 0, ',', '.') }} Orang</strong></h4>
                    <h6 class="text-muted mt-3">Alokasi Anggaran</h6>
                    <h4><strong>Rp. {{ number_format($budget, 0, ',', '.') }}</strong></h4>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="card border-0 shadow-sm p-4">
                    <label class="form-label">Pilih Tahun</label>
                    <select class="form-select w-auto d-inline" id="yearSelect">
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                    </select>

                    <script>
                        // Function to get query parameter value by name
                        function getQueryParam(param) {
                            var urlParams = new URLSearchParams(window.location.search);
                            return urlParams.get(param);
                        }

                        // Set the select value based on the 'tahun' query parameter
                        var yearSelect = document.getElementById('yearSelect');
                        var currentYear = getQueryParam('tahun');
                        if (currentYear) {
                            yearSelect.value = currentYear;
                        }

                        // Add an event listener to handle selection changes
                        yearSelect.addEventListener('change', function() {
                            var selectedYear = this.value;
                            var rencanaAksiId =
                            @json($rencanaAksiIdFilter); // Ensure $rencanaAksiIdFilter is passed to the Blade view

                            // Get the current URL and update query parameters
                            var url = new URL(window.location.href);
                            url.searchParams.set('tahun', selectedYear);
                            if (rencanaAksiId) {
                                url.searchParams.set('rencana_aksi_id', rencanaAksiId);
                            }

                            // Redirect to the updated URL
                            window.location.href = url.toString();
                        });
                    </script>


                </div>
            </div>



        </div>

        <!-- Charts Section -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Capaian Target</h5>
                    <p class="display-6 text-danger">{{ $targetAchievement }} %</p>
                    <div id="targetChart" style="height: 250px;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title">💰 Penyerapan Anggaran</h5>
                    <p class="display-6 text-danger">{{ $budgetAbsorption }} %</p>
                    <div id="budgetChart" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Capaian Target Perbulan</h5>
                    <div id="monthlyTargetChart" style="height: 250px;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Realisasi Anggaran Perbulan</h5>
                    <div id="monthlyBudgetChart" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Capaian 2024-2029</h5>
                    <div id="yearlyAchievementChart" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <!-- Information Cards -->
        <div class="row g-3 mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Kementerian/Lembaga</h5>
                    <p class="text-primary">{{ $kementerianLembaga }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Arah Kebijakan</h5>
                    <p class="text-primary">{{ $arahKebijakan }}</p>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Fokus Pelaksanaan</h5>
                    <p class="text-primary">{{ $fokusPelaksanaan }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Tantangan Pelaksanaan</h5>
                    <p class="text-primary">{{ $tantanganPelaksanaan }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-semibold">Strategi Terobosan</h5>
                    <p class="text-primary">{{ $strategiTerobosan }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

    <script>
        // Fetching dynamic data for charts
        const monthlyTargetData = @json($monthlyTargetData);
        const monthlyBudgetData = @json($monthlyBudgetData);
        const yearlyAchievementData = @json($yearlyAchievementData);

        // Capaian Target Speedometer Chart
        Highcharts.chart('targetChart', {
            chart: {
                type: 'solidgauge',
                height: '100%'
            },
            title: null,
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: {
                    backgroundColor: '#f4f4f4',
                    innerRadius: '60%',
                    outerRadius: '100%',
                    shape: 'arc'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                stops: [
                    [0.7, '#55BF3B'], // Green
                    [1, '#DF5353'] // Red
                ],
                tickAmount: 5,
                labels: {
                    y: 16
                }
            },
            series: [{
                name: 'Capaian',
                data: [{{ $targetAchievement }}],
                dataLabels: {
                    format: '<div style="text-align:center"><span style="font-size:25px">{y}%</span></div>'
                },
                tooltip: {
                    valueSuffix: '%'
                }
            }]
        });

        // Penyerapaan Anggaran Speedometer Chart
        Highcharts.chart('budgetChart', {
            chart: {
                type: 'solidgauge',
                height: '100%'
            },
            title: null,
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: {
                    backgroundColor: '#f4f4f4',
                    innerRadius: '60%',
                    outerRadius: '100%',
                    shape: 'arc'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                stops: [
                    [0.7, '#55BF3B'], // Green
                    [1, '#DF5353'] // Red
                ],
                tickAmount: 5,
                labels: {
                    y: 16
                }
            },
            series: [{
                name: 'Anggaran',
                data: [{{ $budgetAbsorption }}],
                dataLabels: {
                    format: '<div style="text-align:center"><span style="font-size:25px">{y}%</span></div>'
                },
                tooltip: {
                    valueSuffix: '%'
                }
            }]
        });
        console.log('Monthly Target Data:', monthlyTargetData); // Debugging log
        console.log('Monthly Budget Data:', monthlyBudgetData); // Debugging log



        // Monthly Target Line Chart
        const monthlyTargetDatas = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33]; // Make sure 33 is a number, not a string

        Highcharts.chart('monthlyTargetChart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Capaian Target Perbulan'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Capaian (%)'
                }
            },
            series: [{
                name: 'Capaian',
                data: monthlyTargetData // This should now be numeric
            }]
        });

        // Monthly Budget Column Chart
        Highcharts.chart('monthlyBudgetChart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Realisasi Anggaran Perbulan'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Realisasi (Rp)'
                }
            },
            series: [{
                name: 'Anggaran',
                data: monthlyBudgetData
            }]
        });

        // Yearly Achievement Area Chart
        Highcharts.chart('yearlyAchievementChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Yearly Achievement (2024–2029)'
            },
            xAxis: {
                categories: [2024, 2025, 2026, 2027, 2028, 2029],
                title: {
                    text: 'Year'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Values'
                }
            },
            series: [{
                    name: 'Target',
                    data: @json(array_map(fn($data) => $data['target'], $chartDataYears))
                },
                {
                    name: 'Capaian',
                    data: @json(array_map(fn($data) => $data['capaian'], $chartDataYears))
                },
                {
                    name: 'Alokasi Biaya',
                    data: @json(array_map(fn($data) => $data['alokasi_anggaran'], $chartDataYears))
                },
                {
                    name: 'Realisasi Biaya',
                    data: @json(array_map(fn($data) => $data['realisasi_anggaran'], $chartDataYears))
                }
            ]
        });
    </script>
@endsection
