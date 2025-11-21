@extends('layouts/dashboard')
@section('title', 'Dashboard Home')
@section('body')
    <div class="row">

        @if (auth()->check() &&
                auth()->user()->hasAccess(['superadmin']))
            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <!--begin::Card widget 3-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color: #50cd89;background-image:url('/assets/media/svg/shapes/wave-bg-dark.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5 mb-3">
                        <!--begin::Icon-->
                        <div class="d-flex flex-center rounded-circle h-80px w-80px"
                            style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #50cd89">
                            <i class="fa fa-users text-white fs-2qx lh-0"></i>
                        </div>
                        <!--end::Icon-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end mb-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <span class="fs-4hx text-white fw-bold me-6">{{ $countTalenta }}</span>

                            <div class="fw-bold fs-6 text-white">
                                <span class="d-block">Talenta</span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 3-->
            </div>

            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <!--begin::Card widget 3-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color: #d2b813;background-image:url('/assets/media/svg/shapes/wave-bg-red.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5 mb-3">
                        <!--begin::Icon-->
                        <div class="d-flex flex-center rounded-circle h-80px w-80px"
                            style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                            <i class="fa fa-users text-white fs-2qx lh-0"></i>
                        </div>
                        <!--end::Icon-->
                    </div>
                    <!--end::Header-->


                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end mb-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <span class="fs-4hx text-white fw-bold me-6">{{ $countRA }}</span>

                            <div class="fw-bold fs-6 text-white">
                                <span class="d-block">Rencana</span>
                                <span class="">Aksi</span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 3-->
            </div>

            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <!--begin::Card widget 3-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color: #F1416C;background-image:url('/assets/media/svg/shapes/wave-bg-red.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5 mb-3">
                        <!--begin::Icon-->
                        <div class="d-flex flex-center rounded-circle h-80px w-80px"
                            style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                            <i class="fa fa-users text-white fs-2qx lh-0"></i>
                        </div>
                        <!--end::Icon-->
                    </div>
                    <!--end::Header-->


                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end mb-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <span class="fs-4hx text-white fw-bold me-6">{{ $countHT }}</span>

                            <div class="fw-bold fs-6 text-white">
                                <span class="d-block">Highlight</span>
                                <span class="">Talenta</span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 3-->
            </div>


            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <!--begin::Card widget 3-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color: #F1416C;background-image:url('/assets/media/svg/shapes/wave-bg-red.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5 mb-3">
                        <!--begin::Icon-->
                        <div class="d-flex flex-center rounded-circle h-80px w-80px"
                            style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                            <i class="fa fa-users text-white fs-2qx lh-0"></i>
                        </div>
                        <!--end::Icon-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end mb-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <span class="fs-4hx text-white fw-bold me-6">{{ $countPraktikBaik }}</span>

                            <div class="fw-bold fs-6 text-white">
                                <span class="d-block">Praktik</span>
                                <span class="">Baik</span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 3-->
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <!--begin::Card widget 3-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color: #7239EA;background-image:url('/assets/media/svg/shapes/wave-bg-purple.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5 mb-3">
                        <!--begin::Icon-->
                        <div class="d-flex flex-center rounded-circle h-80px w-80px"
                            style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                            <i class="fa fa-users text-white fs-2qx lh-0"></i>
                        </div>
                        <!--end::Icon-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end mb-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <span class="fs-4hx text-white fw-bold me-6">{{ $countTestimoniValid }}</span>

                            <div class="fw-bold fs-6 text-white">
                                <span class="d-block">Testimoni</span>
                                <span class="">Terverifikasi</span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 3-->
            </div>
        @endif




        <div class="col-12 col-md-6 col-xl-4 mb-5">
            <!--begin::Card widget 3-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                style="background-color: #7239EA;background-image:url('/assets/media/svg/shapes/wave-bg-purple.svg')">
                <!--begin::Header-->
                <div class="card-header pt-5 mb-3">
                    <!--begin::Icon-->
                    <div class="d-flex flex-center rounded-circle h-80px w-80px"
                        style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                        <i class="fa fa-users text-white fs-2qx lh-0"></i>
                    </div>
                    <!--end::Icon-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end mb-3">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <span class="fs-4hx text-white fw-bold me-6">{{ $countAT }}</span>

                        <div class="fw-bold fs-6 text-white">
                            <span class="d-block">Ajang</span>
                            <span class="">Talenta</span>
                        </div>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 3-->
        </div>
        <div class="col-12 col-md-6 col-xl-4 mb-5">
            <!--begin::Card widget 3-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                style="background-color: #50cd89;background-image:url('/assets/media/svg/shapes/wave-bg-dark.svg')">
                <!--begin::Header-->
                <div class="card-header pt-5 mb-3">
                    <!--begin::Icon-->
                    <div class="d-flex flex-center rounded-circle h-80px w-80px"
                        style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #50cd89">
                        <i class="fa fa-users text-white fs-2qx lh-0"></i>
                    </div>
                    <!--end::Icon-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end mb-3">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <span class="fs-4hx text-white fw-bold me-6">{{ $countANT }}</span>

                        <div class="fw-bold fs-6 text-white">
                            <span class="d-block">Anugrah</span>
                            <span class="">Talenta</span>
                        </div>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 3-->
        </div>

    </div>


    {{-- @if (auth()->check() &&
    auth()->user()->hasAccess(['superadmin', 'pic_direktorat', 'operator']))

        <div class="card mt-5">
            <div class="card-header card-header-stretch" style="background-color: #4575B8;">
                <div class="d-flex py-3 gap-2">
                    <h3 class="card-title fs-3 text-white">Daftar Periksa Kelengkapan Data Indikator</h3>
                    <select class="form-select fs-3" id="change-year">
                        @foreach (\App\Constants\Common::getTahun() as $t)
                            <option value="{{ $loop->index }}" @selected($loop->index == $yearIndex)>{{ $t['label'] }}
                                ({{ min($t['data']) }} - {{ max($t['data']) }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="card-toolbar ">
                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                        @foreach ($bidang as $k => $v)
                            <li class="nav-item">
                                <a class="nav-link fw-bolder text-active-white fs-3 {{ $loop->index === 0 ? 'active' : '' }}"
                                    data-bs-toggle="tab" href="#kt_tab_pane_{{ $k }}">{{ $v['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    @foreach ($bidang as $k => $v)
                        <div class="tab-pane fade {{ $loop->index === 0 ? 'show active' : '' }}"
                            id="kt_tab_pane_{{ $k }}" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered fs-6 gy-5 gx-5">
                                    <thead>
                                        <tr class="text-start text-gray-800 fw-bold fs-4 text-uppercase gs-0">
                                            @if (!\App\Models\User::isOperator())
                                                <th class="min-w-125px align-middle bg-primary text-white" rowspan="2">
                                                    Operator</th>
                                                <th class="min-w-125px align-middle bg-primary text-white" rowspan="2">
                                                    Unit Kerja</th>
                                                <th class="min-w-125px align-middle bg-primary text-white" rowspan="2">
                                                    Kementerian/Lembaga</th>
                                            @endif
                                            <th class="min-w-125px align-middle bg-primary text-white" rowspan="2">
                                                Indikator</th>
                                            @foreach ($activeYearGroup['data'] as $tahun)
                                                <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder"
                                                    colspan="3">{{ $tahun }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                            @foreach ($activeYearGroup['data'] as $tahun)
                                                <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Status
                                                </th>
                                                <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                    Komentar
                                                </th>
                                                <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">Update
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-800 fs-4">
                                        @foreach ($v['attributes'] as $attr)
                                            <tr>
                                                @if (!\App\Models\User::isOperator())
                                                    @if (count($attr['users']) > 0)
                                                        <td>
                                                            <ul>
                                                                @foreach ($attr['users'] as $u)
                                                                    <p class="fw-bold">{{ $u['name'] }}</p>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($attr['users'] as $u)
                                                                    <p class="fw-bold">{{ $u['lembaga']['name'] }}
                                                                    </p>
                                                                @endforeach
                                                            </ul>
                                                        </td>

                                                        <td>
                                                            <ul>
                                                                @foreach ($attr['users'] as $u)
                                                                    <p class="fw-bold">
                                                                        {{ $u['lembaga_induk_unit']['name'] }}
                                                                    </p>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                @endif
                                                <td class="fw-bold">{{ $attr['label'] }}</td>
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    @if (isset($v['dataInputs'][$tahun]))
                                                        <td>
                                                            @if (isset($v['dataInputs'][$tahun][$attr['field']]))
                                                                @switch($v['dataInputs'][$tahun][$attr['field']][0]['status'])
                                                                    @case(1)
                                                                        <span class="badge badge-lg badge-success">Valid</span>
                                                                    @break

                                                                    @case(2)
                                                                        <span class="badge badge-lg badge-danger">Ditolak</span>
                                                                    @break

                                                                    @default
                                                                        <span class="badge badge-lg badge-warning">Perlu
                                                                            Validasi</span>
                                                                @endswitch
                                                            @else
                                                                <span class="badge badge-lg badge-primary">Belum
                                                                    Di-input</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ isset($v['dataInputs'][$tahun][$attr['field']]) ? $v['dataInputs'][$tahun][$attr['field']][0]['comment'] : '-' }}
                                                        </td>
                                                        <td>
                                                            @if (isset($v['dataInputs'][$tahun][$attr['field']]))
                                                                @if ($v['dataInputs'][$tahun][$attr['field']][0]['user'])
                                                                    {{ date('Y-m-d H:i:s', strtotime($v['dataInputs'][$tahun][$attr['field']][0]['created_at'])) }}
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td><span class="badge badge-lg badge-primary">Belum
                                                                Di-input</span>
                                                        </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif --}}
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#change-year').on('change', function() {
                const val = $(this).val();
                window.location.href = '/dashboard?year_group=' + val;
            })
        });
    </script>
@endsection
@section('css')
    <style>
        .table-bordered>:not(caption)>*>* {
            border-width: 1px !important;
        }

        .table>:not(:first-child) {
            border-style: solid;
            border-color: var(--bs-table-border-color);
        }
    </style>
@endsection
