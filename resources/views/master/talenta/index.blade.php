@extends('layouts/dashboard')
@section('title', 'Manajemen Master Talenta')
@section('body')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch">
            <h3 class="card-title">Daftar Talenta</h3>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0" id="talenta-tab" role="tablist">
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link active" id="talenta-1-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-1')" aria-controls="talenta-1"
                            aria-selected="true">Bidang Riset & Inovasi</button>
                    </li>
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link" id="talenta-2-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-2')" aria-controls="talenta-2"
                            aria-selected="false">Bidang Seni Budaya</button>
                    </li>
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link" id="talenta-3-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-3')" aria-controls="talenta-3"
                            aria-selected="false">Bidang Olahraga</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                    <h3 class="card-title" id="bidang">Bidang Riset & Inovasi</h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <input id="search" type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15 me-3" placeholder="Cari" />
                        <a href="{{ route('data-master.talenta.add') }}" class="btn btn-primary me-4">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                    <!--end::Search-->
                </div>
            </div>
        </div>

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_user_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">No.</th>
                        <th class="min-w-125px">Talenta ID</th>
                        <th class="min-w-125px">Nama Talenta</th>
                        <th class="min-w-125px">NIK</th>
                        <th class="min-w-125px">Bidang</th>
                        <th class="min-w-125px">Tahapan</th>
                        <th class="min-w-125px">Lembaga Induk</th>
                        <th class="min-w-125px">Pusat/Unit/Fakultas</th>
                        <th class="min-w-125px">Direktorat/Jurusan</th>
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
            table = $('#kt_user_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: `/dashboard/data-master/talenta/data/${bidangId}`,
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
                    title: 'No.'
                },
                {
                    data: 'kode_talenta',
                    title: 'TALENTA ID'
                },
                {
                    data: 'nama_talenta',
                    title: 'Nama Talenta',
                    sortable: true
                },
                {
                    data: 'nik',
                    title: 'NIK',
                    sortable: true
                },

                {
                    data: 'bidang.name',
                    title: 'Bidang',
                    sortable: true
                },
                {
                    data: 'level_talenta.name',
                    title: 'Tahapan',
                    sortable: false
                },
                {
                    data: 'lembaga_induk.name',
                    title: 'Lembaga Induk',
                    sortable: true
                },
                {
                    data: 'lembaga_unit.name',
                    title: 'Pusat/Unit/Fakultas',
                    sortable: true
                },
                {
                    data: 'lembaga.name',
                    title: 'Direktorat/Jurusan',
                    sortable: true
                },
                {
                    data: 'created_at',
                    title: 'Dibuat Pada',
                    sortable: true,
                    render: function(data) {
                        return moment(data).format('DD-MM-YYYY HH:mm:ss');
                    }
                },
                {
                    data: 'id',
                    title: 'Aksi',
                    sortable: false,
                    className: 'text-center',
                    render: function(data, type, row) {
                        return `
                        <a href="/dashboard/data-master/talenta/show/${row.id}" class="edit-row me-3">
                            <i class="fa fa-circle-info"></i>
                        </a>
                        <a href="/dashboard/data-master/talenta/edit/${row.id}" class="edit-row me-3">
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

        function showTahapanSasaranMtn(evt, tabName) {
            // Tentukan bidang berdasarkan tabName
            let bidang = (tabName === "talenta-tab-1") ? "Riset dan Inovasi" :
                (tabName === "talenta-tab-2") ? "Seni Budaya" : "Olahraga";

            bidangId = (bidang === "Riset dan Inovasi") ? "1" :
                (bidang === "Seni Budaya") ? "2" : "3";

            // Update teks bidang
            document.getElementById('bidang').innerText = 'Bidang ' + bidang;

            // Update tabel
            table.ajax.url(`/dashboard/data-master/talenta/data/${bidangId}`).load();

            // Ubah tab yang aktif
            const tabLinks = document.querySelectorAll('.nav-link');
            tabLinks.forEach(link => link.classList.remove('active'));
            evt.currentTarget.classList.add('active');
        }
    </script>
@endsection
