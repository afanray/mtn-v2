@extends('layouts/dashboard')
@section('title',($model->id ? 'Sunting' : 'Tambah').' Pustaka' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Pustaka</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('pustaka.save') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Judul</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="title" id="title" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Judul" value="{{ old('title', $model->title) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tipe</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="type" id="type" aria-label="Pilih Tipe"
                          data-placeholder="Pilih Tipe" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Tipe</option>
                    @foreach(\App\Constants\Common::getTypePustaka() as $b)
                      <option
                        value="{{ $b['value'] }}" @selected(old('type', $model->type) == $b['value'])>{{ $b['label'] }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="non-file {{ $model->id && $model->type != \App\Constants\Common::PUSTAKA_VIDEO ? '':'d-none' }}">
            <div class="row mb-6">
              <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-12 fv-row">
                    <textarea name="description" id="description" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Deskripsi">{{ old('description', $model->description) }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-lg-4 col-form-label required fw-semibold fs-6">Link</label>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-12 fv-row">
                    <input type="text" name="link" id="link" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                           placeholder="Link" value="{{ old('link', $model->link) }}" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-lg-4 col-form-label required fw-semibold fs-6">Gambar</label>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-12 fv-row">
                    @if($model->image)
                      <div class="foto-wrapper mb-3 w-200px">
                        <img src="{{ asset('storage/pustaka/'. $model->image) }}" class="w-100">
                      </div>
                    @endif
                    <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="image" id="image"/>
                    @if($model->image)
                      <span class="form-text text-muted">Abaikan Bila tidak ingin diubah.</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="with-file {{ $model->id && $model->type == \App\Constants\Common::PUSTAKA_VIDEO ? '':'d-none' }}">
            <div class="row mb-6">
              <label class="col-lg-4 col-form-label required fw-semibold fs-6">Video</label>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-12 fv-row">
                    @if($model->link)
                      <div class="foto-wrapper mb-3 w-200px">
                        sssss
                      </div>
                    @endif
                    <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="file" id="file"/>
                    @if($model->link)
                      <span class="form-text text-muted">Abaikan Bila tidak ingin diubah.</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}"/>
          <a href="{{ route('pustaka.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
          <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
        </div>
      </form>
    </div>
  </div>

@endsection
@section('js')
  <script type="text/javascript">
    const isEdit = {{ $model->id ? 'true':'false' }};
    const type = {{ $model->type ?? 'null' }};
    KTUtil.onDOMContentLoaded(function () {
      const form = document.querySelector('#add-form');
      var validator = FormValidation.formValidation(
        form,
        {
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
                }:{})
              },
            },
            'file': {
              validators: {
                file: {
                  extension: 'mp4,webm,ogg',
                  type: 'video/mp4,video/webm,video/ogg',
                  maxSize: 52428800, // 2048 * 1024
                  message: 'format Video tidak valid',
                },
                ...(!isEdit ? {
                  notEmpty: {
                    message: 'Video is required'
                  }
                }:{})
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
      if(type!=null){
        if(type === 3){
          validator.disableValidator('description');
          validator.disableValidator('link');
          validator.disableValidator('image');
        }else{
          validator.disableValidator('file');
        }
      }
      $('#type').on('change', function(){
        const val = Number($(this).val());
        if(!$('.non-file').hasClass('d-none')){
          $('.non-file').addClass('d-none');
        }
        if(!$('.with-file').hasClass('d-none')){
          $('.with-file').addClass('d-none');
        }
        validator.disableValidator('description');
        validator.disableValidator('link');
        validator.disableValidator('image');
        validator.disableValidator('file');
        if(val === 3){
          $('.with-file').removeClass('d-none')
          validator.enableValidator('file');
        }else if([1,2,4].includes(val)){
          $('.non-file').removeClass('d-none')
          validator.enableValidator('description');
          validator.enableValidator('link');
          validator.enableValidator('image');
        }
      });
    });
  </script>
@endsection
