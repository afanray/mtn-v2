@extends('layouts/landing')
@section('title', 'Home')
@section('body')
    <section class="about-page-section rel z-1 pt-130 pb-100 rpt-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4">
                        <img src="{{ asset('storage/berita_kegiatan/' . $model->image) }}" class="card-img-top img-fluid"
                            alt="{{ $model->title }}">
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
            </div>
        </div>
    </section>
@endsection
