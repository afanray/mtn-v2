@extends('layouts/dashboard')
@section('title', ($type === 'add' ? 'Tambah' : 'Sunting') . ' ' . $label)
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ ($type === 'add' ? 'Tambah' : 'Sunting') . ' ' . $label }}</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('data.store-data') }}" method="POST">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select class="form-select form-select-solid" id="select-year" name="year"
                                        @readonly($type === 'edit')>
                                        <option value="">Pilih Tahun</option>
                                        @foreach (\App\Constants\Common::getTahun() as $t)
                                            <optgroup label="{{ $t['label'] }}">
                                                @foreach ($t['data'] as $tahun)
                                                    <option value="{{ $tahun }}" @selected($tahun == old('tahun', $model->year))>
                                                        {{ $tahun }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($attributes as $attr)
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ $attr['label'] }}</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    @if ($type === 'add' || ($type === 'edit' && $status === \App\Constants\Common::STATUS_NULL))
                                        <div class="col-12 fv-row">
                                            <input type="text" name="{{ $attr['field'] }}" id="{{ $attr['field'] }}"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 form-item"
                                                data-rules = "{{ $rules[$attr['field']] }}"
                                                placeholder="{{ $attr['label'] }}"
                                                value="{{ old($attr['field'], $model->{$attr['field']}) }}" />
                                        </div>

                                        {{-- Input tambahan untuk link validasi --}}
                                        <div class="col-12 fv-row mb-3">
                                            <input type="url" name="{{ $attr['field'] }}_validation_url"
                                                id="{{ $attr['field'] }}_validation_url"
                                                class="form-control form-control-lg form-control-solid form-item"
                                                placeholder="Tambahkan Link Sumber Data {{ $attr['label'] }}"
                                                value="{{ old("{$attr['field']}_validation_url", $dataInputs[$attr['field']][0]['url'] ?? '') }}" />
                                            {{-- <small class="form-text text-muted">Masukkan URL validasi jika tersedia.</small> --}}
                                        </div>

                                        {{-- Input tambahan untuk bottleneck --}}
                                        <div class="col-12 fv-row mb-3">
                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 form-item" rows="5"
                                                name="{{ $attr['field'] }}_bottleneck" id="{{ $attr['field'] }}_bottleneck"
                                                class="form-control form-control-lg form-control-solid form-item"
                                                placeholder="Tambahkan Isu/Tantangan Capaian {{ $attr['label'] }}"
                                                value="{{ old("{$attr['field']}_bottleneck", $dataInputs[$attr['field']][0]['bottleneck'] ?? '') }}"></textarea>
                                        </div>

                                        {{-- Input tambahan debottleneck --}}
                                        <div class="col-12 fv-row mb-3">
                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 form-item" rows="5"
                                                placeholder="Tambahkan Strategi Capaian {{ $attr['label'] }}" name="{{ $attr['field'] }}_debottleneck"
                                                id="{{ $attr['field'] }}_debottleneck"
                                                value="{{ old("{$attr['field']}_debottleneck", $dataInputs[$attr['field']][0]['debottleneck'] ?? '') }}"></textarea>
                                        </div>
                                    @else
                                        <div class="col-4 fv-row">
                                            <input type="text" name="{{ $attr['field'] }}" id="{{ $attr['field'] }}"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 form-item"
                                                data-rules = "{{ $rules[$attr['field']] }}"
                                                placeholder="{{ $attr['label'] }}"
                                                value="{{ old($attr['field'], $model->{$attr['field']}) }}" />
                                            @if ((\App\Models\User::isPic() || \App\Models\User::isSuperAdmin()) && isset($dataInputs[$attr['field']]))
                                                @if ($dataInputs[$attr['field']][0]['user'])
                                                    <div class="mb-3 d-flex flex-column">
                                                        <div class="form-text text-muted">disunting oleh: <span
                                                                class="text-primary">{{ $dataInputs[$attr['field']][0]['user']['name'] }}</span>
                                                        </div>

                                                        <div class="form-text text-muted">tantangan pelaksanaan: <span
                                                                class="text-primary">
                                                                <p>{{ $dataInputs[$attr['field']][0]['bottleneck'] ?? '' }}
                                                                </p>
                                                            </span>
                                                        </div>

                                                        <div class="form-text text-muted">strategi pelaksanaan: <span
                                                                class="text-primary">
                                                                <p>{{ $dataInputs[$attr['field']][0]['debottleneck'] ?? '' }}
                                                                </p>
                                                            </span>
                                                        </div>


                                                        <div class="form-text text-muted">disunting pada: <span
                                                                class="text-primary">{{ date('Y-m-d H:i:s', strtotime($dataInputs[$attr['field']][0]['created_at'])) }}</span>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-4 fv-row">
                                            <select class="form-select form-select-solid"
                                                name="data_input[{{ $attr['id'] }}][status]"
                                                @disabled(\App\Models\User::isOperator())>
                                                <option value="">Status</option>
                                                <option value="1"
                                                    {{ isset($dataInputs[$attr['field']]) ? ($dataInputs[$attr['field']][0]['status'] == 1 ? 'selected' : '') : '' }}>
                                                    Valid</option>
                                                <option value="2"
                                                    {{ isset($dataInputs[$attr['field']]) ? ($dataInputs[$attr['field']][0]['status'] == 2 ? 'selected' : '') : '' }}>
                                                    Ditolak</option>
                                            </select>

                                            <div class="form-text text-muted">link validasi: <span class="text-primary">
                                                    <a href="{{ $dataInputs[$attr['field']][0]['url'] ?? '#' }}">Cek
                                                        Data</a>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="col-4 fv-row">
                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 form-item" rows="5"
                                                placeholder="Komentar" {{ \App\Models\User::isOperator() ? 'disabled' : '' }}
                                                name="data_input[{{ $attr['id'] }}][comment]">{{ isset($dataInputs[$attr['field']]) ? $dataInputs[$attr['field']][0]['comment'] : '' }}</textarea>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $model->id }}" />
                    <input type="hidden" name="bidang_id" value="{{ $bidang_id }}" />
                    <a href="{{ route('data.index') }}" class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $type != 'add' ? 'true' : 'false' }};
        const rulesData = {{ Js::from($rules) }};
        const attributesData = {{ Js::from($attributes) }};
        const isPic = {{ \App\Models\User::isPic() ? 'true' : 'false' }};
        const status = {{ $model->status ?? 1 }};
        KTUtil.onDOMContentLoaded(function() {
            $('#select-year').select2();
            const form = document.querySelector('#add-form');
            let rules = {}
            attributesData.forEach(attr => {
                const formRulesString = rulesData[attr.field];
                const formRules = formRulesString.split('|');
                rules[attr.field] = {
                    validators: {}
                }
                formRules.forEach(fr => {
                    if (fr === 'required') {
                        rules[attr.field].validators = {
                            ...rules[attr.field].validators,
                            notEmpty: {
                                message: attr.label + ' is required'
                            },
                        }
                    }
                    if (fr === 'numeric') {
                        rules[attr.field].validators = {
                            ...rules[attr.field].validators,
                            integer: {
                                message: 'The value is not a valid integer number',
                                thousandsSeparator: '',
                                decimalSeparator: '.',
                            },
                        }
                    }
                })
            })
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        ...rules,
                        year: {
                            validators: {
                                notEmpty: {
                                    message: 'Tahun is required'
                                },
                            }
                        }
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
