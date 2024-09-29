@extends('layouts/dashboard')
@section('title', 'Perubahan Password')
@section('body')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Perubahan Password</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('user.save-new-password') }}" method="POST">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-semibold fs-6">Password aktif</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="password" name="oldpassword" id="password"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Password aktif" />
                                    @error('oldpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-semibold fs-6">Password baru</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="password" name="newpassword" id="newpassword"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Password baru" />

                                    @error('newpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-semibold fs-6">Konfirmasi password</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="password" name="newpassword_confirmation" id="newpassword_confirmation"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Konfirmasi password" />
                                    @error('newpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript"></script>
@endsection
