@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Target Capaian Indikator')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Target Capaian Indikator</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('data-master.sasaran-indikator.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Indikator</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="indikator_id" id="indikator_id"
                                        class="form-select form-select-solid form-select-lg" aria-label="Pilih Indikator"
                                        data-placeholder="Pilih Indikator" onchange="toggleRisetFields()">
                                        <option value="">Pilih Indikator</option>
                                        @foreach ($indikator as $ik)
                                            <option value="{{ $ik->id }}" data-nama="{{ strtolower($ik->name) }}"
                                                @selected(old('indikator_id', $model->indikator_id) == $ik->id)>
                                                {{ $ik->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="number" name="year" id="year"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Tahun" value="{{ old('year', $model->year) }}" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Target</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="number" name="target" id="target"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Target" value="{{ old('target', $model->target) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Capaian</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="number" name="capaian" id="capaian"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Capaian" value="{{ old('capaian', $model->capaian) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('data-master.sasaran-indikator.index') }}"
                        class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $model->id ? 'true' : 'false' }};
        const bidangId = {{ $model->bidang_id ?? 'null' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');


        });
    </script>
@endsection
