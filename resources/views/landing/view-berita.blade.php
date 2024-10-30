@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <section class="about-page-section rel z-1 pt-130 pb-100 rpt-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12">
                    <div class="mb-0">
                        <img src="{{ asset('storage/berita_kegiatan/' . $model->image) }}"
                            class="card-img-top img-fluid rounded" alt="{{ $model->title }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $model->title }}</h3>
                            <div class="mb-3 text-muted">
                                <small>Ditulis oleh {{ $model->user->name }} pada
                                    {{ \Carbon\Carbon::parse($model->created_at)->format('d M Y') }}</small>
                            </div>
                            <div class="card-text">
                                {!! $model->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <h5>Berita sebelumnya</h5>
                    @foreach ($oldNews->take(10) as $item)
                        <a href="{{ route('berita-kegiatan.view', $item['slug']) }}">
                            <div class=" mb-3">
                                <div class="row">
                                    <div class="col-md-4 rounded">
                                        <img src="{{ asset('storage/berita_kegiatan/' . $item['image']) }}"
                                            alt="{{ $item['image'] }}">
                                    </div>
                                    <div class="col-md-8">
                                        {{-- <div class="card-body"> --}}
                                        <p class="text-normal" style="margin-bottom: 5px;">{{ $item['title'] }}</p>
                                        <div class="text-muted" style="margin-bottom: 5px;">
                                            <small>Ditulis oleh {{ $item->user->name }} pada
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                                        </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
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
@endsection
