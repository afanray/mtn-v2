@php
    function truncateString($string, $length, $append = '...')
    {
        if (strlen($string) <= $length) {
            return $string;
        }
        $truncated = substr($string, 0, $length);
        return rtrim(substr($truncated, 0, strrpos($truncated, ' '))) . $append;
    }
@endphp
@extends('layouts/dashboard')
@section('title', 'Profile Talenta')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0 text">Profile Talenta</h3>
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
                                    {{ $model->kode_talenta }}
                                </p>
                                <h4 class="text-gray-600 text-uppercase">
                                    Bidang {{ $model->bidang->name }}
                                </h4>
                                <h4 class="text-gray-600 text-uppercase">
                                    Tahapan {{ $model->level_talenta->name }}
                                </h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 fv-row">
                        <!--begin::Image input-->
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">NAMA</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->nama_talenta }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">NIK</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->nik ?? 'NIK belum tersedia' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">ALAMAT</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600 text-uppercase">
                                    {{ $model->regency->name }}, {{ $model->province->name }}
                                </h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 fv-row">
                        <!--begin::Image input-->
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">NISN</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->nisn ?? 'NISN Belom Tersedia' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">TANGGAL LAHIR</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600">
                                    {{ $model->tgl_lahir ?? 'Tanggal Lahir belum tersedia' }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="text-gray-600 font-weight-bold">TAHAPAN</h4>
                            <div class="col-12 fv-row bg-light-info p-4 mt-2 rounded-1">
                                <h4 class="text-gray-600 ">
                                    {{ $model->level_talenta->name ?? 'Tahapan Belum Tersedia' }}
                                </h4>
                            </div>
                        </div>

                    </div>

                    <!--begin::Image input-->
                    <div class="col-lg-12 mb-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="text-gray-600 font-weight-bold">RIWAYAT PENDIDIKAN</h4>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="{{ route('data-master.talenta.education.add', ['id' => $model->id]) }}"
                                    class="btn btn-primary me-4 btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>

                        <div class="col-12 fv-row bg-light-info p-4 rounded-1">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tingkat</th>
                                            <th>Nama</th>
                                            <th>Tanggal lulus</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($model->pendidikan as $item)
                                            <tr>
                                                <td class="text-gray-600">{{ $item->tingkat }}</td>
                                                <td class="text-gray-600">{{ $item->nama }}</td>
                                                <td class="text-gray-600">{{ $item->tgl_lulus }}</td>
                                                <td class="justify-content-center">
                                                    <div class="badge badge-info cursor-pointer">
                                                        <a href="{{ $item->link_web }}" target="_blank" class="text-white">
                                                            <i class="fa-solid fa-link text-white"></i>
                                                        </a>
                                                    </div>

                                                </td>
                                                {{-- <td class="justify-content-center">
                                                    <div class="badge badge-info cursor-pointer" data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        onclick="showImage('{{ Storage::url('ijazah/' . $item->foto_ijazah) }}')">
                                                        <i class="fa-solid fa-link text-white"></i>
                                                    </div>
                                                </td> --}}

                                                <td class="col">
                                                    <div class="row-lg-6 ">
                                                        <div class="badge badge-success cursor-pointer">
                                                            <i class="fa-solid fa-pen cursor-pointer text-white"></i>
                                                        </div>
                                                        <div class="badge badge-danger cursor-pointer">
                                                            <i class="fa-solid fa-trash text-white "></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img id="modalImage" src="" alt="Preview Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal untuk menampilkan gambar -->

                        </div>

                        <!-- Modal -->


                    </div>
                    <div class="col-lg-12 mt-5 mb-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="text-gray-600 font-weight-bold">RIWAYAT PRESTASI</h4>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="{{ route('data-master.talenta.prestasi.add', ['id' => $model->id]) }}"
                                    class="btn btn-primary me-4 btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>


                        <div class="col-12 fv-row bg-light-info p-4 rounded-1">
                            <div class="table-responsive">
                                <table class="table table-bordered align-content-center">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Bidang</th>
                                            <th>Subbidang</th>
                                            <th>Penyelenggara</th>
                                            <th>Prestasi</th>
                                            <th>Rekognisi</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($model->prestasi as $item)
                                            <tr>
                                                <td class="text-gray-600">{{ $item->tanggal_perolehan }}</td>
                                                <td class="text-gray-600">{{ $item->nama_prestasi }}</td>
                                                <td class="text-gray-600">{{ $item->bidang->name }}</td>
                                                <td class="text-gray-600">{{ $item->sub_bidang }}</td>
                                                <td class="text-gray-600">{{ $item->penyelenggara }}</td>
                                                <td class="text-gray-600">{{ $item->prestasi }}</td>
                                                <td class="text-gray-600">{{ $item->tingkat_rekognisi }}</td>
                                                <td class="justify-content-center">
                                                    <div class="badge badge-info cursor-pointer">
                                                        <a href="{{ $item->link_web }}" target="_blank"
                                                            class="text-white">
                                                            <i class="fa-solid fa-link text-white"></i>
                                                        </a>
                                                    </div>

                                                </td>
                                                <td class="col">
                                                    <div class="row-lg-6 ">
                                                        <div class="badge badge-success cursor-pointer">
                                                            <i class="fa-solid fa-pen cursor-pointer text-white"></i>
                                                        </div>
                                                        <div class="badge badge-danger cursor-pointer">
                                                            <i class="fa-solid fa-trash text-white "></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12
                                                            mt-5 mb-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="text-gray-600 font-weight-bold">KEAHLIAN
                                </h4>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="{{ route('data-master.talenta.keahlian.add', ['id' => $model->id]) }}"
                                    class="btn btn-primary me-4 btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>

                        <div class="col-12 fv-row bg-light-info p-4 rounded-1">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama keahlian</th>
                                            <th>Deskripsi</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($model->keahlian as $item)
                                            <tr>
                                                <td class="text-gray-600">
                                                    {{ $item->nama_keahlian }}</td>
                                                <td class="text-gray-600">
                                                    {{ truncateString($item->deskripsi, 50) }}
                                                    <!-- Menggunakan fungsi truncateString -->
                                                </td>
                                                <td class="justify-content-center">
                                                    <div class="badge badge-info cursor-pointer">
                                                        <a href="{{ $item->url }}" target="_blank">
                                                            <i class="fa-solid fa-link text-white"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col">
                                                    <div class="row-lg-6 ">
                                                        <div class="badge badge-success cursor-pointer">
                                                            <i class="fa-solid fa-pen cursor-pointer text-white"></i>
                                                        </div>
                                                        <div class="badge badge-danger cursor-pointer">
                                                            <i class="fa-solid fa-trash text-white "></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-lg-4 fv-row mt-5">

            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{ route('data-master.talenta.index') }}"
                    class="btn btn-light  btn-light-secondary me-2 text-gray-600">Tutup</a>
                {{-- <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{--
<script type="text/javascript"></script> --}}
@endsection

<script>
    function showImage(imagePath) {
        console.log("diklik");
        // Mengubah src dari img di dalam modal
        document.getElementById('modalImage').src = imagePath;
    }
</script>
