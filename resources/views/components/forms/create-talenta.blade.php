@push('modal')
  <div class="modal fade" tabindex="-1" id="modal-talenta-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Talenta</h5>
          <!--begin::Close-->
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
          </div>
          <!--end::Close-->
        </div>

        <div class="modal-body" id="modal-talenta-form-body">
          <form id='add-talenta-form' class="form"  method="POST" action="{{ route('common.talenta-store') }}" enctype="multipart/form-data">
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
                       style="background-image: url('https://via.placeholder.com/150')"></div>
                  <!--end::Preview existing avatar-->
                  <!--begin::Label-->
                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                         data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="modal_foto_talenta" accept=".png, .jpg, .jpeg" />
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
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Nama Talenta</label>
              <input type="text" name="modal_nama_talenta" id="modal_nama_talenta" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                     placeholder="Nama Talenta"  />
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">NIK</label>
              <input type="text" name="modal_nik" id="modal_nik" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                     placeholder="NIK"  />
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Bidang</label>
              <select name="modal_bidang_id" id="modal_bidang_id" aria-label="Pilih Bidang"
                      data-placeholder="Pilih Bidang" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Bidang</option>
                @foreach(\App\Constants\Common::getBidang() as $b)
                  <option
                    value="{{ $b->id }}" >{{ $b->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Kategori Talenta</label>
              <select name="modal_level_talenta_id" id="modal_level_talenta_id" aria-label="Pilih Kategori Talenta"
                      data-placeholder="Pilih Kategori Talenta" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Kategori Talenta</option>
              </select>
            </div>
            <x-lembaga-selection
              lembaga-induk-name="t_lembaga_induk_id"
              lembaga-unit-name="t_lembaga_unit_id"
              lembaga-name="t_lembaga_id"
              layout="vertical"
              :with-select2="false"
            ></x-lembaga-selection>
            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary btn-save-talenta">Simpan</button>
        </div>
      </div>
    </div>
  </div>
@endpush
@push('scripts')
  <script type="text/javascript">
    var selectTalentaElm = null;
    var triggerRefTalentaElm = null;
    const levelTalenta = {{ Js::from(\App\Constants\Common::getLevelTalenta()) }};
    const modalTalenta = new bootstrap.Modal(document.getElementById('modal-talenta-form'))
    const formTalentaElm = $('#add-talenta-form');
    const blockUITalentaForm = new KTBlockUI(document.getElementById('modal-talenta-form-body'), {
      message: 'simpan data...',
    })
    function registerModalTalentaAction(triggerElm,selectElm){
      triggerTalentaElm = triggerElm;
      selectTalentaElm = selectElm;
      triggerTalentaElm.on('click',function(){
        modalTalenta.show()
      })
    }
    function getListLevelTalenta(bidangId = null){
      if(bidangId){
        return levelTalenta.filter(function(l){
          return l.bidang_id == bidangId;
        })
      }
      return [];
    }
    var talentaValidator = FormValidation.formValidation(
      document.getElementById('add-talenta-form'),
      {
        fields: {
          modal_foto_talenta: {
            validators: {
              file: {
                extension: 'jpeg,jpg,png',
                type: 'image/jpeg,image/png',
                maxSize: 2097152, // 2048 * 1024
                message: 'format Foto Talenta tidak valid',
              },
            },
          },
          'modal_nama_talenta': {
            validators: {
              notEmpty: {
                message: 'Nama Talenta is required'
              },
            }
          },
          'modal_nik': {
            validators: {
              notEmpty: {
                message: 'NIK is required'
              },
            }
          },
          'modal_bidang_id': {
            validators: {
              notEmpty: {
                message: 'Bidang is required'
              },
            }
          },
          't_lembaga_id': {
            validators: {
              notEmpty: {
                message: 'Direktorat/Jurusan is required'
              },
            }
          },
          't_lembaga_induk_id': {
            validators: {
              notEmpty: {
                message: 'Lembaga Induk is required'
              },
            }
          },
          't_lembaga_unit_id': {
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
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: '.fv-row',
            eleInvalidClass: '',
            eleValidClass: ''
          })
        }
      }
    ).on('core.form.valid', function () {
      blockUITalentaForm.block();
      const formData = new FormData($('#add-talenta-form')[0]);
      $.ajax({
        url: formTalentaElm.attr('action'),
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        type: 'post',
        success: function (res){
          selectTalentaElm.select2('destroy');
          selectTalentaElm.append(`<option value="${res.id}" selected>${res.name}</option>`);
          selectTalentaElm.select2();
          blockUITalentaForm.release();
          modalTalenta.hide();
          $('#add-talent-form')[0].reset();

        }
      })

    });
    $('.btn-save-talenta').on('click',function(){
      talentaValidator.validate();
    });
    $('#modal_bidang_id').on('change', function(){
      $('#modal_level_talenta_id').empty().append('<option>Pilih Kategori Talenta</option>');
      if($(this).val() != ''){
        const levels = getListLevelTalenta(Number($(this).val()));
        levels.forEach(function(l){
          $('#modal_level_talenta_id').append(`<option value="${l.id}">${l.name}</option>`);
        })
      }
    });
  </script>
@endpush
