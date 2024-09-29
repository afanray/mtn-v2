@extends('layouts/dashboard')
@section('title', 'Tambah Prestasi')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                {{-- <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Talenta</h3> --}}
                <h3 class="fw-bold m-0">Tambah Prestasi</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form"
                action="{{ route('data-master.talenta.prestasi.save', ['id' => $model->id]) }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama_talenta" id="nama_talenta"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Talenta" value="{{ old('nama_talenta', $model->nama_talenta) }}"
                                        disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="bidang_id" id="bidang_id" aria-label="Pilih Bidang"
                                        data-placeholder="Pilih Bidang"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Bidang</option>
                                        @foreach ($bidang as $b)
                                            <option value="{{ $b->id }}" @selected(old('bidang_id', $model->bidang_id) == $b->id)>
                                                {{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sub-Bidang</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="subbidang" id="subbidang"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Sub Bidang" value="{{ old('subbidang', $model->subbidang) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Prestasi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama_prestasi" id="nama_prestasi"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Prestasi"
                                        value="{{ old('nama_prestasi', $model->nama_prestasi) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="deskripsi" id="deskripsi"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Deskripsi" value="{{ old('deskripsi', $model->deskripsi) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Perolehan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tanggal_perolehan" id="tanggal_perolehan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="DD/MM/YYYY"
                                        value="{{ old('tanggal_perolehan', $model->tanggal_perolehan) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Penyelenggara</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="penyelenggara" id="penyelenggara"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Penyelenggara"
                                        value="{{ old('penyelenggara', $model->penyelenggara) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tingkat Rekognisi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tingkat_rekognisi" id="tingkat_rekognisi"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Tingkat Rekognisi"
                                        value="{{ old('tingkat_rekognisi', $model->tingkat_rekognisi) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Prestasi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="prestasi" id="prestasi"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Cth. Juara 1" value="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Link Web</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="link_web" id="link_web"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Link Web" value="{{ old('link_web', $model->link_web) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('data-master.talenta.index') }}"
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
        const levelTalenta = {{ Js::from(\App\Constants\Common::getLevelTalenta()) }};
        const bidangId = {{ $model->bidang_id ?? 'null' }};
        const levelTalentaId = {{ $model->level_talenta_id ?? 'null' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'subbidang': {
                            validators: {
                                notEmpty: {
                                    message: 'Subbidang is required'
                                },
                            }
                        },
                        'nama_prestasi': {
                            validators: {
                                notEmpty: {
                                    message: 'Nama prestasi is required'
                                },
                            }
                        },
                        'deskripsi': {
                            validators: {
                                notEmpty: {
                                    message: 'Deskripsi is required'
                                },
                            }
                        },
                        'tanggal_perolehan': {
                            validators: {
                                notEmpty: {
                                    message: 'Tanggal perolehan is required'
                                },
                            }
                        },

                        'penyelenggara': {
                            validators: {
                                notEmpty: {
                                    message: 'Penyelenggara is required'
                                },
                            }
                        },
                        'tingkat_rekognisi': {
                            validators: {
                                notEmpty: {
                                    message: 'Tingkat rekognisi is required'
                                },
                            }
                        },
                        'prestasi': {
                            validators: {
                                notEmpty: {
                                    message: 'Prestasi is required'
                                },
                            }
                        },
                        'link_web': {
                            validators: {
                                notEmpty: {
                                    message: 'Link web is required'
                                },
                            }
                        },


                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton({}),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                });
        });
    </script>
@endsection
