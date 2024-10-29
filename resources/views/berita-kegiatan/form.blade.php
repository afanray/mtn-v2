@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Berita dan Kegiatan')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Berita dan Kegiatan</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('berita-kegiatan.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-form-label required fw-semibold fs-6">Unggah Foto</label>
                            <div class="row">
                                <div class="col-12 fv-row">
                                    @if ($model->image)
                                        <div class="foto-wrapper mb-3 w-200px">
                                            <img src="{{ asset('storage/berita_kegiatan/' . $model->image) }}"
                                                class="w-100">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="image"
                                        id="image" />
                                    @if ($model->image)
                                        <span class="form-text text-muted">Abaikan Bila tidak ingin diubah.</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-form-label required fw-semibold fs-6">Judul</label>
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="title" id="title"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Judul Berita dan Kegiatan" value="{{ old('title', $model->title) }}" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-form-label required fw-semibold fs-6">Kategori</label>
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="category" id="category"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Kategori Berita Kegiatan"
                                        value="{{ old('category', $model->category) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-12">
                            <label class="col-form-label required fw-semibold fs-6">Konten</label>
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <textarea name="content" id="content" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Isi berita dan kegiatan" rows="20">{{ old('content', $model->content) }}</textarea>
                                    <script>
                                        // Inisialisasi CKEditor
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="publish" id="publish"
                                            @if ($model->published == 1) ? checked : '' @endif>
                                        <label class="custom-control-label" for="publish">Publish</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('berita-kegiatan.index') }}"
                        class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $model->id ? 'true' : 'false' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        image: {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 2097152, // 2048 * 1024
                                    message: 'format foto tidak valid',
                                },
                            },
                        },
                        'title': {
                            validators: {
                                notEmpty: {
                                    message: 'Judul is required'
                                },
                            }
                        },
                        'slug': {
                            validators: {
                                notEmpty: {
                                    message: 'Slug is required'
                                },
                            }
                        },
                        // 'content': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: 'Content is required'
                        //         },
                        //     }
                        // },

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

        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
