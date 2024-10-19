@extends('layouts/dashboard')
@section('title', 'Manajemen Data')
@section('body')
    <div class="card ">
        <div class="card-header card-header-stretch">
            <h3 class="card-title">Data Indikator</h3>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    @foreach ($bidang as $k => $v)
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-active-dark {{ $loop->index === 0 ? 'active' : '' }}"
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
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 p-0">
                                <!--begin::Card title-->
                                <div class="card-title w-100">
                                    <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                                        <h3 class="card-title">{{ $v['label'] }}</h3>
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            @if (!\App\Models\User::isPic())
                                                <a href="{{ route('data.add-data', [$k]) }}" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i> Tambah Data
                                                </a>
                                            @endif
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                </div>
                                <!--begin::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-0">
                                <table class="table table-striped table-row-bordered gy-5 gs-7"
                                    id="kt_bidang_{{ $k }}">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px text-start">Tahun</th>
                                            @foreach ($v['attributes'] as $attr)
                                                <th class="min-w-200px">{{ $attr['label'] }}</th>
                                            @endforeach
                                            <th class="min-w-125px text-center">Status</th>
                                            <th class="text-end min-w-70px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($v['data'] as $d)
                                            <tr>
                                                <td class="text-start">{{ $d->year }}</td>
                                                @foreach ($v['attributes'] as $attr)
                                                    <td>{{ $d->{$attr['field']} ?? '-' }}</td>
                                                @endforeach
                                                <td class="text-center">
                                                    <span @class([
                                                        'badge',
                                                        'badge-lg',
                                                        \App\Models\DataDasar::getStatusClass($d->status),
                                                    ])>
                                                        {{ \App\Models\DataDasar::getStatusLabel($d->status) }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    @if (
                                                        (\App\Models\User::isOperator() &&
                                                            ($d->status == \App\Constants\Common::STATUS_REJECT || $d->status == \App\Constants\Common::STATUS_NULL)) ||
                                                            \App\Models\User::isPic() ||
                                                            \App\Models\User::isSuperAdmin())
                                                        <a href="{{ route('data.edit-data', [$k, $d->id]) }}">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                @endforeach
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    ...
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                    ...
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @foreach ($bidang as $k => $v)
            $("#kt_bidang_{{ $k }}").DataTable({
                scrollX: true,
                scrollCollapse: true,
                fixedColumns: {
                    right: 2
                }
            });
        @endforeach
    </script>
@endsection
