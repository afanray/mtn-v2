@extends('layouts/dashboard')
@section('title',($model->id ? 'Sunting' : 'Tambah').' Anugrah Talenta' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Anugrah Talenta</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('anugrah-talenta.save') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Kegiatan</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Kegiatan" value="{{ old('nama_kegiatan', $model->nama_kegiatan) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Pelaksanaan</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="tahun_pelaksanaan" id="tahun_pelaksanaan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Tahun Pelaksanaan" value="{{ old('tahun_pelaksanaan', $model->tahun_pelaksanaan) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <textarea name="desc_kegiatan" id="desc_kegiatan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Deskripsi">{{ old('desc_kegiatan', $model->desc_kegiatan) }}</textarea>
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
                      <img src="{{ asset('storage/anugrah_talenta/'. $model->foto) }}" class="w-100">
                    </div>
                  @endif
                  <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="foto" id="foto"/>
                  @if($model->foto)
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
                  <input type="text" name="link_web" id="link_web" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
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
                          data-placeholder="Pilih Bidang" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Bidang</option>
                    @foreach(\App\Constants\Common::getBidang() as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('bidang_id', $model->bidang_id) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tingkat Rekognisi</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="tingkat_rekognisi" id="tingkat_rekognisi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Tingkat Rekognisi" value="{{ old('tingkat_rekognisi', $model->tingkat_rekognisi) }}" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}"/>
          <a href="{{ route('anugrah-talenta.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
          <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
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
            'nama_kegiatan': {
              validators: {
                notEmpty: {
                  message: 'Nama Kegiatan is required'
                },
              }
            },
            'tahun_pelaksanaan': {
              validators: {
                notEmpty: {
                  message: 'Tahun Pelaksanaan is required'
                },
              }
            },
            'desc_kegiatan': {
              validators: {
                notEmpty: {
                  message: 'Deskripsi is required'
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
