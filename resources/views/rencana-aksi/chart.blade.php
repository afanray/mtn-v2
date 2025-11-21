@extends('layouts.dashboard')

@section('content')
    <h3>Chart for Target and Capaian by Year and Kode RO</h3>
    <!-- First chart for Target and Capaian -->
    <canvas id="chart1" width="800" height="400"></canvas>

    <h3>Chart for Estimate and Realisasi by Year and Kode RO</h3>
    <!-- Second chart for Estimate and Realisasi -->
    <canvas id="chart2" width="800" height="400"></canvas>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Convert the PHP data to JavaScript
        var chartData = @json($chartData);

        // Arrays to hold the data for the first chart (Target and Capaian)
        var labels = [];
        var targetData = [];
        var capaianData = [];

        // Arrays to hold the data for the second chart (Estimate and Realisasi)
        var estimateData = [];
        var realisasiData = [];

        // Populate the arrays with the data
        chartData.forEach(function(item) {
            labels.push(item.kode_ro + " (" + item.tahun + ")");
            targetData.push(item.target);
            capaianData.push(item.capaian);
            estimateData.push(item.alokasi_anggaran); // Assuming alokasi_anggaran is "Estimate"
            realisasiData.push(item.realisasi_anggaran); // Assuming realisasi_anggaran is "Realisasi"
        });

        // Get the canvas contexts for both charts
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var ctx2 = document.getElementById('chart2').getContext('2d');

        // Create the first chart (Target and Capaian)
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels, // X-axis labels (Kode RO and Year)
                datasets: [{
                        label: 'Target',
                        data: targetData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Capaian',
                        data: capaianData,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        tickLength: 0,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Create the second chart (Estimate and Realisasi)
        var chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels, // X-axis labels (Kode RO and Year)
                datasets: [{
                        label: 'Estimate',
                        data: estimateData,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Realisasi',
                        data: realisasiData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        tickLength: 0,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
