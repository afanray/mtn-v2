@extends('layouts/dashboard')
@section('title', 'Manajemen Master Talenta')
@section('body')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch">
            <h3 class="card-title">Monitoring Evaluasi MTN</h3>
        </div>

        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                    <h3 class="card-title" id="bidang">Daftar Rencana Aksi</h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">

                        <input id="search" type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15 me-3" placeholder="Cari" />
                        <a href="{{ route('monev.kl.add') }}" class="btn btn-primary me-4">
                            <i class="fa fa-plus"></i> Tambah
                        </a>

                    </div>
                    <!--end::Search-->
                </div>
            </div>
        </div>

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_monev_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">ID</th>
                        <th class="min-w-20px">Kode</th>
                        <th class="min-w-125px">Bidang</th>
                        <th class="min-w-125px">Arah Kebijakan</th>
                        <th class="min-w-125px">Strategi Terobosan</th>
                        <th class="min-w-125px">Fokus Pelaksanan</th>
                        <th class="min-w-125px">Kode RO/Komponen/Urusan Daerah</th>
                        <th class="min-w-125px">Rincian Output/Sub Kegiatan/Program/Aktivitas</th>
                        <th class="min-w-125px">Mendukung Alur Pengembangan</th>
                        <th class="min-w-125px">Target</th>
                        <th class="min-w-125px">Capaian</th>
                        <th class="min-w-125px">Satuan</th>
                        <th class="min-w-125px">Alokasi Anggaran Rp.</th>
                        <th class="min-w-125px">Realisasi Anggaran Rp.</th>
                        <th class="min-w-125px">Lokasi Pelaksanaan</th>
                        <th class="min-w-125px">Sumber Dana</th>
                        <th class="min-w-125px">Instansi Pengampu</th>
                        <th class="min-w-125px">Dibuat Oleh</th>
                        <th class="min-w-125px">Dibuat Pada</th>
                        <th class="text-end min-w-70px">Aksi</th>
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
        let bidangId = 1;
        let table;

        $(document).ready(function() {

            $('body').on('click', '.delete-row', function() {
                const id = $(this).attr('id')
                Swal.fire({
                    title: 'Hapus Data',
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
                            url: '/dashboard/monev/kl/delete/' + id,
                            type: 'GET',
                            success: function(res) {
                                blockUI.release()
                                table.draw()
                                Swal.fire({
                                    title: 'Hapus Data',
                                    text: 'Hapus Data Berhasil',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000,
                                })
                            },
                            error: function(request, status, error) {
                                Swal.fire('Something Wrong. Please try Again', '',
                                    'error')
                            },
                        })
                    }
                })
            })
            // Inisialisasi DataTables
            const columns = defineColumn();
            table = $('#kt_monev_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: `/dashboard/monev/kl/data`,
                    type: 'GET',
                },
                columns: columns,
                language: {
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data',
                    loadingRecords: 'Memuat data...',
                },
            });

            // Fungsi pencarian
            $('#search').on('keyup', function() {
                table.search($('#search').val()).draw();
            });
        });

        function defineColumn() {
            return [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'kode',
                    title: 'Kode'
                },
                {
                    data: 'bidang.name',
                    title: 'Bidang',
                    sortable: true,
                },
                {
                    data: 'arah_kebijakan',
                    title: 'Arah Kebijakan',
                    sortable: true
                },

                {
                    data: 'strategi_terobosan',
                    title: 'Strategi Terobosan',
                    sortable: true
                },
                {
                    data: 'fokus_pelaksanaan',
                    title: 'Fokus Pelaksanan',
                    sortable: true
                },
                {
                    data: 'kode_ro',
                    title: 'Kode RO/Komponen/Urusan Daerah',
                    sortable: true
                },
                {
                    data: 'rincian_output',
                    title: 'Rincian Output/Sub Kegiatan/Program/Aktivitas',
                    sortable: true
                },
                {
                    data: 'alur_pengembangan',
                    title: 'Mendukung Alur Pengembangan',
                    sortable: true
                },

                {
                    data: 'target',
                    title: 'Target',
                    sortable: false
                },
                {
                    data: 'realisasi',
                    title: 'Capaian',
                    sortable: false
                },
                {
                    data: 'satuan',
                    title: 'Satuan',
                    sortable: false
                },
                {
                    data: 'alokasi_anggaran',
                    title: 'Alokasi Anggaran Rp.',
                    sortable: false
                },
                {
                    data: 'realisasi_anggaran',
                    title: 'Realisasi Anggaran Rp.',
                    sortable: false
                },
                {
                    data: 'lokasi_pelaksanaan_kegiatan',
                    title: 'Lokasi Pelaksanaan',
                    sortable: true
                },
                {
                    data: 'sumber_dana',
                    title: 'Sumber Dana',
                    sortable: true,
                },
                {
                    data: 'instansi_pengampu',
                    title: 'Instansi Pengampu',
                    sortable: true
                },
                {
                    data: 'user.name',
                    title: 'Dibuat oleh',
                    sortable: true,
                },
                {
                    data: 'created_at',
                    title: 'Dibuat Pada',
                    sortable: false,
                    render: function(data, type, row) {
                        return moment(data).format('DD-MM-YYYY HH:mm:ss')
                    }
                },
                {
                    data: 'id',
                    title: 'Aksi',
                    sortable: false,
                    className: 'text-center',
                    render: function(data, type, row) {
                        return `
                        <a href="/dashboard/monev/kl/show/${row.id}" class="edit-row me-3">
                            <i class="fa fa-circle-info"></i>
                        </a>
                        <a href="/dashboard/monev/kl/edit/${row.id}" class="edit-row me-3">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="#" id="${row.id}" class="delete-row">
                            <i class="fa fa-trash"></i>
                        </a>
                    `;
                    }
                }
            ];
        }
    </script>
@endsection
