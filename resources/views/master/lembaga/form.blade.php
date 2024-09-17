@extends('layouts/dashboard')
@section('title',($model->id ? 'Sunting' : 'Tambah').' Lembaga' )
@section('body')
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Lembaga</h3>
      </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
      <form id='add-form' class="form" action="{{ route('data-master.lembaga.save') }}" method="POST">
        <div class="card-body border-top p-9">
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tipe Lembaga</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="level" id="level" aria-label="Pilih Tipe Lembaga"
                          data-placeholder="Pilih Tipe Lembaga" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Tipe Lembaga</option>
                    <option
                      value="1" @selected(old('level', $model->level) == 1)>Lembaga Induk</option>
                    <option
                      value="2" @selected(old('level', $model->level) == 2)>Pusat/Unit/Fakultas</option>
                    <option
                      value="3" @selected(old('level', $model->level) == 3)>Direktorat/Jurusan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6 lembaga-induk-container" style="{{ ($model->level ?? 0) == 1 || ($model->level ?? 0) == 0 ?'display: none':''}}">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lembaga Induk</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="lembaga_induk_id" id="lembaga_induk_id" aria-label="Pilih Lembaga Induk" data-control="select2"
                          data-placeholder="Pilih Lembaga Induk" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Lembaga Induk</option>
                    @foreach($lembagaInduk as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('lembaga_induk_id', $lembagaIndukId) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6 lembaga-unit-container" style="{{ $model->level!= 3 ?'display: none':''}}">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pusat/Unit/Fakultas</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <select name="lembaga_unit_id" id="lembaga_unit_id" aria-label="Pilih Pusat/Unit/Fakultas" data-control="select2"
                          data-placeholder="Pilih Pusat/Unit/Fakultas" class="form-select form-select-solid form-select-lg">
                    <option value="">Pilih Pusat/Unit/Fakultas</option>
                    @foreach($lembagaUnit as $b)
                      <option
                        value="{{ $b->id }}" @selected(old('lembaga_unit_id', $lembagaUnitId) == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lembaga</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <input type="text" name="name" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Nama Lembaga" value="{{ old('name', $model->name) }}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12 fv-row">
                  <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="5"
                         placeholder="Alamat" name="address" id="address" >{{ old('address', $model->address) }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <x-address-selection
            province-name="province_id"
            regency-name="regency_id"
            :init-province-id="$model->province_id"
            :init-regency-id="$model->regency_id"
          ></x-address-selection>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}"/>
          <a href="{{ route('data-master.lembaga.index') }}"  class="btn btn-light btn-active-light-primary me-2">Batal</a>
          <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
        </div>
      </form>
    </div>
  </div>

@endsection
@section('js')
  <script type="text/javascript">
    const isEdit = {{ $model->id ? 'true':'false' }};
    var lembagaLevel = {{ $model->level ?? 0 }};
    KTUtil.onDOMContentLoaded(function () {
      const form = document.querySelector('#add-form');
      var validator = FormValidation.formValidation(
        form,
        {
          fields: {
            'level': {
              validators: {
                notEmpty: {
                  message: 'Tipe Lembaga is required'
                },
              }
            },
            'name': {
              validators: {
                notEmpty: {
                  message: 'Nama Lembaga is required'
                },
              }
            },
            'address': {
              validators: {
                notEmpty: {
                  message: 'Alamat Lembaga is required'
                },
              }
            },
            'province_id': {
              validators: {
                notEmpty: {
                  message: 'Provinsi is required'
                },
              }
            },
            'regency_id': {
              validators: {
                notEmpty: {
                  message: 'Kabupaten/Kota is required'
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
      if(lembagaLevel !== 1 && lembagaLevel != 0){
        validator.addField('lembaga_induk_id',{
          validators: {
            notEmpty: {
              message: 'Lembaga Induk is required',
            },
          },
        })
      }
      if(lembagaLevel === 3){
        validator.addField('lembaga_unit_id',{
          validators: {
            notEmpty: {
              message: 'Pusat/Unit/Fakultas is required',
            },
          },
        })
      }
      $('#level').on('change', function(){
        if(lembagaLevel !== 1 && lembagaLevel != 0){
          validator.removeField('lembaga_induk_id')
        }
        if(lembagaLevel === 3){
          validator.removeField('lembaga_unit_id')
        }
        const level = Number($(this).val());
        lembagaLevel = level;
        $('.lembaga-induk-container').hide();
        $('.lembaga-unit-container').hide();
        if(level !== 1 && level != 0){
          $('.lembaga-induk-container').show();
          validator.addField('lembaga_induk_id',{
            validators: {
              notEmpty: {
                message: 'Lembaga Induk is required',
              },
            },
          })
        }
        if(level === 3){
          $('.lembaga-unit-container').show();
          validator.addField('lembaga_unit_id',{
            validators: {
              notEmpty: {
                message: 'Pusat/Unit/Fakultas is required',
              },
            },
          })
        }

      })
      $('#lembaga_induk_id').on('change', function(){
        const parent_id = $(this).val();
        $.ajax({
          url: '/dashboard/common/get-lembaga-unit',
          data: { parent_id },
          dataType: 'json',
          type: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (res){
            $('#lembaga_unit_id').select2('destroy');
            $('#lembaga_unit_id').empty();
            $('#lembaga_unit_id').append(`<option value="" selected>Pilih Pusat/Unit/Fakultas</option>`);
            $.each(res.data, function(index, item){
              $('#lembaga_unit_id').append(`<option value="${item.id}">${item.name}</option>`);
            })
            $('#lembaga_unit_id').select2();
          }
        })
      })
    });
  </script>
@endsection
