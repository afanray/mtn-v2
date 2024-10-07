@extends('layouts/dashboard')
@section('title', 'Tambah Education')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                {{-- <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Talenta</h3> --}}
                <h3 class="fw-bold m-0">Tambah Pendidikan</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form"
                action="{{ route('data-master.talenta.education.save', ['id' => $model->id]) }}" method="POST"
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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tingkat</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tingkat" id="tingkat"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Tingkat" value="{{ old('tingkat', $model->tingkat) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Pendidikan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama" id="nama"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Pendidikan" value="{{ old('nama', $model->nama) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lulus</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tgl_lulus" id="tgl_lulus"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="DD/MM/YYYY" value="{{ old('tgl_lulus', $model->tgl_lulus) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Foto Ijazah</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline " data-kt-image-input="true"
                                    style="background-image: url('https://via.placeholder.com/125')"
                                    id="image-input-avatar-modal">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url('{{ $model->foto_ijazah ? asset('storage/ijazah/' . $model->foto_ijazah) : 'https://via.placeholder.com/150' }}')">
                                    </div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="foto_ijazah" accept=".png, .jpg, .jpeg" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Ijazah URL</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="ijazah_url" id="ijazah_url"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Ijazah URL" value="{{ old('ijazah_url', $model->ijazah_url) }}" />
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
