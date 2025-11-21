@extends('layouts/dashboard')
@section('title', 'Dashboard Home')
@section('body')
    <div class="card ">
        <div class="card-header card-header-stretch" style="background-color: #4575B8;">
            <div class="d-flex py-3 gap-2">
                <h3 class="card-title text-white fs-2">Capaian Indikator</h3>
                <select class="form-select fs-3" id="change-year">
                    @foreach (\App\Constants\Common::getTahun() as $t)
                        <option value="{{ $loop->index }}" @selected($loop->index == $yearIndex)>{{ $t['label'] }}
                            ({{ min($t['data']) }} - {{ max($t['data']) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-active-white text-white-500 active fs-3" data-bs-toggle="tab"
                            href="#kt_tab_pane_7">Riset dan Inovasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-active-white text-white-500 fs-3" data-bs-toggle="tab"
                            href="#kt_tab_pane_8">Seni
                            dan
                            Budaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-active-white text-white-500 fs-3" data-bs-toggle="tab"
                            href="#kt_tab_pane_9">Olah
                            Raga</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 p-0">
                            <!--begin::Card title-->
                            <div class="card-title w-100">
                                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                                    <h3 class="card-title fs-2 text-black">Sasaran dan Target MTN Bidang Riset dan Inovasi
                                    </h3>
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        @if (\App\Models\User::isSuperAdmin())
                                            <button type="button"
                                                class="btn btn-success save-target save-target-riset me-3" data-type="riset"
                                                style="display: none">
                                                <i class="fa fa-save"></i> <span>Simpan</span>
                                            </button>
                                            <a href="javascript:void(0)" class="btn btn-info edit-target me-3"
                                                data-type="riset" data-edit="0">
                                                <i class="fa fa-pencil-alt"></i> <span>Sunting Target</span>
                                            </a>
                                        @endif
                                        <a href="javascript:void(0)" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Download Data
                                        </a>
                                    </div>
                                    <!--end::Search-->
                                </div>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-0">
                            <form id="form-target-riset" action="{{ route('capaian-indikator.save-target') }}">
                                <div class="table-responsive">
                                    <table class="table table-bordered fs-6 gy-5 gx-5" id="table-riset">
                                        <thead>
                                            <tr class="text-start text-gray-700 fw-bold fs-4 text-uppercase gs-0">
                                                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">
                                                    Sasaran</th>
                                                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">
                                                    Indikator</th>
                                                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">
                                                    Baseline 2021</th>
                                                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">
                                                    Target 2045</th>
                                                <th class="min-w-125px text-center bg-riset text-white"
                                                    colspan="{{ count($activeYearGroup['data']) * 2 }}">Capaian</th>
                                                <th class="min-w-125px align-middle bg-riset text-white" rowspan="3">
                                                    Status Capaian</th>
                                                <th class="min-w-125px bg-riset text-white" rowspan="3"></th>
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder"
                                                        colspan="2">{{ $tahun }}</th>
                                                @endforeach
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Capaian</th>
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Target</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-800 fs-4">
                                            @foreach (\App\Constants\Common::sasaranRiset() as $s)
                                                @foreach (\App\Constants\Common::indikatorRisetSasaran($s['id']) as $ind)
                                                    <tr>
                                                        @if ($loop->index === 0)
                                                            <td rowspan={{ $s['jumlahIndikator'] }} class="bg-white">
                                                                {{ $s['text'] }}</td>
                                                        @endif
                                                        <td>{{ $ind['text'] }}</td>
                                                        <td>
                                                            {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                                                            @if ($ind['min_satuan'])
                                                                @if ($ind['min_satuan_style'] === 'sup')
                                                                    <sup>{{ $ind['min_satuan'] }}</sup>
                                                                @else
                                                                    <span class="ml-2">{{ $ind['min_satuan'] }}</span>
                                                                @endif
                                                            @endif
                                                            @if ($ind['min_subs'])
                                                                <br />
                                                                <span>{{ $ind['min_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                                                            @if ($ind['max_satuan'])
                                                                @if ($ind['max_satuan_style'] === 'sup')
                                                                    <sup>{{ $ind['max_satuan'] }}</sup>
                                                                @else
                                                                    <span class="ml-2">{{ $ind['max_satuan'] }}</span>
                                                                @endif
                                                            @endif
                                                            @if ($ind['max_subs'])
                                                                <br />
                                                                <span>{{ $ind['max_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        @foreach ($activeYearGroup['data'] as $tahun)
                                                            <td class="text-center">
                                                                <span
                                                                    class="d-inline-block mb-3">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</span>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" aria-label="Example with label"
                                                                        style="width: {{ \App\Constants\Common::getPercentageTarget($targetRiset[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%;"
                                                                        aria-valuenow="{{ \App\Constants\Common::getPercentageTarget($targetRiset[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <span
                                                                        class="progress-label">{{ \App\Constants\Common::getPercentageTarget($targetRiset[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-target"
                                                                    id="text-target-{{ $targetRiset[$ind['field']][$tahun][0]['id'] }}">{{ $targetRiset[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                                                                <input type="number"
                                                                    name="target[{{ $targetRiset[$ind['field']][$tahun][0]['id'] }}]"
                                                                    value="{{ $targetRiset[$ind['field']][$tahun][0]['target'] }}"
                                                                    class="form-control input-target" style="display: none">
                                                            </td>
                                                        @endforeach
                                                        <td>-</td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="fw-bold open-chart"
                                                                data-id="{{ $ind['id'] }}">Lihat Grafik</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 p-0">
                            <!--begin::Card title-->
                            <div class="card-title w-100">
                                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                                    <h3 class="card-title fs-2 text-black">Sasaran dan Target MTN Bidang Seni Budaya</h3>
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        @if (\App\Models\User::isSuperAdmin())
                                            <button type="button"
                                                class="btn btn-success save-target save-target-seni me-3" data-type="seni"
                                                style="display: none">
                                                <i class="fa fa-save"></i> <span>Simpan</span>
                                            </button>
                                            <a href="javascript:void(0)" class="btn btn-info edit-target me-3"
                                                data-type="seni" data-edit="0">
                                                <i class="fa fa-pencil-alt"></i> <span>Sunting Target</span>
                                            </a>
                                        @endif
                                        <a href="javascript:void(0)" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Download Data
                                        </a>
                                    </div>
                                    <!--end::Search-->
                                </div>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <form id="form-target-seni" action="{{ route('capaian-indikator.save-target') }}">
                                    <table class="table table-bordered fs-6 gy-5 gx-5" id="table-seni">
                                        <thead>
                                            <tr class="text-start text-gray-700 fw-bold fs-4 text-uppercase gs-0">
                                                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">
                                                    Sasaran</th>
                                                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">
                                                    Indikator</th>
                                                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">
                                                    Baseline 2021</th>
                                                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">
                                                    Target 2045</th>
                                                <th class="min-w-125px text-center bg-seni text-white"
                                                    colspan="{{ count($activeYearGroup['data']) * 2 }}">Capaian</th>
                                                <th class="min-w-125px align-middle bg-seni text-white" rowspan="3">
                                                    Status Capaian</th>
                                                <th class="min-w-125px bg-seni text-white" rowspan="3"></th>
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder"
                                                        colspan="2">{{ $tahun }}</th>
                                                @endforeach
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Capaian</th>
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Target</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-800 fs-4">
                                            @foreach (\App\Constants\Common::sasaranSeni() as $s)
                                                @foreach (\App\Constants\Common::indikatorSeniSasaran($s['id']) as $ind)
                                                    <tr>
                                                        @if ($loop->index === 0)
                                                            <td rowspan={{ $s['jumlahIndikator'] }} class="bg-white">
                                                                {{ $s['text'] }}</td>
                                                        @endif
                                                        <td>{{ $ind['text'] }}</td>
                                                        <td>
                                                            {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                                                            @if ($ind['min_satuan'])
                                                                @if ($ind['min_satuan_style'] === 'sup')
                                                                    <sup>{{ $ind['min_satuan'] }}</sup>
                                                                @else
                                                                    <span class="ml-2">{{ $ind['min_satuan'] }}</span>
                                                                @endif
                                                            @endif
                                                            @if ($ind['min_subs'])
                                                                <br />
                                                                <span>{{ $ind['min_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                                                            @if ($ind['max_satuan'])
                                                                @if ($ind['max_satuan_style'] === 'sup')
                                                                    <sup>{{ $ind['max_satuan'] }}</sup>
                                                                @else
                                                                    <span class="ml-2">{{ $ind['max_satuan'] }}</span>
                                                                @endif
                                                            @endif
                                                            @if ($ind['max_subs'])
                                                                <br />
                                                                <span>{{ $ind['max_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        @foreach ($activeYearGroup['data'] as $tahun)
                                                            <td class="text-center">
                                                                <span
                                                                    class="d-inline-block mb-3">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</span>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" aria-label="Example with label"
                                                                        style="width: {{ \App\Constants\Common::getPercentageTarget($targetSeni[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%;"
                                                                        aria-valuenow="{{ \App\Constants\Common::getPercentageTarget($targetSeni[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <span
                                                                        class="progress-label">{{ \App\Constants\Common::getPercentageTarget($targetSeni[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-center">
                                                                <span class="text-target"
                                                                    id="text-target-{{ $targetSeni[$ind['field']][$tahun][0]['id'] }}">{{ $targetSeni[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                                                                <input type="number"
                                                                    name="target[{{ $targetSeni[$ind['field']][$tahun][0]['id'] }}]"
                                                                    value="{{ $targetSeni[$ind['field']][$tahun][0]['target'] }}"
                                                                    class="form-control input-target"
                                                                    style="display: none">
                                                            </td>
                                                        @endforeach
                                                        <td>N/A</td>
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                                class="font-weight-bold open-chart-sn"
                                                                data-id="{{ $ind['id'] }}">Lihat Grafik</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 p-0">
                            <!--begin::Card title-->
                            <div class="card-title w-100">
                                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                                    <h2 class="card-title fs-2 text-black">Sasaran dan Target MTN Bidang Olahraga</h2>
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        @if (\App\Models\User::isSuperAdmin())
                                            <button type="button" class="btn btn-success save-target save-target-or me-3"
                                                data-type="or" style="display: none">
                                                <i class="fa fa-save"></i> <span>Simpan</span>
                                            </button>
                                            <a href="javascript:void(0)" class="btn btn-info edit-target me-3"
                                                data-type="or" data-edit="0">
                                                <i class="fa fa-pencil-alt"></i> <span>Sunting Target</span>
                                            </a>
                                        @endif
                                        <a href="javascript:void(0)" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Download Data
                                        </a>
                                    </div>
                                    <!--end::Search-->
                                </div>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <form action="{{ route('capaian-indikator.save-target') }}" id="form-target-or">
                                    <table class="table table-bordered fs-6 gy-5 gx-5" id="table-or">
                                        <thead>
                                            <tr class="text-start text-gray-700 fw-bold fs-4 text-uppercase gs-0">
                                                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">
                                                    Sasaran</th>
                                                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">
                                                    Indikator</th>
                                                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">
                                                    Baseline 2021</th>
                                                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">
                                                    Target 2045</th>
                                                <th class="min-w-125px text-center bg-or text-white"
                                                    colspan="{{ count($activeYearGroup['data']) * 2 }}">Capaian</th>
                                                <th class="min-w-125px align-middle bg-or text-white" rowspan="3">
                                                    Status Capaian</th>
                                                <th class="min-w-125px bg-or text-white" rowspan="3"></th>
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder"
                                                        colspan="2">{{ $tahun }}</th>
                                                @endforeach
                                            </tr>
                                            <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach ($activeYearGroup['data'] as $tahun)
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Capaian</th>
                                                    <th class="min-w-125px text-center bg-gray-300i text-dark fw-bolder">
                                                        Target</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-800 fs-4">
                                            @foreach (\App\Constants\Common::sasaranOR() as $s)
                                                @foreach (\App\Constants\Common::indikatorORSasaran($s['id']) as $ind)
                                                    <tr>
                                                        @if ($loop->index === 0)
                                                            <td rowspan={{ $s['jumlahIndikator'] }} class="bg-white">
                                                                {{ $s['text'] }}</td>
                                                        @endif
                                                        <td>{{ $ind['text'] }}</td>
                                                        <td>
                                                            @if (is_array($ind['min']))
                                                                @foreach ($ind['min'] as $min)
                                                                    @if ($loop->index !== 0)
                                                                        <br />
                                                                    @endif
                                                                    {{ is_int($min) ? number_format($min, 0, ',', '.') : $min }}
                                                                    @if ($ind['min_satuan_style'][$loop->index] === 'sup')
                                                                        <sup>{{ $ind['min_satuan'][$loop->index] }}</sup>
                                                                    @else
                                                                        <span
                                                                            class="ml-2">{{ $ind['min_satuan'][$loop->index] }}</span>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                {{ is_int($ind['min']) ? number_format($ind['min'], 0, ',', '.') : $ind['min'] }}
                                                                @if ($ind['min_satuan'])
                                                                    @if ($ind['min_satuan_style'] === 'sup')
                                                                        <sup>{{ $ind['min_satuan'] }}</sup>
                                                                    @else
                                                                        <span
                                                                            class="ml-2">{{ $ind['min_satuan'] }}</span>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if ($ind['min_subs'])
                                                                <br />
                                                                <span>{{ $ind['min_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (is_array($ind['max']))
                                                                @foreach ($ind['max'] as $max)
                                                                    @if ($loop->index !== 0)
                                                                        <br />
                                                                    @endif
                                                                    {{ is_int($max) ? number_format($max, 0, ',', '.') : $max }}
                                                                    @if ($ind['max_satuan_style'][$loop->index] === 'sup')
                                                                        <sup>{{ $ind['max_satuan'][$loop->index] }}</sup>
                                                                    @else
                                                                        <span
                                                                            class="ml-2">{{ $ind['max_satuan'][$loop->index] }}</span>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                {{ is_int($ind['max']) ? number_format($ind['max'], 0, ',', '.') : $ind['max'] }}
                                                                @if ($ind['max_satuan'])
                                                                    @if ($ind['max_satuan_style'] === 'sup')
                                                                        <sup>{{ $ind['max_satuan'] }}</sup>
                                                                    @else
                                                                        <span
                                                                            class="ml-2">{{ $ind['max_satuan'] }}</span>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if ($ind['max_subs'])
                                                                <br />
                                                                <span>{{ $ind['max_subs'] }}</span>
                                                            @endif
                                                        </td>
                                                        @foreach ($activeYearGroup['data'] as $tahun)
                                                            <td class="text-center">
                                                                <span
                                                                    class="d-inline-block mb-3">{{ isset($data[$tahun]) ? ($data[$tahun][0][$ind['field']] ? number_format($data[$tahun][0][$ind['field']], 2, ',', '.') : 'Dalam Perhitungan') : 'Dalam Perhitungan' }}</span>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" aria-label="Example with label"
                                                                        style="width: {{ \App\Constants\Common::getPercentageTarget($targetOr[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%;"
                                                                        aria-valuenow="{{ \App\Constants\Common::getPercentageTarget($targetOr[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <span
                                                                        class="progress-label">{{ \App\Constants\Common::getPercentageTarget($targetOr[$ind['field']][$tahun][0]['target'] ?? 0, $data[$tahun][0][$ind['field']] ?? 0) }}%</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-target"
                                                                    id="text-target-{{ $targetOr[$ind['field']][$tahun][0]['id'] }}">{{ $targetOr[$ind['field']][$tahun][0]['target'] ?? 'N/A' }}</span>
                                                                <input type="number"
                                                                    name="target[{{ $targetOr[$ind['field']][$tahun][0]['id'] }}]"
                                                                    value="{{ $targetOr[$ind['field']][$tahun][0]['target'] }}"
                                                                    class="form-control input-target"
                                                                    style="display: none">
                                                            </td>
                                                        @endforeach
                                                        <td>N/A</td>
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                                class="font-weight-bold open-chart-or"
                                                                data-id="{{ $ind['id'] }}">Lihat Grafik</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-chart" tabindex="-1" aria-labelledby="modal-chart" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Grafik Tren</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="chart" style="min-width: 600px; max-width: 700px; height: 400px"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
            message: 'simpan target...',
        })
        const data = {{ Js::from($data) }};
        const indikator = {{ Js::from(\App\Constants\Common::indikatorRiset()) }};
        const indikatorSeni = {{ Js::from(\App\Constants\Common::indikatorSeni()) }};
        const indikatorOr = {{ Js::from(\App\Constants\Common::indikatorOR()) }};
        const tahunList = {{ Js::from($activeYearGroup['data']) }};
        const targetIndikator = {{ Js::from($targetIndikator) }};
        const filteredDataIndikator = targetIndikator.filter(item => tahunList.includes(item.year));
        const $modal = $('#modal-chart');
        var chart = null
        var indikatorDetail = null
        $(document).ready(function() {
            $('#change-year').on('change', function() {
                const val = $(this).val();
                window.location.href = '/dashboard/capaian-indikator?year_group=' + val;
            })
            $modal.on('shown.bs.modal', function(event) {
                loadChart()
            })
            $modal.on('hide.bs.modal', function(event) {
                if (chart) {
                    chart.destroy();
                }
            })
            $('.open-chart').on('click', function() {
                const id = parseInt($(this).data('id'));
                indikatorDetail = indikator.find(i => parseInt(i.id) === id);
                $modal.modal('show')
            });

            $('.open-chart-sn').on('click', function() {
                const id = parseInt($(this).data('id'));
                indikatorDetail = indikatorSeni.find(i => parseInt(i.id) === id);
                $modal.modal('show')
            });
            $('.open-chart-or').on('click', function() {
                const id = parseInt($(this).data('id'));
                indikatorDetail = indikatorOr.find(i => parseInt(i.id) === id);
                $modal.modal('show')
            });
            $('.edit-target').on('click', function() {
                const type = $(this).data('type');
                const isEdit = Number($(this).data('edit'));
                if (isEdit) {
                    $(`#table-${type}`).find('.text-target').show();
                    $(`#table-${type}`).find('.input-target').hide();
                    $(`.save-target-${type}`).hide();
                    $(this).find('span').text('Sunting Target')
                } else {
                    $(`#table-${type}`).find('.text-target').hide();
                    $(`#table-${type}`).find('.input-target').show();
                    $(`.save-target-${type}`).show();
                    $(this).find('span').text('Batal')
                }
                $(this).data('edit', isEdit ? 0 : 1);
            })
            $('.save-target').on('click', function() {
                const type = $(this).data('type');
                const form = $(`#form-target-${type}`);
                blockUI.block()
                $.ajax({
                    url: '/dashboard/save-target',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    data: form.serialize(),
                    success: function(res) {
                        blockUI.release()
                        res.data.forEach(function(item) {
                            $(`#text-target-${item.id}`).text(item.val || 'N/A')
                        });
                        $(`.edit-target[data-type="${type}"]`).trigger('click')
                        Swal.fire({
                            title: 'Simpan Target',
                            text: 'Simpan Target Berhasil',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                    },
                    error: function(request, status, error) {
                        Swal.fire('Something Wrong. Please try Again', '', 'error')
                    },
                })
                console.log($(`#form-target-${type}`).serialize())
            })
        })

        function loadChart() {
            const fieldIndikator =
                indikatorDetail.field;
            const baseLine = [...tahunList].map(t => {
                return indikatorDetail.min;
            })
            const target = [...tahunList].map(t => {
                return indikatorDetail.max;
            })
            const capaian = [...tahunList].map(t => {
                return data[t] !== undefined ? (data[t][0][indikatorDetail.field] ? Number(data[t][0][
                    indikatorDetail.field
                ]) : 0) : 0;
            })
            const targetPerTahun = filteredDataIndikator
                .filter(item => item.field === fieldIndikator)
                .map(item => parseFloat(item.target));

            chart = Highcharts.chart('chart', {
                title: {
                    text: indikatorDetail.text
                },
                xAxis: {
                    categories: tahunList,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        type: 'column',
                        name: 'Capaian',
                        color: '#43C6E5',
                        data: capaian

                    }, {
                        type: 'spline',
                        name: 'Baseline',
                        data: baseLine,
                        lineColor: '#1A59C4',
                        marker: {
                            lineWidth: 2,
                            lineColor: '#1A59C4',
                            color: '#1A59C4',
                            fillColor: '#1A59C4'
                        }
                    }, {
                        type: 'spline',
                        name: 'Target 2045',
                        data: target,
                        lineColor: '#F73E3E',
                        marker: {
                            lineWidth: 2,
                            lineColor: '#F73E3E',
                            color: '#F73E3E',
                            fillColor: '#F73E3E'
                        }
                    }, {
                        type: 'line',
                        name: 'Target per Tahun',
                        data: targetPerTahun,
                        lineColor: '#50cd89',
                        marker: {
                            lineWidth: 2,
                            lineColor: '#50cd89',
                            color: '#50cd89',
                            fillColor: '#50cd89'
                        }
                    },

                ]
            });
        }
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

        .progress {
            background-color: lightgrey;
            height: 1.5rem;
            position: relative;
        }

        .progress .progress-bar {
            color: #000;
        }

        .progress .progress-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            font-weight: 500;
            font-size: .85rem;
        }

        .bg-riset {
            background-color: #256FB2 !important;
        }

        .bg-seni {
            background-color: #F3572C !important;
        }

        .bg-or {
            background-color: #1CA6B5 !important;
        }
    </style>
@endsection
