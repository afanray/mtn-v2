@extends('layouts/dashboard')
@section('title', 'Berita dan Kegiatan')
@section('body')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                    <h3 class="card-title">Berita dan Kegiatan</h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input id="search" type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15 me-3" placeholder="Cari" />
                        <a href="{{ route('berita-kegiatan.add') }}" class="btn btn-primary me-4">
                            <i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <!--end::Search-->

                </div>

            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_user_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">ID</th>
                        <th class="min-w-125px">Image/th>
                        <th class="min-w-125px">Judul</th>
                        <th class="min-w-125px">Kategori</th>
                        <th class="min-w-125px">Konten</th>
                        <th class="min-w-125px">Dibuat oleh</th>
                        <th class="min-w-125px">Dibuat tanggal</th>
                        <th class="text-end min-w-300px">Aksi</th>
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
        var dataBK = [];
        const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
            message: 'hapus data...',
        })
        const isOps = {{ \App\Models\User::isOperator() ? 'true' : 'false' }};
        const isSup = {{ \App\Models\User::isSuperAdmin() ? 'true' : 'false' }};
        const isPic = {{ \App\Models\User::isPic() ? 'true' : 'false' }};
        $(document).ready(function() {
            $('body').on('click', '.test-delete', function() {
                const id = $(this).data('id')
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
                            url: '/dashboard/berita-kegiatan/delete/' + id,
                            type: 'POST',
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
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
            const columns = defineColumn()
            var table = $('#kt_user_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: `/dashboard/berita-kegiatan/data`,
                    type: 'GET',
                    complete: function(res) {
                        dataBK = res.responseJSON.data || [];
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

            $('#search').on('keyup', function() {
                table.search($('#search').val()).draw()
            })
        })

        function defineColumn() {
            const columns = [{
                    data: 'id',
                    title: 'ID',
                },
                {
                    data: 'image',
                    title: 'Image',
                    sortable: false,
                    render: function(data, type, row) {
                        return `<img src="/storage/berita_kegiatan/${data}" style="width: 75px;height: 75px; object-fit: cover;" alt="foto" />`;
                    }
                },
                {
                    data: 'title',
                    title: 'Judul',
                    sortable: false,
                },
                {
                    data: 'category',
                    title: 'Kategori',
                    sortable: false,
                },
                {
                    data: 'content',
                    title: 'Konten',
                    sortable: false,
                    render: function(data, type, row) {
                        // Memisahkan konten menjadi kata-kata
                        let words = data.split(' ');
                        // Menampilkan maksimal 50 kata
                        if (words.length > 20) {
                            return words.slice(0, 20).join(' ') + '...';
                        }
                        return data; // Jika konten kurang dari 50 kata
                    }
                },
                {
                    data: 'user.name',
                    title: 'Dibuat Oleh',
                    sortable: false,
                },
                {
                    data: 'created_at',
                    title: 'Dibuat tanggal',
                    sortable: false,
                    render: function(data, type, row) {
                        return moment(data).format('DD-MM-YYYY HH:mm:ss')
                    },
                },
                {
                    field: '',
                    title: 'Aksi',
                    sortable: false,
                    className: 'text-center',
                    render: function(data, type, row) {
                        let button = ``;
                        let buttonDelete =
                            `<a type="button" class="btn btn-sm btn-danger test-delete me-3" data-id="${row.id}" ><i class="fa fa-trash-alt"></i></a>`;

                        if (isSup || isPic) {
                            button += `
                        <a type="button" class="btn btn-sm btn-primary me-3" data-id="${row.id}" href="/dashboard/berita-kegiatan/edit/${row.id}"><i class="fa fa-pencil-alt"></i></a>
                        <a type="button" class="btn btn-sm btn-success test-detail me-3" data-id="${row.id}" href="/dashboard/berita-kegiatan/show/${row.id}" ><i class="fa fa-eye"></i></a>
                        ${buttonDelete}`
                        }
                        return button;
                    },
                },
            ]
            return columns
        }
    </script>
@endsection
