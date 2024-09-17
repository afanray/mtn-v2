@extends('layouts/dashboard')
@section('title','Manajemen Pustaka')
@section('body')
  <!--begin::Card-->
  <div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
      <!--begin::Card title-->
      <div class="card-title w-100">
        <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
          <h3 class="card-title">Daftar Pustaka</h3>
          <!--begin::Search-->
          <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
            <a href="{{ route('pustaka.add') }}" class="btn btn-primary me-4">
              <i class="fa fa-plus"></i> Tambah
            </a>
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
          <th class="min-w-125px">Nama Ajang</th>
          <th class="min-w-125px">Tanggal</th>
          <th class="min-w-125px">Lembaga</th>
          <th class="min-w-125px">Bidang</th>
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
    $(document).ready(function () {
      $('body').on('click', '.delete-row', function () {
        const id = $(this).attr('id')
        Swal.fire({
          title: 'Hapus Pustaka',
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
        }).then(function (result) {
          if (result.value) {
            blockUI.block()
            $.ajax({
              url: '/dashboard/pustaka/delete',
              data: {id: id},
              dataType: 'json',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'POST',
              success: function (res) {
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
              error: function (request, status, error) {
                Swal.fire('Something Wrong. Please try Again', '', 'error')
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
          url: `/dashboard/pustaka/data`,
          type: 'GET',
          complete: function () {
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

      $('#search').on('keyup', function () {
        table.search($('#search').val()).draw()
      })
    })

    function defineColumn() {
      const columns = [
        {
          data: 'id',
          title: 'ID',
        },
        {
          data: 'title',
          title: 'Judul',
          sortable: false,
        },
        {
          data: 'description',
          title: 'Deskripsi',
          sortable: false,
        },
        {
          data: 'type',
          title: 'Tipe',
          sortable: false,
          render: function (data, type, row) {
            switch (data) {
              case 1:
                return 'Pustaka Kebijakan atau Regulasi Pemerintah';
              case 2:
                return 'Pustaka Pedoman atau Panduan Teknis';
              case 3:
                return 'Pustaka Video';
              case 4:
                return 'Pustaka Informasi Visual dalam Bentuk Infografis';
            }
            return '-';
          },
        },
        {
          data: 'created_at',
          title: 'Dibuat Pada',
          sortable: false,
          render: function (data, type, row) {
            return moment(data).format('DD-MM-YYYY HH:mm:ss')
          },
        },
        {
          field: '',
          title: 'Aksi',
          sortable: false,
          className: 'text-center',
          render: function (data, type, row) {
            return `<a href="${dashboardUrl}/pustaka/edit/${row.id}" class="edit-row me-3"><i class="fa fa-pencil-alt"></i></a>
                    <a href="#" id="${row.id}" class="delete-row"><i class="fa fa-trash"></i></a>
                `;
          },
        },
      ]

      return columns
    }
  </script>
@endsection
