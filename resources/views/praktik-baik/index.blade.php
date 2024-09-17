@extends('layouts/dashboard')
@section('title','Daftar Praktik Baik')
@section('body')
  <!--begin::Card-->
  <div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
      <!--begin::Card title-->
      <div class="card-title w-100">
        <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
          <h3 class="card-title">Daftar Praktik Baik</h3>
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
            <a href="{{ route('praktik-baik.add') }}" class="btn btn-primary me-4">
              <i class="fa fa-plus"></i> Tambah Praktik Baik</a>
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
          <th class="min-w-125px">Foto/th>
          <th class="min-w-125px">Tahun</th>
          <th class="min-w-125px">Bidang</th>
          <th class="min-w-125px">Bidang</th>
          <th class="min-w-125px">Dibuat Pada</th>
          <th class="min-w-125px">Dibuat Pada</th>
          <th class="min-w-125px">Dibuat Pada</th>
          <th class="min-w-125px">Dibuat Pada</th>
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
    var dataPB = [];
    const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
      message: 'hapus data...',
    })
    const isOps = {{ \App\Models\User::isOperator() ? 'true' : 'false' }};
    const isSup = {{ \App\Models\User::isSuperAdmin() ? 'true' : 'false' }};
    const isPic = {{ \App\Models\User::isPic() ? 'true' : 'false' }};
    $(document).ready(function () {
      $('body').on('click', '.test-validation', function () {
        const id = $(this).data('id')
        Swal.fire({
          title: 'Validasi Testimoni',
          text: 'Anda yakin akan menvalidasi Testimoni ini?',
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonText: 'Validasi',
          showCancelButton: true,
          cancelButtonText: 'Batal',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-light',
          },
        }).then(function (result) {
          if (result.value) {
            blockUI.block()
            $.ajax({
              url: '/dashboard/praktik-baik/validate',
              type: 'POST',
              data: {id:id},
              dataType: 'json',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (res) {
                blockUI.release()
                table.draw()
                Swal.fire({
                  title: 'Validasi Testimoni',
                  text: 'Validasi Testimoni Berhasil',
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
      $('body').on('click', '.test-delete', function () {
        const id = $(this).data('id')
        Swal.fire({
          title: 'Hapus Praktik Baik',
          text: 'Anda yakin akan menghapus Praktik Baik ini?',
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
              url: '/dashboard/praktik-baik/delete',
              type: 'POST',
              data: {id:id},
              dataType: 'json',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (res) {
                blockUI.release()
                table.draw()
                Swal.fire({
                  title: 'Hapus Praktik Baik',
                  text: 'Hapus Praktik Baik Berhasil',
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
          url: `/dashboard/praktik-baik/data`,
          type: 'GET',
          complete: function (res) {
            dataPB = res.responseJSON.data || [];
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
          data: 'foto',
          title: 'Foto',
          sortable: false,
          render: function (data, type, row) {
            return `<img src="/storage/praktik_baik/${data}" style="width: 75px;height: 75px; object-fit: cover;" alt="foto" />`;
          }
        },
        {
          data: 'nama_program',
          title: 'Nama Program',
          sortable: false,
        },
        {
          data: 'bidang.name',
          title: 'Nama Program',
          sortable: false,
        },
        {
          data: 'lembaga_id',
          title: 'Lembaga',
          sortable: false,
          render: function (data, type, row) {
            return `${row.lembaga.name}<br />${row.lembaga_unit.name}<br />${row.lembaga_induk.name}`;
          }
        },
        {
          data: 'nama_pengirim',
          title: 'Pengirim',
          sortable: false,
          render: function (data, type, row) {
            return `${row.nama_pengirim}<br />${row.email}<br />${row.no_hp}`;
          }
        },
        {
          data: 'status',
          title: 'Status',
          sortable: false,
          render: function (data, type, row) {
            return `${data ? '<span class="badge badge-success">Valid</span>' : '<span class="badge badge-warning">Perlu Validasi</span>'}`
          }
        },
        {
          data: 'bidang_id',
          title: 'Bidang',
          sortable: false,
          render: function (data, type, row) {
            return `${row.bidang != null ? row.bidang.name :'-'}`
          }
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
            let button = ``;
            let buttonDelete = `<a type="button" class="btn btn-sm btn-danger test-delete me-3" data-id="${row.id}" ><i class="fa fa-trash-alt"></i></a>`;
            let buttonVal = `<a type="button" class="btn btn-sm btn-primary test-validation me-3" data-id="${row.id}" >Validasi</a>`;
            if(isSup || isPic){
              button+=`
                ${!row.status ? buttonVal : ''}
                <a type="button" class="btn btn-sm btn-primary me-3" data-id="${row.id}" href="/dashboard/praktik-baik/edit/${row.id}"><i class="fa fa-pencil-alt"></i></a>
                <a type="button" class="btn btn-sm btn-success test-detail me-3" data-id="${row.id}" href="/dashboard/praktik-baik/view/${row.id}" ><i class="fa fa-eye"></i></a>
                ${buttonDelete}
              `
            }
            if(isOps && !row.status){
              button+=`
                <a type="button" class="btn btn-sm btn-primary me-3" data-id="${row.id}" href="/dashboard/praktik-baik/edit/${row.id}"><i class="fa fa-pencil-alt"></i></a>
                ${buttonDelete}
              `
            }
            return button;
          },
        },
      ]
      return columns
    }
  </script>
@endsection
