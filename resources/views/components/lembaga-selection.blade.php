<div class="lembaga-block_{{ $uid }}">
    <div class="row mb-6">
        <label class="col-form-label required fw-semibold fs-6 {{ $layout === 'horizontal' ? 'col-lg-4' : '' }}">Lembaga
            Induk</label>
        <div class="{{ $layout === 'horizontal' ? 'col-lg-8' : '' }}">
            <div class="row">
                <div class="col-12 fv-row">
                    <select name="{{ $lembagaIndukName }}" id="{{ $lembagaIndukName }}" aria-label="Pilih Lembaga Induk"
                        {{ $withSelect2 ? 'data-control=select2' : '' }} data-placeholder="Pilih Lembaga Induk"
                        class="form-select form-select-solid form-select-lg" @disabled($viewOnly)>
                        <option value="">Pilih Lembaga Induk</option>
                        @foreach ($lembagaInduk as $l)
                            <option value="{{ $l->id }}" @selected(old($lembagaIndukName, $initLembagaIndukId) == $l->id)>{{ $l->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($withAdd && !$viewOnly)
                    <a class="form-text text-primary cursor-pointer add-lembaga_{{ $uid }}" data-level="1">Klik
                        disini untuk membuat Lembaga Induk baru.</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <label
            class="col-form-label required fw-semibold fs-6 {{ $layout === 'horizontal' ? 'col-lg-4' : '' }}">Pusat/Unit/Fakultas</label>
        <div class="{{ $layout === 'horizontal' ? 'col-lg-8' : '' }}">
            <div class="row">
                <div class="col-12 fv-row">
                    <select name="{{ $lembagaUnitName }}" id="{{ $lembagaUnitName }}"
                        aria-label="Pilih Pusat/Unit/Fakultas" {{ $withSelect2 ? 'data-control=select2' : '' }}
                        data-placeholder="Pilih Pusat/Unit/Fakultas"
                        class="form-select form-select-solid form-select-lg" @disabled($viewOnly)>
                        <option value="">Pilih Pusat/Unit/Fakultas</option>
                        @foreach ($lembagaUnit as $l)
                            <option value="{{ $l->id }}" @selected(old($lembagaUnitName, $initLembagaUnitId) == $l->id)>{{ $l->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($withAdd && !$viewOnly)
                    <a class="form-text text-primary cursor-pointer add-lembaga_{{ $uid }}"
                        data-level="2">Klik disini untuk membuat lembaga Pusat/Unit/Fakultas baru.</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <label
            class="col-form-label required fw-semibold fs-6 {{ $layout === 'horizontal' ? 'col-lg-4' : '' }}">Direktorat/Jurusan</label>
        <div class="{{ $layout === 'horizontal' ? 'col-lg-8' : '' }}">
            <div class="row">
                <div class="col-12 fv-row">
                    <select name="{{ $lembagaName }}" id="{{ $lembagaName }}" aria-label="Pilih Direktorat/Jurusan"
                        {{ $withSelect2 ? 'data-control=select2' : '' }} data-placeholder="Pilih Direktorat/Jurusan"
                        class="form-select form-select-solid form-select-lg" @disabled($viewOnly)>
                        <option value="">Pilih Direktorat/Jurusan</option>
                        @foreach ($lembaga as $l)
                            <option value="{{ $l->id }}" @selected(old($lembagaName, $initLembagaId) == $l->id)>{{ $l->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($withAdd && !$viewOnly)
                    <a class="form-text text-primary cursor-pointer add-lembaga_{{ $uid }}"
                        data-level="3">Klik disini untuk membuat lembaga Direktorat/Jurusan baru.</a>
                @endif
            </div>
        </div>
    </div>
</div>
@push('modal')
    @if ($withAdd && !$viewOnly)
        <div class="modal fade" tabindex="-1" id="modal-create-lembaga">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Lembaga</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body" id="modal-create-lembaga-body">
                        <form id='create-lembaga-form' class="form" method="POST"
                            action="{{ route('common.lembaga-store') }}">
                            <div class="fv-row mb-6">
                                <label class="col-form-label required fw-semibold fs-6">Lembaga Induk</label>
                                <input type="text" id="lembaga_induk_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled />
                            </div>
                            <div class="fv-row mb-6">
                                <label class="col-form-label required fw-semibold fs-6">Pusat/Unit/Fakultas</label>
                                <input type="text" id="lembaga_unit_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled />
                            </div>
                            <div class="fv-row mb-6">
                                <label class="col-form-label required fw-semibold fs-6">Nama Lembaga</label>
                                <input type="text" name="lembaga_name" id="lembaga_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Nama Lembaga" />
                            </div>
                            <div class="fv-row mb-6">
                                <label class="col-form-label required fw-semibold fs-6">Alamat Lembaga</label>
                                <textarea name="lembaga_address" id="lembaga_address"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Alamat Lembaga" rows="5"></textarea>
                            </div>

                            <x-address-selection province-name="province_id"
                                regency-name="regency_id"></x-address-selection>

                            <input type="hidden" name="level" value="1" />
                            <input type="hidden" name="parent_id" value="" />
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-create-lembaga">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endpush

@push('scripts')
    <script type="text/javascript">
        const {{ $uid }} = {
            lembagaIndukElm: $('#{{ $lembagaIndukName }}'),
            lembagaUnitElm: $('#{{ $lembagaUnitName }}'),
            lembagaElm: $('#{{ $lembagaName }}'),
            lembagaLevel: 1,
            withAdd: {{ $withAdd ? 'true' : 'false' }},
            viewOnly: {{ $viewOnly ? 'true' : 'false' }},
            blockUILembagaSelectionForm: new KTBlockUI(document.getElementById('modal-create-lembaga-body'), {
                message: 'simpan data...',
            }),
            blockUILembagaBlock: new KTBlockUI(document.querySelector('.lembaga-block_{{ $uid }}'), {
                message: 'memuat data...',
            }),
            createLembagaValidator: null,
            modalCreateLembaga: null,
            formCreateLembaga: null,
            withSelect2: {{ $withSelect2 ? 'true' : 'false' }}
        }
        KTUtil.onDOMContentLoaded(function() {
            if ({{ $uid }}.withAdd && !{{ $uid }}.viewOnly) {
                {{ $uid }}.formCreateLembaga = $('#create-lembaga-form');
                {{ $uid }}.modalCreateLembaga = new bootstrap.Modal(document.getElementById(
                    'modal-create-lembaga'));
                {{ $uid }}.createLembagaValidator = FormValidation.formValidation(
                    document.querySelector('#create-lembaga-form'), {
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
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                ).on('core.form.valid', function() {
                    {{ $uid }}.blockUILembagaSelectionForm.block();
                    $.ajax({
                        url: {{ $uid }}.formCreateLembaga.attr('action'),
                        data: {{ $uid }}.formCreateLembaga.serialize(),
                        dataType: 'json',
                        type: 'post',
                        success: function(res) {
                            switch ({{ $uid }}.lembagaLevel) {
                                case 1:
                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaIndukElm.select2('destroy');

                                    {{ $uid }}.lembagaIndukElm.append(
                                        `<option value="${res.lembaga_id}" selected>${res.lembaga_name}</option>`
                                    );

                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaIndukElm.select2();
                                    break;
                                case 2:
                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaUnitElm.select2('destroy');

                                    {{ $uid }}.lembagaUnitElm.append(
                                        `<option value="${res.lembaga_id}" selected>${res.lembaga_name}</option>`
                                    );

                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaUnitElm.select2();
                                    break;
                                case 3:
                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaElm.select2('destroy');

                                    {{ $uid }}.lembagaElm.append(
                                        `<option value="${res.lembaga_id}" selected>${res.lembaga_name}</option>`
                                    );

                                    if ({{ $uid }}.withSelect2)
                                        {{ $uid }}.lembagaElm.select2();
                                    break;
                            }

                            {{ $uid }}.blockUILembagaSelectionForm.release();
                            {{ $uid }}.modalCreateLembaga.hide();
                            $('#create-lembaga-form')[0].reset();

                        }
                    })
                });
            }
            {{ $uid }}.lembagaIndukElm.on('change', function() {
                const parent_id = $(this).val();
                {{ $uid }}.blockUILembagaBlock.block();
                $.ajax({
                    url: '/dashboard/common/get-lembaga-unit',
                    data: {
                        parent_id
                    },
                    dataType: 'json',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if ({{ $uid }}.withSelect2) {
                            {{ $uid }}.lembagaUnitElm.select2('destroy');
                            {{ $uid }}.lembagaElm.select2('destroy');
                        }
                        {{ $uid }}.lembagaUnitElm.empty();
                        {{ $uid }}.lembagaElm.empty();
                        {{ $uid }}.lembagaUnitElm.append(
                            `<option value="" selected>Pilih Pusat/Unit/Fakultas</option>`);
                        {{ $uid }}.lembagaElm.append(
                            `<option value="" selected>Pilih Direktorat/Jurusan</option>`);
                        $.each(res.data, function(index, item) {
                            {{ $uid }}.lembagaUnitElm.append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                        if ({{ $uid }}.withSelect2) {
                            {{ $uid }}.lembagaUnitElm.select2();
                            {{ $uid }}.lembagaElm.select2();
                        }
                        {{ $uid }}.blockUILembagaBlock.release();
                    }
                })
            })
            {{ $uid }}.lembagaUnitElm.on('change', function() {
                const parent_id = $(this).val();
                {{ $uid }}.blockUILembagaBlock.block();
                $.ajax({
                    url: '/dashboard/common/get-lembaga-direktorat',
                    data: {
                        parent_id
                    },
                    dataType: 'json',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if ({{ $uid }}.withSelect2)
                            {{ $uid }}.lembagaElm.select2('destroy');

                        {{ $uid }}.lembagaElm.empty();
                        {{ $uid }}.lembagaElm.append(
                            `<option value="" selected>Pilih Direktorat/Jurusan</option>`);
                        $.each(res.data, function(index, item) {
                            {{ $uid }}.lembagaElm.append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                        if ({{ $uid }}.withSelect2)
                            {{ $uid }}.lembagaElm.select2();

                        {{ $uid }}.blockUILembagaBlock.release();
                    }
                })
            })
            $('.add-lembaga_{{ $uid }}').on('click', function() {
                const level = Number($(this).data('level'));
                {{ $uid }}.lembagaLevel = level;
                $('input[name="level"]').val(level)
                $('#lembaga_induk_name').parent().removeClass('d-none').addClass('d-none');
                $('#lembaga_unit_name').parent().removeClass('d-none').addClass('d-none');
                let parent_id = '';
                if (level === 2) {
                    $('#lembaga_induk_name').val({{ $uid }}.lembagaIndukElm.find(':selected')
                        .text()).parent().removeClass('d-none')
                    parent_id = {{ $uid }}.lembagaIndukElm.val();
                } else if (level === 3) {
                    $('#lembaga_induk_name').val({{ $uid }}.lembagaIndukElm.find(':selected')
                        .text()).parent().removeClass('d-none')
                    $('#lembaga_unit_name').val({{ $uid }}.lembagaUnitElm.find(':selected')
                        .text()).parent().removeClass('d-none')
                    parent_id = {{ $uid }}.lembagaUnitElm.val()
                }
                if (parent_id === '' && level !== 1) {
                    Swal.fire({
                        text: `Silahkan Pilih ${level === 2 ? 'Lembaga Induk' : 'Pusat/Unit/Fakultas'} Terlebih Dahulu`,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                } else {
                    $('input[name="parent_id"]').val(parent_id)
                    {{ $uid }}.modalCreateLembaga.show();
                }
            })
            if ({{ $uid }}.withAdd && !{{ $uid }}.viewOnly) {
                $('.btn-create-lembaga').on('click', function() {
                    {{ $uid }}.createLembagaValidator.validate();
                });
            }
        })
    </script>
@endpush
