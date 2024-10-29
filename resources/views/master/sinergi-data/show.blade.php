@extends('layouts/dashboard')
@section('title', 'Detail')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0 text">Detail</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">

            <div class="card-body border-top p-9">
                <div class="row mb-6">
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row">
                        <!--begin::Image input-->
                        <div class="card">
                            <!--begin::Preview existing avatar-->
                            <div class="img-thumbnail bg-light-info h-250px rounded-2"
                                style="background-size:cover; background-image: url('{{ $model->foto_talenta ? asset('storage/talenta/' . $model->foto_talenta) : 'https://avatar.iran.liara.run/public/boy?username=Ash' }}')">
                            </div>
                            <!--end::Preview existing avatar-->
                        </div>
                        <!--end::Image input-->
                        <div class="col-lg-12 mt-5 mb-5 p-5 bg-light-success rounded-1">
                            <div class="col-12 fv-row mt-2">
                                <p class="badge badge-success text-white p-2 text-uppercase text-lg">
                                    {{ $model->lembaga_induk->name }}
                                </p>
                                <h4 class="text-gray-600 text-uppercase">
                                    {{ $model->lembaga_unit->name }}
                                </h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 fv-row">
                        <!--begin::Image input-->
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Produsen Data</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->lembaga->name }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Jenis Data</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->jenis_data ?? 'Tidak ada jenis data' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Satuan Data</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->satuan ?? 'Tidak ada jenis data' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Base URL</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->base_url }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 fv-row">
                        <!--begin::Image input-->
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">WebKey</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h6 class="text-gray-600">
                                    {{ $model->key ?? 'Tidak ada key' }}
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Method</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->method ?? 'Tidak ada method' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">Parameter</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600 ">
                                    {{ $model->parameter ?? 'Tidak ada parameter' }}
                                </h4>
                            </div>
                        </div>

                    </div>

                    <!--begin::Image input-->
                    <div class="col-lg-12 mb-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="text-gray-600 font-weight-bold">Kependudukan</h4>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="#" id="resetBtn" data="{{ $model->id }}"
                                    class="btn btn-success me-4 btn-sm">
                                    <i class="fa fa-trash"></i> Reset data
                                </a>

                                <a href="#" id="syncBtn" data="{{ $model->id }}"
                                    class="btn btn-primary me-4 btn-sm">
                                    <i class="fa fa-rotate"></i> Sinkronisasi
                                </a>
                            </div>
                        </div>
                        <div class="col-12 fv-row bg-light-info p-4 rounded-1">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tahun</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($model->population as $item)
                                            <tr>
                                                <td class="text-gray-600">
                                                    {{ $item->id }}</td>
                                                <td class="text-gray-600">
                                                    {{ $item->tahun }}</td>
                                                <td class="text-gray-600">
                                                    {{ $item->jumlah }}</td>
                                                </td>
                                                <td class="col">
                                                    <div class="row-lg-6 ">
                                                        <div class="badge badge-danger cursor-pointer">
                                                            <a href="#" id="{{ $item->id }}" class="delete-row">
                                                                <i class="fa-solid fa-trash text-white "></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal untuk menampilkan gambar -->

                        </div>

                        <!-- Modal -->
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('data-master.sinergi-data.index') }}"
                        class="btn btn-light  btn-light-secondary me-2 text-gray-600">Tutup</a>
                    {{-- <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button> --}}
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script type="text/javascript">
            const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
                message: 'Sinkronisasi data berlangsung...',
            })

            $(document).ready(function() {
                const sinergiId = $('#syncBtn').attr('data');
                $('#syncBtn').click(function() {
                    blockUI.block()
                    $.ajax({
                            url: '/dashboard/data-master/sinergi-data/population/sync-populasi/' +
                                sinergiId,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}', // CSRF token untuk keamanan
                            },
                            success: function(res) {
                                blockUI.release()
                                // table.draw()
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Sinkronisasi Data Berhasil',
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
                        }

                    );
                });
            });


            $(document).ready(function() {
                const sinergiId = $('#syncBtn').attr('data');
                const id = $(this).attr('id')
                $('#resetBtn').click(function() {
                    Swal.fire({
                        title: 'Hapus data',
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
                                url: '/dashboard/data-master/sinergi-data/population/reset/' +
                                    sinergiId,
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
                                url: '/dashboard/data-master/sinergi-data/population/delete/' +
                                    id,
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

    @endsection
