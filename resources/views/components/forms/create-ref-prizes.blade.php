@push('modal')
  <div class="modal fade" tabindex="-1" id="modal-referensi-penghargaan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Referensi Penghargaan</h5>
          <!--begin::Close-->
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
          </div>
          <!--end::Close-->
        </div>

        <div class="modal-body" id="modal-referensi-penghargaan-form-body">
          <form id='add-ref-penghargaan-form' class="form"  method="POST" action="{{ route('common.ref-penghargaan-store') }}">
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Nama Referensi</label>
              <input type="text" name="modal_prize_name" id="modal_prize_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                     placeholder="Nama Referensi"  />
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Frekuensi</label>
              <select name="modal_prize_freq" id="modal_prize_freq" aria-label="Pilih Frekuensi"
                      data-placeholder="Pilih Frekuensi" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Frekuensi</option>
                @foreach(\App\Constants\Common::FREQ_LIST as $b)
                  <option
                    value="{{ $b }}" >{{ $b }}</option>
                @endforeach
              </select>
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Average</label>
              <input type="text" name="modal_average" id="modal_average" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                     placeholder="Average"  />
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Tingkat</label>
              <select name="modal_tingkat" id="modal_tingkat" aria-label="Pilih Tingkat"
                      data-placeholder="Pilih Tingkat" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Tingkat</option>
                @foreach(\App\Constants\Common::getTingkat() as $b)
                  <option
                    value="{{ $b['value'] }}" >{{ $b['label'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Bidang</label>
              <select name="prize_bidang_id" id="prize_bidang_id" aria-label="Pilih Bidang"
                      data-placeholder="Pilih Bidang" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Bidang</option>
                @foreach(\App\Constants\Common::getBidang() as $b)
                  <option
                    value="{{ $b->id }}" >{{ $b->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="fv-row mb-6 modal_bidang_fokus_id_cont" style="display: none">
              <label class="col-form-label required fw-semibold fs-6">Bidang Fokus</label>
              <select name="modal_bidang_fokus_id" id="modal_bidang_fokus_id" aria-label="Pilih Bidang Fokus"
                      data-placeholder="Pilih Bidang Fokus" class="form-select form-select-solid form-select-lg">
                <option value="">Pilih Bidang Fokus</option>
                @foreach(\App\Constants\Common::getBidangFokus() as $b)
                  <option
                    value="{{ $b->id }}" >{{ $b->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="fv-row mb-6">
              <label class="col-form-label required fw-semibold fs-6">Link Web</label>
              <input type="text" name="modal_link_web" id="modal_link_web" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                     placeholder="Link Web"  />
            </div>
            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary btn-save-ref-penghargaan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
@endpush
@push('scripts')
  <script type="text/javascript">
    var selectRefPenghargaanElm = null;
    var triggerRefPenghargaanElm = null;
    const modalRefPenghargaan = new bootstrap.Modal(document.getElementById('modal-referensi-penghargaan'))
    const formRefPenghargaanElm = $('#add-ref-penghargaan-form');
    const blockUIRefPenghargaanForm = new KTBlockUI(document.getElementById('modal-referensi-penghargaan-form-body'), {
      message: 'simpan data...',
    })
    function registerModalRefPenghargaanAction(triggerElm,selectElm){
      triggerRefPenghargaanElm = triggerElm;
      selectRefPenghargaanElm = selectElm;
      triggerRefPenghargaanElm.on('click',function(){
        modalRefPenghargaan.show()
      })
    }
    var refPenghargaanValidator = FormValidation.formValidation(
      document.getElementById('add-ref-penghargaan-form'),
      {
        fields: {
          'modal_prize_name': {
            validators: {
              notEmpty: {
                message: 'Nama Referensi is required'
              },
            }
          },
          'modal_prize_freq': {
            validators: {
              notEmpty: {
                message: 'Frekuensi is required'
              },
            }
          },
          'prize_bidang_id': {
            validators: {
              notEmpty: {
                message: 'Bidang is required'
              },
            }
          },
          'modal_average': {
            validators: {
              notEmpty: {
                message: 'Average is required'
              },
            }
          },
          'modal_tingkat': {
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
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: '.fv-row',
            eleInvalidClass: '',
            eleValidClass: ''
          })
        }
      }
    ).on('core.form.valid', function () {
      blockUIRefPenghargaanForm.block();
      $.ajax({
        url: formRefPenghargaanElm.attr('action'),
        data: formRefPenghargaanElm.serialize(),
        dataType: 'json',
        type: 'post',
        success: function (res){
          selectRefPenghargaanElm.select2('destroy');
          selectRefPenghargaanElm.append(`<option value="${res.id}" selected>${res.name}</option>`);
          selectRefPenghargaanElm.select2();
          blockUIRefPenghargaanForm.release();
          modalRefPenghargaan.hide();
          $('#add-ref-penghargaan-form')[0].reset();

        }
      })
    });
    $('.btn-save-ref-penghargaan').on('click',function(){
      refPenghargaanValidator.validate();
    });
    $('#prize_bidang_id').on('change',function (){
      console.log($(this).val())
      if($(this).val() == 1){
        $('.modal_bidang_fokus_id_cont').show();
      }else{
        $('.modal_bidang_fokus_id_cont').hide();
      }
    })
  </script>
@endpush
