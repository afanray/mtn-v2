@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Sinergi Data')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Sinergi Data</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('data-master.sinergi-data.save') }}" method="POST">
                <div class="card-body border-top p-9">
                    <x-lembaga-selection lembaga-induk-name="lembaga_induk_id" lembaga-unit-name="lembaga_unit_id"
                        lembaga-name="lembaga_id" :init-lembaga-induk-id="$model->lembaga_induk_id" :init-lembaga-unit-id="$model->lembaga_unit_id" :init-lembaga-id="$model->lembaga_id"
                        :with-add="false"></x-lembaga-selection>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Produsen Data</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="produsen_data" id="produsen_data"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Produsen Data"
                                        value="{{ old('produsen_data', $model->produsen_data) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Data</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="jenis_data" id="jenis_data"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Jenis Data" value="{{ old('jenis_data', $model->jenis_data) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Satuan Data</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="satuan" id="satuan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Satuan Data" value="{{ old('satuan', $model->satuan) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Base URL</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="base_url" id="base_url"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Base URL" value="{{ old('base_url', $model->base_url) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Key</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="key" id="key"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Key" value="{{ old('key', $model->key) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Method</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="method" id="method"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Method" value="{{ old('method', $model->method) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Parameter</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="parameter" id="parameter"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Parameter" value="{{ old('parameter', $model->parameter) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('data-master.sinergi-data.index') }}"
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
        var lembagaLevel = {{ $model->level ?? 0 }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'lembaga_induk_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Lembaga induk is required'
                                },
                            }
                        },
                        'lembaga_unit_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Lembaga unit is required'
                                },
                            }
                        },
                        'lembaga_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Lembaga is required'
                                },
                            }
                        },
                        'produsen_data': {
                            validators: {
                                notEmpty: {
                                    message: 'Proudsen data is required'
                                },
                            }
                        },
                        'jenis_data': {
                            validators: {
                                notEmpty: {
                                    message: 'Jenis data is required'
                                },
                            }
                        },
                        'base_url': {
                            validators: {
                                notEmpty: {
                                    message: 'Base url is required'
                                },
                            }
                        },
                        'key': {
                            validators: {
                                notEmpty: {
                                    message: 'Key is required'
                                },
                            }
                        },
                        'method': {
                            validators: {
                                notEmpty: {
                                    message: 'Method is required'
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
            if (lembagaLevel !== 1 && lembagaLevel != 0) {
                validator.addField('lembaga_induk_id', {
                    validators: {
                        notEmpty: {
                            message: 'Lembaga Induk is required',
                        },
                    },
                })
            }
            if (lembagaLevel === 3) {
                validator.addField('lembaga_unit_id', {
                    validators: {
                        notEmpty: {
                            message: 'Pusat/Unit/Fakultas is required',
                        },
                    },
                })
            }
            $('#level').on('change', function() {
                if (lembagaLevel !== 1 && lembagaLevel != 0) {
                    validator.removeField('lembaga_induk_id')
                }
                if (lembagaLevel === 3) {
                    validator.removeField('lembaga_unit_id')
                }
                const level = Number($(this).val());
                lembagaLevel = level;
                $('.lembaga-induk-container').hide();
                $('.lembaga-unit-container').hide();
                if (level !== 1 && level != 0) {
                    $('.lembaga-induk-container').show();
                    validator.addField('lembaga_induk_id', {
                        validators: {
                            notEmpty: {
                                message: 'Lembaga Induk is required',
                            },
                        },
                    })
                }
                if (level === 3) {
                    $('.lembaga-unit-container').show();
                    validator.addField('lembaga_unit_id', {
                        validators: {
                            notEmpty: {
                                message: 'Pusat/Unit/Fakultas is required',
                            },
                        },
                    })
                }

            })
            $('#lembaga_induk_id').on('change', function() {
                const parent_id = $(this).val();
                $.ajax({
                    url: '/dashboard/common/get-lembaga-unit',
                    data: {
                        parent_id
                    },
                    dataType: 'json',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $('#lembaga_unit_id').select2('destroy');
                        $('#lembaga_unit_id').empty();
                        $('#lembaga_unit_id').append(
                            `<option value="" selected>Pilih Pusat/Unit/Fakultas</option>`);
                        $.each(res.data, function(index, item) {
                            $('#lembaga_unit_id').append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                        $('#lembaga_unit_id').select2();
                    }
                })
            })
        });
    </script>
@endsection
