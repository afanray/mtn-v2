@extends('layouts/dashboard')
@section('title',($model->id ? (!$viewOnly ? 'Sunting' : 'Detil') : 'Tambah').' Praktik Baik' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? (!$viewOnly ? 'Sunting' : 'Detil') : 'Tambah' }} Praktik Baik</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('praktik-baik.save') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Program</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="nama_program" id="nama_program" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Program" value="{{ old('nama_program', $model->nama_program) }}" @disabled($viewOnly)/>
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
                          data-placeholder="Pilih Bidang" class="form-select form-select-solid form-select-lg" @disabled($viewOnly || !\App\Models\User::isSuperAdmin())>
                    <option value="">Pilih Bidang</option>
                    @foreach(\App\Constants\Common::getBidang() as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('bidang_id', (\App\Models\User::isSuperAdmin() ? $model->bidang_id : \Auth::user()->bidang_id)) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Foto</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  @if($model->foto)
                    <div class="foto-wrapper mb-3 w-200px">
                      <img src="{{ asset('storage/praktik_baik/'. $model->foto) }}" class="w-100">
                    </div>
                  @endif
                  @if(!$viewOnly)
                    <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="foto" id="foto"/>
                  @endif
                  @if($model->foto && !$viewOnly)
                    <span class="form-text text-muted">Abaikan Bila tidak ingin diubah.</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lokasi dan Waktu</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="lokasi_waktu" id="lokasi_waktu" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Lokasi dan Waktu" value="{{ old('lokasi_waktu', $model->lokasi_waktu) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi Program</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row mb-6">
                  <label for="latar_belakang" class="form-label">Latar Belakang</label>
                  <textarea name="latar_belakang" id="latar_belakang" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Latar Belakang" rows="5" @disabled($viewOnly)>{{ old('latar_belakang', $model->latar_belakang) }}</textarea>
                </div>
                <div class="col-12 fv-row">
                  <label for="tujuan" class="form-label">Tujuan</label>
                  <textarea name="tujuan" id="tujuan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Tujuan" rows="5" @disabled($viewOnly)>{{ old('tujuan', $model->tujuan) }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Luaran, Manfaat dan Dampak</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <textarea name="luaran_manfaat_dampak" id="luaran_manfaat_dampak" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Luaran, Manfaat dan Dampak" rows="5" @disabled($viewOnly)>{{ old('luaran_manfaat_dampak', $model->luaran_manfaat_dampak) }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pembelajaran</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="pembelajaran" id="pembelajaran" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Pembelajaran" value="{{ old('pembelajaran', $model->pembelajaran) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kolaborasi Multipihak</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="kolaborasi" id="kolaborasi"
                            placeholder="Kolaborasi Multipihak" @disabled($viewOnly) rows="5"
                  >{{ old('kolaborasi', $model->kolaborasi) }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kontribusi terhadap GEDSI (Kesetaraan Gender, Disabilitas dan Inklusi Sosial)</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="kontribusi" id="kontribusi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Kontribusi terhadap GEDSI" value="{{ old('kontribusi', $model->kontribusi) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Keberlanjutan Program</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="keberlanjutan_program" id="keberlanjutan_program"
                            placeholder="Keberlanjutan Program" @disabled($viewOnly) rows="5"
                  >{{ old('keberlanjutan_program', $model->keberlanjutan_program) }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6"><i>Useful</i> Link</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="link" id="link" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Useful Link" value="{{ old('link', $model->link) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <x-lembaga-selection
            lembaga-induk-name="lembaga_induk_id"
            lembaga-unit-name="lembaga_unit_id"
            lembaga-name="lembaga_id"
            :init-lembaga-induk-id="$model->lembaga_induk_id"
            :init-lembaga-unit-id="$model->lembaga_unit_id"
            :init-lembaga-id="$model->lembaga_id"
            :with-add="true"
            :view-only="$viewOnly"
          ></x-lembaga-selection>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Pengirim</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Pengirim" value="{{ old('nama_pengirim', $model->nama_pengirim) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Pengirim</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="email" id="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Email Pengirim" value="{{ old('email', $model->email) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">No HP Pengirim</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="no_hp" id="no_hp" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="No HP Pengirim" value="{{ old('no_hp', $model->no_hp) }}" @disabled($viewOnly)/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" @disabled($viewOnly)/>
          <a href="{{ route('praktik-baik.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
          @if(!$viewOnly)
            <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
          @else
            <button type="button" class="btn btn-info me-2" id="btn-validate">Validasi</button>
          @endif

        </div>
      </form>
    </div>
  </div>

@endsection
@section('js')
  <script type="text/javascript">
    const isEdit = {{ $model->id ? 'true':'false' }};
    KTUtil.onDOMContentLoaded(function () {
      const form = document.querySelector('#add-form');
      var validator = FormValidation.formValidation(
        form,
        {
          fields: {
            'nama_program': {
              validators: {
                notEmpty: {
                  message: 'Nama Program is required'
                },
              }
            },
            foto: {
              validators: {
                notEmpty: {
                  message: 'Foto is required'
                },
                file: {
                  extension: 'jpeg,jpg,png',
                  type: 'image/jpeg,image/png',
                  maxSize: 2097152, // 2048 * 1024
                  message: 'format Foto tidak valid',
                },
              },
            },
            'lokasi_waktu': {
              validators: {
                notEmpty: {
                  message: 'Lokasi dan Waktu is required'
                },
              }
            },
            'latar_belakang': {
              validators: {
                notEmpty: {
                  message: 'Latar Belakang is required'
                },
              }
            },
            'tujuan': {
              validators: {
                notEmpty: {
                  message: 'Tujuan is required'
                },
              }
            },
            'luaran_manfaat_dampak': {
              validators: {
                notEmpty: {
                  message: 'Luaran, Manfaat dan Dampak is required'
                },
              }
            },
            'pembelajaran': {
              validators: {
                notEmpty: {
                  message: 'Pembelajaran is required'
                },
              }
            },
            'kolaborasi': {
              validators: {
                notEmpty: {
                  message: 'Kolaborasi Multipihak is required'
                },
              }
            },
            'kontribusi': {
              validators: {
                notEmpty: {
                  message: 'Kontribusi terhadap GEDSI is required'
                },
              }
            },
            'keberlanjutan_program': {
              validators: {
                notEmpty: {
                  message: 'Keberlanjutan Program is required'
                },
              }
            },
            'link': {
              validators: {
                notEmpty: {
                  message: 'Useful Link is required'
                },
              }
            },
            'nama_pengirim': {
              validators: {
                notEmpty: {
                  message: 'Nama Pengirim is required'
                },
              }
            },
            'email': {
              validators: {
                notEmpty: {
                  message: 'Email Pengirim is required'
                },
                emailAddress: {
                  message: 'The value is not a valid email address'
                },
              }
            },
            'no_hp': {
              validators: {
                notEmpty: {
                  message: 'No HP Pengirim is required'
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
  </script>
@endsection
