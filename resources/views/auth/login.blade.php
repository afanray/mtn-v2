@extends('layouts/auth')
@section('body')
    <!--begin::Content-->
    <div class="w-md-400px">
        <div class="d-flex justify-content-center mb-6">
            <img src="{{ asset('assets/media/logos/logo_mtn.png') }}" class="w-200px" />
        </div>
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('dashboard') }}"
            action="{{ route('auth.login') }}" method="POST">
            {{ csrf_field() }}
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Dashboard</h1>
                <!--end::Title-->
                @if (session('form'))
                    <div class="alert alert-danger mt-5">
                        {{ session('form') }}
                    </div>
                @endif
            </div>
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Username" name="username" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input type="password" placeholder="Password" name="password" autocomplete="off"
                    class="form-control bg-transparent" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->

            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary" style="background-color : #4575B8;">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Sign In</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#kt_sign_in_form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'username': {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                },
                            }
                        },
                        'password': {
                            validators: {
                                notEmpty: {
                                    message: 'Password is required'
                                },
                            }
                        },
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
    </script>
@endsection
