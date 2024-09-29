@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Highlight Talenta')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Highlight Talenta</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('highlight-talenta.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="talenta_id" id="talenta_id" aria-label="Pilih Lembaga"
                                        data-control="select2" data-placeholder="Pilih Talenta"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Talenta</option>
                                        {{-- @foreach ($talenta as $l)
                      <option value="{{ $l->id }}" @selected(old('talenta_id', $model->talenta_id) == $l->id) >{{ $l->nama_talenta }}</option>
                    @endforeach --}}
                                    </select>
                                </div>
                                <a class="form-text text-primary cursor-pointer add-talenta">Klik disini untuk membuat
                                    talenta baru.</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Referensi Penghargaan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="ref_prizes_id" id="ref_prizes_id" aria-label="Pilih Penghargaan"
                                        data-control="select2" data-placeholder="Pilih Penghargaan"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Penghargaan</option>
                                        {{-- @foreach ($ref_prizes as $l)
                                            <option value="{{ $l->id }}" @selected(old('ref_prizes_id', $model->ref_prizes_id) == $l->id)>
                                                {{ $l->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <a class="form-text text-primary cursor-pointer add-ref-prizes">Klik disini untuk membuat
                                    penghargaan baru.</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Perolehan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tahun" id="tahun"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Tahun Perolehan" value="{{ old('tahun', $model->tahun) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="desc_penghargaan" id="desc_penghargaan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Deskripsi">{{ old('desc_penghargaan', $model->desc_penghargaan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Foto Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    @if ($model->foto_penghargaan)
                                        <div class="foto-wrapper mb-3 w-200px">
                                            <img src="{{ asset('storage/penghargaan/' . $model->foto_penghargaan) }}"
                                                class="w-100">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        name="foto_penghargaan" id="foto_penghargaan" />
                                    @if ($model->foto_penghargaan)
                                        <span class="form-text text-muted">Abaikan Bila tidak ingin diubah.</span>
                                    @endif
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
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="bidang_id" id="bidang_id" aria-label="Pilih Bidang"
                                        data-placeholder="Pilih Bidang"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Bidang</option>
                                        @foreach (\App\Constants\Common::getBidang() as $b)
                                            <option value="{{ $b->id }}" @selected(old('bidang_id', $model->bidang_id) == $b->id)>
                                                {{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6 bidang_fokus_id_cont"
                        style="display: {{ $model->id && $model->bidang_id == \App\Constants\Common::BIDANG_RISET_ID ? 'flex' : 'none' }}">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang Fokus</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="bidang_fokus_id" id="bidang_fokus_id" aria-label="Pilih Bidang Fokus"
                                        data-placeholder="Pilih Bidang Fokus"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Bidang Fokus</option>
                                        @foreach (\App\Constants\Common::getBidangFokus() as $b)
                                            <option value="{{ $b->id }}" @selected(old('bidang_fokus_id', $model->bidang_fokus_id) == $b->id)>
                                                {{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-lembaga-selection lembaga-induk-name="lembaga_induk_id" lembaga-unit-name="lembaga_unit_id"
                        lembaga-name="lembaga_id" :init-lembaga-induk-id="$model->lembaga_induk_id" :init-lembaga-unit-id="$model->lembaga_unit_id" :init-lembaga-id="$model->lembaga_id"
                        :with-add="true"></x-lembaga-selection>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('highlight-talenta.index') }}"
                        class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <x-forms.create-talenta />
    <x-forms.create-ref-prizes />
@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $model->id ? 'true' : 'false' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        foto_penghargaan: {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 2097152, // 2048 * 1024
                                    message: 'format Foto Talenta tidak valid',
                                },
                            },
                        },
                        'talenta_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Nama Talenta is required'
                                },
                            }
                        },
                        'ref_prizes_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Referensi Penghargaan is required'
                                },
                            }
                        },
                        'tahun': {
                            validators: {
                                notEmpty: {
                                    message: 'Tahun Perolehan is required'
                                },
                            }
                        },
                        'bidang_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Bidang is required'
                                },
                            }
                        },
                        'desc_penghargaan': {
                            validators: {
                                notEmpty: {
                                    message: 'Deskripsi is required'
                                },
                            }
                        },
                        'lembaga_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Direktorat/Jurusan is required'
                                },
                            }
                        },
                        'lembaga_induk_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Lembaga Induk is required'
                                },
                            }
                        },
                        'lembaga_unit_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Pusat/Unit/Fakultas is required'
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

        KTUtil.onDOMContentLoaded(function() {
            $('#bidang_id').on('change', function() {
                if ($(this).val() == 1) {
                    $('.bidang_fokus_id_cont').show();
                } else {
                    $('.bidang_fokus_id_cont').hide();
                }
            })
            registerModalTalentaAction(
                $('.add-talenta'),
                $('#talenta_id')
            )
            registerModalRefPenghargaanAction(
                $('.add-ref-prizes'),
                $('#ref_prizes_id')
            )
        })
    </script>
@endsection
