@extends('layouts/landing')
@section('title', 'Pustaka')
@section('body')
    <section class="page-banner rel z-1" style="background-color: #4575B8; height: 200px">
        <div class="container">
            <div class="banner-inner">
                <h3 class="text-white wow fadeInUp delay-0-2s">Pustaka MTN</h3>
            </div>
        </div>
        <img class="dots-shape" src="/assets/landing/images/shapes/white-dots-two.png" alt="Shape">
        <img class="tringle-shape slideLeftRight" src="/assets/landing/images/shapes/white-tringle.png" alt="Shape">
        <img class="close-shape" src="/assets/landing/images/shapes/white-close.png" alt="Shape">
        <img class="dots-shape-three slideUpDown delay-1-5s" src="/assets/landing/images/shapes/white-dots-three.png"
            alt="Shape">
    </section>

    <section class="blog-section rel z-1 pt-20 pb-100 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
                                Infografis
                            </h3>
                        </div>
                    </div>

                    @if (!empty($pustakaInfo))
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <!-- Carousel Indicators -->
                            <ol class="carousel-indicators">
                                @foreach ($pustakaInfo as $key => $item)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>

                            <!-- Carousel Inner -->
                            <div class="carousel-inner">
                                @foreach (array_chunk($pustakaInfo, 4) as $key => $items)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($items as $item)
                                                <div class="col-md-3 d-flex justify-content-center">
                                                    <a href="javascript:void(0);"
                                                        onclick="showModal('{{ asset('storage/pustaka/' . $item['image']) }}', '{{ $item['title'] }}','{{ $item['description'] }}')">
                                                        <div class="card border-0 rounded p-10"
                                                            style="width: 100%;
                                                            height:250px">
                                                            <img src="storage/pustaka/{{ $item['image'] }}"
                                                                alt="Profile Picture" class="rounded">
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Carousel Controls -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @else
                        <p class="text-center">Tidak ada berita atau kegiatan terbaru saat ini.</p>
                    @endif
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <h3 class="font-weight-bold text-left mx-auto mt-4 mb-4">
                                Kebijakan MTN </h3>
                        </div>
                    </div>
                    @foreach ($kebijakan as $h)
                        <a href="{{ $h->link }}">
                            <div class=" mb-3">
                                <a href="{{ $h->link }}" class="" download="">
                                    <div class="row">
                                        <div class="col-md-4 rounded">
                                            <img src="{{ asset('storage/pustaka/' . $h->image) }}"
                                                alt="{{ $h->image }}"
                                                style="width: 100%; height: 100px; object-fit: contain;">
                                        </div>
                                        <div class="col-md-8">
                                            {{-- <div class="card-body"> --}}
                                            <p class="text-normal" style="margin-bottom: 5px;">
                                                {{ $h->title }}</p>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </a>
                        @if (!$loop->last)
                            <hr> <!-- Pembatas antar card, kecuali untuk item terakhir -->
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                    <img id="modalImage" src="" alt="Modal Image" class="img-fluid">
                    <hr>
                    <p class="card-text" id="description"></p>
                </div>
                <!-- Tombol Download -->
                <a href="" id="downloadLink" class="btn text-white" download style="background-color: #4575B8;">
                    Unduh
                </a>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        function showModal(imageUrl, title, description) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('description').textContent = description;

            // Mengatur link download
            document.getElementById('downloadLink').href = imageUrl;
            $('#imageModal').modal('show');
        }
    </script>
@endsection
