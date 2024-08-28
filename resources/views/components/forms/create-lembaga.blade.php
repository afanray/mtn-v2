<div class="modal fade" tabindex="-1" id="modal-lembaga-form">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Lembaga</h5>
        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Close-->
      </div>

      <div class="modal-body" id="modal-lembaga-form-body">
        <form id='add-lembaga-form' class="form"  method="POST" action="{{ route('common.lembaga-store') }}">
          <div class="fv-row mb-6">
            <label class="col-form-label required fw-semibold fs-6">Nama Lembaga</label>
            <input type="text" name="lembaga_name" id="lembaga_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                   placeholder="Nama Lembaga"  />
          </div>
          <div class="fv-row mb-6">
            <label class="col-form-label required fw-semibold fs-6">Alamat Lembaga</label>
            <textarea name="lembaga_address" id="lembaga_address" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Alamat Lembaga" rows="5"></textarea>
          </div>
          {{ csrf_field() }}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary btn-save-lembaga">Simpan</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script type="text/javascript">
    var selectLembagaElm = null;
    var triggerLembagaElm = null;
    const modalLembaga = new bootstrap.Modal(document.getElementById('modal-lembaga-form'))
    const formLembagaElm = $('#add-lembaga-form');
    const blockUILembagaForm = new KTBlockUI(document.getElementById('modal-lembaga-form-body'), {
      message: 'simpan data...',
    })
    function registerModalAction(triggerElm,selectElm){
      triggerLembagaElm = triggerElm;
      selectLembagaElm = selectElm;
      triggerLembagaElm.on('click',function(){
        modalLembaga.show()
      })
    }
    var lembagaValidator = FormValidation.formValidation(
      document.getElementById('add-lembaga-form'),
      {
        fields: {
          'lembaga_name': {
            validators: {
              notEmpty: {
                message: 'Nama Lembaga is required'
              },
            }
          },
          'lembaga_address': {
            validators: {
              notEmpty: {
                message: 'Alamat Lembaga is required'
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
      blockUILembagaForm.block();
      $.ajax({
        url: formLembagaElm.attr('action'),
        data: formLembagaElm.serialize(),
        dataType: 'json',
        type: 'post',
        success: function (res){
          selectLembagaElm.select2('destroy');
          selectLembagaElm.append(`<option value="${res.lembaga_id}" selected>${res.lembaga_name}</option>`);
          selectLembagaElm.select2();
          blockUILembagaForm.release();
          modalLembaga.hide();
          $('#add-lembaga-form')[0].reset();

        }
      })
    });
    $('.btn-save-lembaga').on('click',function(){
      lembagaValidator.validate();
    });
  </script>
@endpush
