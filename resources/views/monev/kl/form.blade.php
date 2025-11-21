@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Rencana Aksi')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Rencana Aksi</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('monev.kl.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kode</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="kode" id="kode"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Kode" value="{{ old('kode', $model->kode) }}" />
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


                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Arah Kebijakan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="arah_kebijakan" id="arah_kebijakan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Arah Kebijakan" rows="4">{{ old('arah_kebijakan', $model->arah_kebijakan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Strategi Terobosan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="strategi_terobosan" id="strategi_terobosan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Strategi Terobosan"
                                        rows="4">{{ old('strategi_terobosan', $model->strategi_terobosan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Fokus Pelaksanaan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="fokus_pelaksanaan" id="fokus_pelaksanaan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Fokus Pelaksanaan" rows="4">{{ old('fokus_pelaksanaan', $model->fokus_pelaksanaan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kode RO/Komponen/Urusan
                            Daerah</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="kode_ro" id="kode_ro"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="kode RO" value="{{ old('kode_ro', $model->kode_ro) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Rincian Output/Sub
                            Kegiatan/Program/Aktivitas</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="rincian_output" id="rincian_output" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Rincian Output/Sub Kegiatan/Program/Aktivitas" rows="4">{{ old('rincian_output', $model->rincian_output) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Mendukung Alur Pengembangan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="alur_pengembangan" id="alur_pengembangan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Mendukung Alur Pengembangan"
                                        value="{{ old('alur_pengembangan', $model->alur_pengembangan) }}" />
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
                                    <textarea name="realisasi" id="realisasi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Capaian" rows="4">{{ old('realisasi', $model->realisasi) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Satuan</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="satuan" id="satuan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Satuan" value="{{ old('satuan', $model->satuan) }}" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alokasi Anggaran
                            Rp.</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="number" name="alokasi_anggaran" id="alokasi_anggaran"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Alokasi Anggaran Rp."
                                        value="{{ old('alokasi_anggaran', $model->alokasi_anggaran) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Realisasi Anggaran
                            Rp.</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="number" name="realisasi_anggaran" id="realisasi_anggaran"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Realisasi Anggaran Rp."
                                        value="{{ old('realisasi_anggaran', $model->realisasi_anggaran) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lokasi Pelaksanaan
                        </label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="lokasi_pelaksanaan_kegiatan" id="lokasi_pelaksanaan_kegiatan"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Lokasi Pelaksanaan"
                                        rows="4">{{ old('lokasi_pelaksanaan_kegiatan', $model->lokasi_pelaksanaan_kegiatan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sumber Dana</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="sumber_dana" id="sumber_dana"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Sumber Dana"
                                        value="{{ old('sumber_dana', $model->sumber_dana) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Instansi Pengampu</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="instansi_pengampu" id="instansi_pengampu"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Instansi Pengampu"
                                        value="{{ old('instansi_pengampu', $model->instansi_pengampu) }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                        <a href="{{ route('monev.kl.index') }}"
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
        const type = {{ $model->type ?? 'null' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'title': {
                            validators: {
                                notEmpty: {
                                    message: 'Judul is required'
                                },
                            }
                        },
                        'type': {
                            validators: {
                                notEmpty: {
                                    message: 'Tipe is required'
                                },
                            }
                        },
                        'description': {
                            validators: {
                                notEmpty: {
                                    message: 'Deskripsi is required'
                                },
                            }
                        },
                        'link': {
                            validators: {
                                notEmpty: {
                                    message: 'Link is required'
                                },
                            }
                        },
                        'image': {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 2097152, // 2048 * 1024
                                    message: 'format Gambar tidak valid',
                                },
                                ...(!isEdit ? {
                                    notEmpty: {
                                        message: 'Gambar is required'
                                    }
                                } : {})
                            },
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
            if (type != null) {
                if (type === 3) {
                    validator.disableValidator('description');
                    validator.disableValidator('link');
                    validator.disableValidator('image');
                } else {
                    validator.disableValidator('file');
                }
            }
            $('#type').on('change', function() {
                const val = Number($(this).val());
                if (!$('.non-file').hasClass('d-none')) {
                    $('.non-file').addClass('d-none');
                }
                if (!$('.with-file').hasClass('d-none')) {
                    $('.with-file').addClass('d-none');
                }
                validator.disableValidator('description');
                validator.disableValidator('link');
                validator.disableValidator('image');
                validator.disableValidator('file');
                if (val === 3) {
                    $('.with-file').removeClass('d-none')
                    validator.enableValidator('file');
                } else if ([1, 2, 4].includes(val)) {
                    $('.non-file').removeClass('d-none')
                    validator.enableValidator('description');
                    validator.enableValidator('link');
                    validator.enableValidator('image');
                }
            });
        });
    </script>
@endsection
