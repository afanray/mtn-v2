@extends('layouts/dashboard')
@section('title', 'Tambah Monitoring Rencana Aksi')
@section('body')

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0 text-uppercase">
                    Tambah Monitoring
                </h3>
            </div>
        </div>

        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('monev.monitoring.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">

                    <div class="row-lg-4 mb-5 p-5 bg-light-success rounded-1">
                        <div class="col-12 fv-row mt-2">
                            <p class="badge badge-success text-white p-2 text-uppercase text-lg">
                                {{ $model->kode_ro }}
                            </p>
                            <h4 class="text-gray-600">
                                {{ $model->rincian_output }}
                            </h4>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pilih Tahun</label>
                        <div class="col-lg-8 fv-row">
                            <select class="form-select form-select-solid" id="select-year" name="year" <option
                                value="">Pilih Tahun</option>
                                @foreach (\App\Constants\Common::getTahun() as $t)
                                    <optgroup label="{{ $t['label'] }}">
                                        @foreach ($t['data'] as $tahun)
                                            <option value="{{ $tahun }}" @selected($tahun == old('year', date('Y')))>
                                                {{ $tahun }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pilih Bulan</label>
                        <div class="col-lg-8 fv-row">
                            <select class="form-select form-select-solid" id="select-month" name="month" <option
                                value="">Pilih Bulan</option>
                                @foreach (\App\Constants\Common::getBulan() as $b)
                                    <option value="{{ $b['value'] }}" @selected($b['value'] == old('month'))>
                                        {{ $b['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Capaian saat ini</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="capaian" id="capaian"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Capaian saat ini" value="{{ old('capaian') }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Realisasi anggaran saat ini</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="realisasi_anggaran" id="realisasi_anggaran"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Realisasi anggaran saat ini" value="{{ old('realisasi_anggaran') }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lokasi Pelaksanaan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="lokasi_pelaksanaan" id="lokasi_pelaksanaan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Lokasi Pelaksanaan" value="{{ old('lokasi_pelaksanaan') }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Status Pelaksanaan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="status_pelaksanaan" id="status_pelaksanaan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Status Pelaksanaan" value="{{ old('status_pelaksanaan') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-lg-12 col-form-label fw-semibold fs-6 text-uppercase">Identifikasi
                            Masalah</label>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategori</label>
                            <div class="col-lg-12 fv-row">
                                <select class="form-select form-select-solid" id="select-kategori-masalah"
                                    name="kategori_masalah" <option value="">Pilih Kategori</option>
                                    @foreach (\App\Constants\Common::getKategoriMasalah() as $b)
                                        <option value="{{ $b['value'] }}" @selected($b['value'] == old('kategori_masalah'))>
                                            {{ $b['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label class="col-lg-12 col-form-label required fw-semibold fs-6">Kondisi ideal yang
                                diinginkan</label>
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="kondisi_ideal" id="kondisi_ideal"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Kondisi Ideal">{{ old('kondisi_ideal') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-lg-12 col-form-label required fw-semibold fs-6">Rencana Tindak
                                    Lanjut</label>
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <textarea name="rencana_tindak_lanjut" id="rencana_tindak_lanjut"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Rencana Tindak Lanjut">{{ old('rencana_tindak_lanjut') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="rencana_aksi_id" id="rencana_aksi_id" value="{{ $model->id ?? '' }}" />
                    <input type="hidden" name="rencana_aksi_detail_id" id="rencana_aksi_detail_id"
                        value="{{ $model->rencana_aksi_detail->id ?? '' }}" />
                    <a href="{{ url()->previous() }}" class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectMonth = document.getElementById('select-month');
            const bulanSekarang = new Date().getMonth() + 1;
            const bulanValue = bulanSekarang.toString()

            // Atur opsi yang sesuai sebagai selected
            for (const option of selectMonth.options) {
                if (option.value === bulanValue) {
                    option.selected = true;
                    break;
                }
            }
        });
    </script>


@endsection
