@extends('layouts/landing')
@section('title', 'Highlight Talenta')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">HighLight Talenta</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        {{-- <img src="/assets/landing/images/newsletter/circle.png" alt="shape" class="banner-circle slideUpRight"> --}}
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>
    <!--====== Highlight Talenta Section Start ======-->
    <section class="blog-section rel z-1 pb-100 pt-100 rpb-100 rpb-150 rmb-30">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title mb-55">
                        <span class="sub-title">Highlight Talenta</span>
                        <h2>Sorotan Talenta Indonesia Berprestasi Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="project-filter mb-55">
                        <li @class(['current' => !$bidang_id])><a href="{{ route('home.highlight-talenta') }}">Semua</a></li>
                        @foreach ($bidang as $b)
                            <li @class(['current' => $b->id == $bidang_id])><a
                                    href="{{ route('home.highlight-talenta', ['_b' => $b->id]) }}">{{ $b->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link disabled">Tampilan</a>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="lists-tab" data-toggle="tab" data-target="#lists" type="button"
                        role="tab" aria-controls="lists" aria-selected="false">
                        <i class="fa fa-list"></i>
                        Daftar
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="maps-tab" data-toggle="tab" data-target="#maps" type="button"
                        role="tab" aria-controls="maps" aria-selected="true">
                        <i class="fa fa-globe"></i>
                        Peta
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-10" id="myTabContent">
                <div class="tab-pane fade " id="lists" role="tabpanel" aria-labelledby="lists-tab">
                    <div class="row align-items-center">
                        @foreach ($highlight_talenta as $h)
                            <div class="col-xl-3 col-md-6">
                                <div class="blog-item wow fadeInUp delay-0-2s">
                                    <div class="image">
                                        <img src="{{ $h->talenta->foto_talenta ? asset('storage/talenta/' . $h->talenta->foto_talenta) : '/assets/landing/images/blog/user_women.png' }}"
                                            alt="Foto">
                                    </div>
                                    <div class="blog-author justify-content-center">
                                        <h5><a href="{{ $h->link_web }}">{{ $h->talenta->nama_talenta }}</a></h5>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><i class="far fa-calendar-alt"></i> <a
                                                    href="{{ $h->link_web }}">{{ $h->tahun }}</a></li>
                                        </ul>
                                        <h4><a href="{{ $h->link_web }}">{{ $h->prizes->name }}</a></h4>
                                        <p>{{ Illuminate\Support\Str::limit($h->desc_penghargaan, 100) }}</p>
                                    </div>
                                    <a href="{{ $h->link_web }}" class="learn-more">Lihat <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                {{ $highlight_talenta->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="maps" role="tabpanel" aria-labelledby="maps-tab">
                    <div class="row" id="maps-view">
                        <div class="col-12 p-4">
                            <div id="map-canvas" style="height: 600px"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--====== Highlight Talenta Section End ======-->
    <div class="modal text-left" id="modal-list" tabindex="-1" role="dialog" aria-labelledby="modal-list"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="list-label"><i class="ft-eye mr-2"></i><span class="text-white">Daftar
                            Kegiatan</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-talenta"></table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/landing/css/datatables/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('assets/landing/js/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css"
        media="all" />
    <link href="{{ asset('assets/landing/js/leaflet/beautify/leaflet-beautify-marker-icon.css') }}" rel="stylesheet"
        type="text/css" media="all" />
    <style>
        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            background-color: transparent;
            font-weight: 600;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border: none;
            background-color: var(--primary-color);
            color: #fff;

        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/landing/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/landing/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/leaflet/leaflet.js') }}"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_API_KEY') }}&sensor=false"></script>
    <script src="{{ asset('assets/landing/js/leaflet/Google-1.js') }}"></script>
    <script src="{{ asset('assets/landing/js/leaflet/beautify/leaflet-beautify-marker-icon.js') }}"></script>
    <script type="text/javascript">
        let viewSwitch = 'list';
        const bidangId = {{ $bidang_id ?? 'null' }};
        const maps = {!! json_encode($maps) !!};
        let map = new L.Map('map-canvas', {
            center: new L.LatLng(-0.789275, 113.921327),
            zoom: 5,
            maxZoom: 18
        });
        const googleLayer = new L.Google('ROADMAP');
        map.addLayer(googleLayer);
        setTimeout(function() {
            $('#lists-tab').trigger('click')
        }, 200)
        let markers = [];
        let marker = null;
        let markerLayer = null;
        let markerData = [];
        let firstLoadMap = true;
        const markerIcon = {
            icon: 'users',
            iconShape: 'marker',
            borderColor: 'red',
            textColor: 'red'
        };

        function clearMap() {
            if (markers.length > 0) {
                map.removeLayer(markerLayer);
                markerLayer = null;
                markers = [];
            }
        }

        function createLayerMarker(data) {
            clearMap();
            markers = [];
            $.each(data, function(i, item) {
                if (item.latitude != "" && item.total > 0) {
                    var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {
                            icon: L.BeautifyIcon.icon(markerIcon)
                        }).bindTooltip("" + item.total + "", {
                            permanent: true,
                            offset: [-8, -15],
                            interactive: true,
                            direction: 'left'
                        })
                        .addTo(map).on('click', function() {
                            getDataListHT('/common/get-ht-province', {
                                id: item.id,
                                bidang_id: bidangId,
                            }, item.name)
                        });
                    markers.push(marker);
                }
            });
            if (markers.length > 0) {
                markerLayer = L.layerGroup(markers);
                map.addLayer(markerLayer);
            }
        }
        $(document).ready(function() {
            if (maps.length > 0) {
                createLayerMarker(maps);
            }
        })
        var table = $('#table-talenta').DataTable({
            "columns": [{
                    data: 'id',
                    title: 'No',
                },
                {
                    data: 'foto_penghargaan',
                    title: 'Foto',
                    render: function(data, type, row) {
                        return `<img src="/storage/penghargaan/${data}" style="width: 75px;height:75px; object-fit: cover;"/>`
                    }
                },
                {
                    data: 'nama_talenta',
                    title: 'Nama Talenta',
                },
                {
                    data: 'lembaga_unit',
                    title: 'Lembaga',
                    render: function(data, type, row) {
                        return `${row.lembaga_induk} - ${row.lembaga_unit}`
                    }
                },
                {
                    data: 'bidang',
                    title: 'Bidang',
                },
                {
                    data: 'penghargaan',
                    title: 'Penghargaan',
                },
                {
                    data: 'tahun',
                    title: 'Tahun',
                },

            ],
        });

        function getDataListHT(url, params, title = '') {
            $('#modal-list').find('.modal-title span').text('Daftar Highlight Talenta - ' + title);
            $('#modal-list').on('shown.bs.modal', function() {
                table.clear();
                table.draw();
                $('#modal-list').block({
                    message: 'loading data...'
                });
            }).modal('show');
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                data: params,
                success: function(res) {
                    table.clear();
                    table.rows.add(res.data);
                    table.on('order.dt search.dt', function() {
                        table.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();
                    $('#modal-list').unblock();
                },
                error: function(xhr, res) {
                    $('#modal-list').unblock();
                }
            })
        }
    </script>
@endsection
