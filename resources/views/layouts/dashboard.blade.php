<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>@yield('title', 'Dashboard')</title>
    <meta charset="utf-8" />
    <meta name="description" content="MTN Dashboard" />
    <meta name="keywords" content="kelase" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/landing/css/my-style.css') }}">
    <!--end::Global Stylesheets Bundle-->
    <style>
        .app-main {
            margin-top: var(--kt-app-header-height);
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    @yield('css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-footer-fixed="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header position-fixed w-100 m-0 bg-white" style="z-index:10">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-md-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="/dashboard" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('/assets/media/logos/logo_mtn.png') }}" class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <span class="me-3 fw-bolder">{{ auth()->user()->name }}</span>
                                    <img src="{{ asset('/assets/media/avatars/300-1.jpg') }}" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->

                                    <div class="menu-item px-5">
                                        <a href="{{ route('user.update-password') }}" class="menu-link px-5">Perubahan
                                            Password</a>
                                    </div>

                                    <div class="menu-item px-5">
                                        <a href="{{ route('auth.logout') }}" class="menu-link px-5">Keluar</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="/dashboard">
                            <img alt="Logo" src="{{ asset('/assets/media/logos/logo_mtn.png') }}"
                                class="h-45px app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ asset('/assets/media/logos/logo_300x300.png') }}"
                                class="h-20px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                            <span class="svg-icon svg-icon-2 rotate-180">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3"
                                id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'dashboard' ? 'active' : '' }}"
                                        href="/dashboard">
                                        <span class="menu-icon">
                                            <i class='fa fa-home fs-4'></i>
                                        </span>
                                        <span class="menu-title">Dasbor</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'capaian-indikator' ? 'active' : '' }}"
                                        href="{{ route('capaian-indikator.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-chart-area fs-4'></i>
                                        </span>
                                        <span class="menu-title">Capaian Indikator</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'data' ? 'active' : '' }}"
                                        href="{{ route('data.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-database fs-4'></i>
                                        </span>
                                        <span class="menu-title">Data Indikator</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'summary' ? 'active' : '' }}"
                                        href="{{ route('capaian-indikator.summary') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-users fs-4'></i>
                                        </span>
                                        <span class="menu-title">Ringkasan Jumlah Talenta</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'ht' ? 'active' : '' }}"
                                        href="{{ route('highlight-talenta.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-users fs-4'></i>
                                        </span>
                                        <span class="menu-title">Highlight Talenta</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'ant' ? 'active' : '' }}"
                                        href="{{ route('anugrah-talenta.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-users fs-4'></i>
                                        </span>
                                        <span class="menu-title">Anugrah Talenta</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'at' ? 'active' : '' }}"
                                        href="{{ route('ajang-talenta.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-users fs-4'></i>
                                        </span>
                                        <span class="menu-title">Ajang Talenta</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--end:Menu item-->
                                @if (\App\Models\User::isSuperAdmin())
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link {{ $activeMenu === 'pustaka' ? 'active' : '' }}"
                                            href="{{ route('pustaka.index') }}">
                                            <span class="menu-icon">
                                                <i class='fa fa-book-reader fs-4'></i>
                                            </span>
                                            <span class="menu-title">Pustaka</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endif
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'pb' ? 'active' : '' }}"
                                        href="{{ route('praktik-baik.index') }}">
                                        <span class="menu-icon">
                                            <i class='fa fa-users fs-4'></i>
                                        </span>
                                        <span class="menu-title">Praktik Baik</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>

                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ $activeMenu === 'bk' ? 'active' : '' }}"
                                        href="{{ route('berita-kegiatan.index') }}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-file-circle-plus"></i>
                                            {{-- <i class='fa fa-news fs-4'></i> --}}
                                        </span>
                                        <span class="menu-title">Berita dan Kegiatan</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                @if (\App\Models\User::isSuperAdmin())
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link {{ $activeMenu === 'testi' ? 'active' : '' }}"
                                            href="{{ route('testimoni.index') }}">
                                            <span class="menu-icon">
                                                <i class='fa fa-comments fs-4'></i>
                                            </span>
                                            <span class="menu-title">Testimoni</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endif
                                @if (\App\Models\User::isSuperAdmin())
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link {{ $activeMenu === 'user' ? 'active' : '' }}"
                                            href="{{ route('user.index') }}">
                                            <span class="menu-icon">
                                                <i class='fa fa-users fs-4'></i>
                                            </span>
                                            <span class="menu-title">Pengguna</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endif
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" @class([
                                    'menu-item',
                                    'menu-accordion',
                                    'hover show' => in_array($activeMenu, [
                                        'master-talenta',
                                        'master-lembaga',
                                        'master-penghargaan',
                                    ]),
                                ])>
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="fa fa-cogs fs-4"></i>
                                        </span>
                                        <span class="menu-title">Data Master</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link {{ $activeMenu === 'master-talenta' ? 'active' : '' }}"
                                                href="{{ route('data-master.talenta.index') }}">
                                                <span class="menu-bullet"><span
                                                        class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">Data Talenta</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        @if (\App\Models\User::isSuperAdmin())
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link {{ $activeMenu === 'master-lembaga' ? 'active' : '' }}"
                                                    href="{{ route('data-master.lembaga.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span></span>
                                                    <span class="menu-title">Data Lembaga</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link {{ $activeMenu === 'master-penghargaan' ? 'active' : '' }}"
                                                    href="{{ route('data-master.penghargaan.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span></span>
                                                    <span class="menu-title">Data Referensi Penghargaan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>

                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link {{ $activeMenu === 'master-sinergi-data' ? 'active' : '' }}"
                                                    href="#">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span></span>
                                                    <span class="menu-title">Sinergi Data</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        @endif
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid mt-5">
                                @yield('body')
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <div id="kt_app_footer" class="app-footer ">
                        <!--begin::Footer container-->
                        <div
                            class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                                Hak Cipta {{ date('Y') }} <a href="/">Manajemen Talenta Nasional</a>. Hak
                                Cipta Dilindungi Undang-Undang
                            </div>
                            <!--end::Copyright-->

                        </div>
                        <!--end::Footer container-->
                    </div>
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    @stack('modal')
    <script>
        var hostUrl = "/assets/";
        var dashboardUrl = "/dashboard";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('/assets/js/widgets.bundle.js') }}"></script>
    {{-- <script src="{{ asset('/assets/js/custom/apps/app.js') }}"></script> --}}
    <script type="text/javascript">
        const alertSuccess = "{{ session('alert-success') ?: '' }}"
        const alertFailed = "{{ session('alert-failed') ?: '' }}"
        KTUtil.onDOMContentLoaded(function() {
            if (alertSuccess !== '') {
                Swal.fire({
                    text: alertSuccess,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Tutup",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
            if (alertFailed !== '') {
                Swal.fire({
                    text: alertFailed,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Tutup",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        })
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @yield('js')
    @stack('scripts')
</body>
<!--end::Body-->

</html>
