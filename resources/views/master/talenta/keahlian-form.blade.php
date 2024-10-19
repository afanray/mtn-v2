@extends('layouts/dashboard')
@section('title', ($method == 'add' ? 'Tambah' : 'Sunting') . ' Keahlian')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $method == 'add' ? 'Tambah' : 'Sunting' }} Keahlian</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form"
                action="{{ $method == 'add' ? route('data-master.talenta.keahlian.save', ['id' => $model->id]) : route('data-master.talenta.keahlian.saveedit', ['id' => $model->id]) }}"
                method="POST" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama_talenta" id="nama_talenta"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Talenta"
                                        value="{{ old('nama_talenta', $method == 'add' ? $model->nama_talenta : $model->talenta->nama_talenta) }}"
                                        disabled />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Keahlian</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama_keahlian" id="nama_keahlian"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Keahlian"
                                        value="{{ old('nama_keahlian', $model->nama_keahlian) }}" />
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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">URL</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="url" id="url"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Url sertifikat atau sejenisnya "
                                        value="{{ old('URL', $model->url) }}" />
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="idTalenta" id="idTalenta"
                        value=" {{ $method == 'edit' ? $model->talenta->id : $model->id }}" />
                    <a href="{{ route('data-master.talenta.show', $method == 'edit' ? $model->talenta->id : $model->id) }}"
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
                        'nama_keahlian': {
                            validators: {
                                notEmpty: {
                                    message: 'Nama keahlian is required'
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
                        'url': {
                            validators: {
                                notEmpty: {
                                    message: 'Url is required'
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
