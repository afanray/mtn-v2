@extends('layouts/dashboard')
@section('title',($model->id ? 'Sunting' : 'Tambah').' Referensi Penghargaan' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Referensi Penghargaan</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('data-master.penghargaan.save') }}" method="POST">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Referensi</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="name" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Referensi" value="{{ old('name', $model->name) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Frekuensi</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="frequency" id="frequency" aria-label="Pilih Frekuensi"
                          data-placeholder="Pilih Frekuensi" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Frekuensi</option>
                    @foreach(\App\Constants\Common::FREQ_LIST as $b)
                      <option
                        value="{{ $b }}" @selected(old('frequency', $model->frequency) == $b)>{{ $b }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Average</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="average" id="average" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Average" value="{{ old('average', $model->average) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tingkat</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="tingkat" id="tingkat" aria-label="Pilih Tingkat"
                          data-placeholder="Pilih Tingkat" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Tingkat</option>
                    @foreach(\App\Constants\Common::getTingkat() as $b)
                      <option
                        value="{{ $b['value'] }}" @selected(old('tingkat', $model->tingkat) == $b['value'])>{{ $b['label'] }}</option>
                    @endforeach
                  </select>
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
          <div class="row mb-6 bidang_fokus_id_cont" style="display: none">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang Fokus</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="bidang_fokus_id" id="bidang_fokus_id" aria-label="Pilih Bidang Fokus"
                          data-placeholder="Pilih Bidang Fokus" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Bidang Fokus</option>
                    @foreach(\App\Constants\Common::getBidangFokus() as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('bidang_fokus_id', $model->bidang_fokus_id) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
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
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}"/>
          <a href="{{ route('data-master.penghargaan.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
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
            'name': {
              validators: {
                notEmpty: {
                  message: 'Nama Referensi is required'
                },
              }
            },
            'frequency': {
              validators: {
                notEmpty: {
                  message: 'Frekuensi is required'
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
            'average': {
              validators: {
                notEmpty: {
                  message: 'Average is required'
                },
              }
            },
            'tingkat': {
              validators: {
                notEmpty: {
                  message: 'Tingkat is required'
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
      $('#bidang_id').on('change',function (){
        console.log($(this).val())
        if($(this).val() == 1){
          $('.bidang_fokus_id_cont').show();
        }else{
          $('.bidang_fokus_id_cont').hide();
        }
      })
    });
  </script>
@endsection
