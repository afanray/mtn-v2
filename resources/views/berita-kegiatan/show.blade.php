@extends('layouts/dashboard')
@section('title', 'Berita dan Kegiatan')
@section('body')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <img src="{{ asset('storage/berita_kegiatan/' . $model->image) }}" class="card-img-top img-fluid"
                        alt="{{ $model->title }}">
                    <div class="card-body">
                        <h1 class="card-title">{{ $model->title }}</h1>
                        <div class="mb-3 text-muted">
                            <small>Ditulis oleh {{ $model->user->name }} pada
                                {{ \Carbon\Carbon::parse($model->created_at)->format('d M Y') }}</small>
                        </div>
                        <div class="card-text">
                            {!! $model->content !!}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('berita-kegiatan.index') }}"
                            class="btn btn-light btn-active-light-primary me-2">Tutup</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
