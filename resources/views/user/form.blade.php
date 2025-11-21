@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Pengguna')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Penguna</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('user.save') }}" method="POST">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama" value="{{ old('name', $model->name) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="username" id="username"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Username" value="{{ old('username', $model->username) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="email" id="email"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Email" value="{{ old('email', $model->email) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!$model->id)
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Password" value="{{ old('password') }}" />
                                        @if ($model->id)
                                            <span class="form-text text-muted">Abaikan bila password tidak ingin
                                                diganti.</span>
                                        @endif
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <x-lembaga-selection lembaga-induk-name="lembaga_induk_id" lembaga-unit-name="lembaga_unit_id"
                        lembaga-name="lembaga_id" :init-lembaga-induk-id="$model->lembaga_induk_id" :init-lembaga-unit-id="$model->lembaga_unit_id" :init-lembaga-id="$model->lembaga_id"
                        :with-add="true"></x-lembaga-selection>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="bidang_id" id="bidang_id" aria-label="Pilih Bidang" data-control="select2"
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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Role</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="role" id="role" aria-label="Pilih Role" data-control="select2"
                                        data-placeholder="Pilih Role" class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Role</option>
                                        <option value="operator" @selected(old('role', $model->role) == 'operator')>Operator</option>
                                        <option value="pic_direktorat" @selected(old('role', $model->role) == 'pic_direktorat')>PIC
                                            Direktorat
                                        </option>
                                        <option value="pic_kl" @selected(old('role', $model->role) == 'pic_kl')>PIC
                                            Kementerian Lembaga
                                        </option>
                                        <option value="pic_pemda" @selected(old('role', $model->role) == 'pic_pemda')>PIC
                                            Pemerintah Daerah
                                        </option>

                                        <option value="pic_nonpemerintah" @selected(old('role', $model->role) == 'pic_nonpemerintah')>PIC
                                            Non Pemerintah
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div @class([
                        'row',
                        'mb-6',
                        'wali-data-container',
                        'd-none' => !$model->id || ($model->id && $model->role !== 'operator'),
                    ])>
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Wali Data</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    @foreach ($inputs as $i)
                                        <div class="form-check mb-5 form-check-{{ $i->bidang_id }}"
                                            style="display: {{ $model->id && $model->bidang_id === $i->bidang_id ? 'block' : 'none' }}">
                                            <input class="form-check-input check-{{ $i->bidang_id }}" type="checkbox"
                                                name="inputs[{{ $i->bidang_id }}][]" value="{{ $i->id }}"
                                                id="input-{{ $i->id }}" @checked(isset($inputs_user[$i->id])) />
                                            <label class="form-check-label" for="input-{{ $i->id }}">
                                                {{ $i->label }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('user.index') }}" class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $model->id ? 'true' : 'false' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'name': {
                            validators: {
                                notEmpty: {
                                    message: 'Name is required'
                                },
                            }
                        },
                        'username': {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                },
                            }
                        },
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'Email is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                            }
                        },
                        'role': {
                            validators: {
                                notEmpty: {
                                    message: 'Role is required'
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
                        'bidang_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Bidang is required'
                                },
                            }
                        },
                        ...(!isEdit ? {
                            'password': {
                                validators: {
                                    notEmpty: {
                                        message: 'Password is required'
                                    },
                                }
                            }
                        } : {})
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
            $(form.querySelector('[name="lembaga_id"]')).on('change', function() {
                // Revalidate the color field when an option is chosen
                validator.revalidateField('lembaga_id')
            })
            $(form.querySelector('[name="bidang_id"]')).on('change', function() {
                // Revalidate the color field when an option is chosen
                validator.revalidateField('bidang_id')
            })
            $(form.querySelector('[name="role"]')).on('change', function() {
                // Revalidate the color field when an option is chosen
                validator.revalidateField('role')
            })
            $('#role').on('change', function() {
                const val = $(this).val();
                if (val === 'operator') {
                    $('.wali-data-container').removeClass('d-none');
                } else {
                    $('.wali-data-container').addClass('d-none')
                }
            })
            $('#bidang_id').on('change', function() {
                $('.form-check').each(function() {
                    $(this).hide();
                })
                const val = Number($(this).val());
                switch (val) {
                    case 1:
                        $('.form-check-1').each(function() {
                            $(this).show();
                        })
                        break;
                    case 2:
                        $('.form-check-2').each(function() {
                            $(this).show();
                        })
                        break;
                    case 3:
                        $('.form-check-3').each(function() {
                            $(this).show();
                        })
                        break;
                }
            })
        });
    </script>
@endsection
