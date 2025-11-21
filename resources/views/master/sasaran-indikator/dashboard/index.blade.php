@extends('layouts/dashboard')
@section('title', 'Manajemen Data Sasaran Indikator')
@section('body')

    <!--begin::Card-->
    <div class="card">

        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">

            <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100 align-items-center">

                    <h3 class="card-title">Sasaran dan Indikator MTN</h3>

                    <!-- Filter Tahun + Export Excel -->
                    <div class="d-flex gap-3 mt-4 mt-lg-0">

                        <!-- Dropdown Tahun -->
                        <select id="filter_tahun" class="form-select" style="width: 150px;">
                            <option value="">Semua Tahun</option>
                            @for ($y = date('Y'); $y >= 2021; $y--)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>

                        <!-- Tombol Export Excel -->
                        <a href="#" id="btnExportExcel" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>

                    </div>

                </div>
            </div>

        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_user_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">ID</th>
                        <th class="min-w-125px">Bidang</th>
                        <th class="min-w-125px">Sasaran</th>
                        <th class="min-w-125px">Indikator</th>
                        <th class="min-w-125px">Baseline 2021</th>
                        <th class="min-w-125px">Target 2045</th>
                        <th class="min-w-125px">Tahun</th>
                        <th class="min-w-125px">Capaian</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600"></tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

@endsection


@section('js')
    <script type="text/javascript">
        const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
            message: 'hapus data...',
        })

        $(document).ready(function() {

            const columns = defineColumn()

            var table = $('#kt_user_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: `/dashboard/data-master/sasaran-indikator/data-dashboard`,
                    type: 'GET',
                    data: function(d) {
                        d.tahun = $('#filter_tahun').val();
                    },
                    complete: function() {
                        $('#kt_user_table_processing').hide()
                    },
                },
                columns: columns,
                language: {
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data',
                    loadingRecords: 'Memuat data...',
                },
            })

            // 🔍 Filter Tahun (Auto Reload)
            $('#filter_tahun').on('change', function() {
                table.ajax.reload()
            })

            // Export Excel langsung dari tabel HTML (tanpa server)
            $('#btnExportExcel').on('click', function(e) {
                e.preventDefault();

                // Ambil tabel HTML yang sudah dirender DataTables
                var table = document.getElementById('kt_user_table');

                // Konversi HTML table → workbook Excel
                var wb = XLSX.utils.table_to_book(table, {
                    sheet: "Sheet 1"
                });

                // Export file Excel
                XLSX.writeFile(wb, "sasaran_indikator.xlsx");
            });



        })

        function defineColumn() {
            const columns = [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'indikator.sasaran.bidang.name',
                    title: 'Bidang',
                    sortable: false
                },
                {
                    data: 'indikator.sasaran.name',
                    title: 'Sasaran',
                    sortable: false
                },
                {
                    data: 'indikator.name',
                    title: 'Indikator',
                    sortable: false
                },
                {
                    data: 'indikator.baseline_21',
                    title: 'Baseline 2021',
                    sortable: false
                },
                {
                    data: 'indikator.target_45',
                    title: 'Target 2045',
                    sortable: false
                },
                {
                    data: 'year',
                    title: 'Tahun',
                    sortable: false
                },
                {
                    data: 'capaian',
                    title: 'Capaian',
                    sortable: false
                },
            ]
            return columns
        }
    </script>
@endsection
