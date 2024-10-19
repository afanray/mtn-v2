<div class="address-block">
    <div class="row mb-6">
        <label
            class="col-form-label required fw-semibold fs-6 {{ $layout === 'horizontal' ? 'col-lg-4' : '' }}">Provinsi</label>
        <div class="{{ $layout === 'horizontal' ? 'col-lg-8' : '' }}">
            <div class="row">
                <div class="col-12 fv-row">
                    <select name="{{ $provinceName }}" id="{{ $provinceName }}" aria-label="Pilih Provinsi"
                        data-placeholder="Pilih Provinsi" class="form-select form-select-solid form-select-lg">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinces as $l)
                            <option value="{{ $l->id }}" @selected(old($provinceName, $initProvinceId) == $l->id)>{{ $l->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <label
            class="col-form-label required fw-semibold fs-6 {{ $layout === 'horizontal' ? 'col-lg-4' : '' }}">Kabupaten/Kota</label>
        <div class="{{ $layout === 'horizontal' ? 'col-lg-8' : '' }}">
            <div class="row">
                <div class="col-12 fv-row">
                    <select name="{{ $regencyName }}" id="{{ $regencyName }}" aria-label="Pilih Kabupaten/Kota"
                        data-placeholder="Kabupaten/Kota" class="form-select form-select-solid form-select-lg">
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach ($regencies as $r)
                            <option value="{{ $r->id }}" @selected(old($regencyName, $initRegencyId) == $r->id)>{{ $r->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        const provinceElm = $('#{{ $provinceName }}');
        const regencyElm = $('#{{ $regencyName }}');
        const blockUIAddressBlock = new KTBlockUI(document.querySelector('.address-block'), {
            message: 'memuat data...',
        });
        KTUtil.onDOMContentLoaded(function() {
            provinceElm.on('change', function() {
                const parent_id = $(this).val();
                blockUIAddressBlock.block();
                $.ajax({
                    url: '/dashboard/common/get-regencies',
                    data: {
                        province_id: parent_id
                    },
                    dataType: 'json',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        regencyElm.empty();
                        $.each(res.data, function(index, item) {
                            regencyElm.append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                        blockUIAddressBlock.release();
                    }
                })
            })
        });
    </script>
@endpush
