@extends('layouts/dashboard')
@section('title',($model->id ? 'Sunting' : 'Tambah').' Talenta' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Talenta</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('data-master.talenta.save') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
              <!--begin::Image input-->
              <div class="image-input image-input-outline " data-kt-image-input="true"
                   style="background-image: url('https://via.placeholder.com/125')" id="image-input-avatar-modal">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px"
                     style="background-image: url('{{ $model->foto_talenta ? asset('storage/talenta/'. $model->foto_talenta) : 'https://via.placeholder.com/150'}}')"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                  <i class="bi bi-pencil-fill fs-7"></i>
                  <!--begin::Inputs-->
                  <input type="file" name="foto_talenta" accept=".png, .jpg, .jpeg" />
                  <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
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
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Talenta</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="nama_talenta" id="nama_talenta" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Talenta" value="{{ old('nama_talenta', $model->nama_talenta) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">NIK</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="nik" id="nik" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="NIK" value="{{ old('nik', $model->nik) }}" />
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
                    @foreach($bidang as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('bidang_id', $model->bidang_id) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategori Talenta</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="level_talenta_id" id="level_talenta_id" aria-label="Pilih Kategori Talenta"
                          data-placeholder="Pilih Kategori Talenta" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Kategori Talenta</option>
                  </select>
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
          ></x-lembaga-selection>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}"/>
          <a href="{{ route('data-master.talenta.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
          <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
        </div>
      </form>
    </div>
  </div>

@endsection
@section('js')
  <script type="text/javascript">
    const isEdit = {{ $model->id ? 'true':'false' }};
    const levelTalenta = {{ Js::from(\App\Constants\Common::getLevelTalenta()) }};
    const bidangId = {{ $model->bidang_id ?? 'null' }};
    const levelTalentaId = {{ $model->level_talenta_id ?? 'null' }};
    KTUtil.onDOMContentLoaded(function () {
      const form = document.querySelector('#add-form');
      var validator = FormValidation.formValidation(
        form,
        {
          fields: {
            foto_talenta: {
              validators: {
                file: {
                  extension: 'jpeg,jpg,png',
                  type: 'image/jpeg,image/png',
                  maxSize: 2097152, // 2048 * 1024
                  message: 'format Foto Talenta tidak valid',
                },
              },
            },
            'nama_talenta': {
              validators: {
                notEmpty: {
                  message: 'Nama Talenta is required'
                },
              }
            },
            'nik': {
              validators: {
                notEmpty: {
                  message: 'NIK is required'
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
      if(bidangId!==null){
        $('#level_talenta_id').empty().append('<option>Pilih Kategori Talenta</option>');
        const levels = getListLevelTalenta(bidangId);
        levels.forEach(function(l){
          $('#level_talenta_id').append(`<option value="${l.id}" ${levelTalentaId == l.id ? 'selected' : ''}>${l.name}</option>`);
        })
      }
      $('#bidang_id').on('change', function(){
        $('#level_talenta_id').empty().append('<option>Pilih Kategori Talenta</option>');
        if($(this).val() != ''){
          const levels = getListLevelTalenta(Number($(this).val()));
          levels.forEach(function(l){
            $('#level_talenta_id').append(`<option value="${l.id}">${l.name}</option>`);
          })
        }
      });
    });
    function getListLevelTalenta(bidangId = null){
      if(bidangId){
        return levelTalenta.filter(function(l){
          return l.bidang_id == bidangId;
        })
      }
      return [];
    }
  </script>
@endsection
