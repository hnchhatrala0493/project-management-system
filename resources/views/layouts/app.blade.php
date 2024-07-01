<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>{{ env('APP_NAME','Project Management System')}}</title>
    <meta charset="utf-8" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, Bootstrap, Bootstrap 5, Angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask &amp; Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="/admin/assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="/admin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    @if(Auth::user()->role == 'Developer')
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{{url('/')}}" class="d-lg-none">
                            <img alt="Logo" src="/admin/assets/media/logos/default-small.svg" class="h-30px" />
                        </a>
                        <label class="fs-5 fw-semibold w-250px mb-2">Select Project</label>
                        <div class="fv-row">
                            @php
                            $projectList = \App\Models\Projects::getProjectListByAssigned();
                            @endphp
                            <select class="form-select w-500px" onchange="SelectProject(this.value)"
                                data-placeholder="Select Project" data-control="select2">
                                @foreach($projectList as $project)
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                    </div>
                    @endif
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::Search-->
                            <!--end::Search-->
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-350px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo"
                                                    src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{Auth::user()->name}}
                                                    <span
                                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->role }}</span>
                                                </div>
                                                <a href="#"
                                                    class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{route('user.profile', ['id' => Auth::user()->id ])}}"
                                            class="menu-link px-5">My
                                            Profile</a>
                                    </div>
                                    @if(Auth::user()->role != 'Developer')
                                    <div class="menu-item px-5 my-1">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account"
                                            class="menu-link px-5">Account
                                            Settings</a>
                                    </div>
                                    @endif
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a class="dropdown-item menu-link px-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                                <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                                    id="kt_app_header_menu_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
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
                        <a href="../../demo1/dist/index.html">
                            <img alt="Logo" src="/admin/assets/media/logos/default-dark.svg"
                                class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="/admin/assets/media/logos/default-small.svg"
                                class="h-20px app-sidebar-logo-minimize" />
                        </a>

                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        @include('layouts.sidebar')
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content wrapper-->
                        <div class="app-toolbar py-3 py-lg-6">
                            @include('layouts.breadcrumb')
                        </div>
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                @yield('content')
                            </div>
                        </div>
                        <div id="kt_app_footer" class="app-footer">
                            <!--begin::Footer container-->
                            <div
                                class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                                <!--begin::Copyright-->
                                <div class="text-dark order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                    <a href="https://keenthemes.com" target="_blank"
                                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                                </div>
                                <!--end::Copyright-->
                                <!--begin::Menu-->
                                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                    <li class="menu-item">
                                        <a href="https://keenthemes.com" target="_blank"
                                            class="menu-link px-2">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="https://devs.keenthemes.com" target="_blank"
                                            class="menu-link px-2">Support</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="https://1.envato.market/EA4JP" target="_blank"
                                            class="menu-link px-2">Purchase</a>
                                    </li>
                                </ul>
                                <!--end::Menu-->
                            </div>
                            <!--end::Footer container-->
                        </div>
                        <!--end::Content wrapper-->
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
            <div class="modal fade" id="kt_modal_create_account" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog mw-1000px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Title-->
                            <h2>Setting</h2>
                            <!--end::Title-->
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y">
                            <!--begin::Stepper-->
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <form method="post" class="form">
                                    <div class="tab-content">
                                        <!--begin::Tab pane-->
                                        <div class="tab-pane fade show active" role="tab-panel">
                                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                                <!--begin::General options-->
                                                <div class="card card-flush py-4">
                                                    <div class="card-body pt-0">
                                                        <!--begin::Input group-->
                                                        <div class="mb-5 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Date Format</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select class="form-select" data-control="select2"
                                                                name="date_format">
                                                                <option value="January,01 2024">January,01 2024</option>
                                                                <option value="01/01/2024">01/01/2024</option>
                                                                <option value="01-01-2024">01-01-2024</option>
                                                                <option value="Jan, 01 2024">Jan, 01 2024</option>
                                                                <option value="01 Jan 2024">01 Jan 2024</option>
                                                                <option value="2024-01-01">2024-01-01</option>
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-5 col-md-6">
                                                                <label class="form-label">App Name Key</label>
                                                                <input type="text" value="" name="app_name"
                                                                    id="app_name" class="form-control">
                                                            </div>
                                                            <div class="mb-5 col-md-6">
                                                                <label class="form-label">App Name Value</label>
                                                                <input type="text" value="" name="app_name"
                                                                    id="app_name" class="form-control">
                                                            </div>
                                                            <div id="addMoreView"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Tab pane-->
                                        <!--begin::Tab pane-->
                                        <div class="tab-pane fade" id="twillo" role="tab-panel">
                                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                                <!--begin::Inventory-->
                                                <div class="card card-flush py-4">
                                                    <!--begin::Card header-->

                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0">
                                                        <!--begin::Input group-->
                                                        <div class="mb-5 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Token</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="token" class="form-control mb-2"
                                                                placeholder="" value="" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->

                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-5 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Account Id</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="account_id"
                                                                class="form-control mb-2" placeholder="" value="" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->
                                                            <!--end::Description-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Tab pane-->
                                        <!--begin::Tab pane-->
                                        <div class="tab-pane fade" id="email" role="tab-panel">
                                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                                <!--begin::Reviews-->
                                                <div class="card card-flush py-4">
                                                    <!--begin::Card header-->
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0">
                                                        <!--begin::Table-->
                                                        <form class="form">
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Mailer</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <!--begin::Row-->
                                                                    <div class="row">
                                                                        <!--begin::Col-->
                                                                        <div class="col-lg-14 fv-row">
                                                                            <input type="text" name="fname"
                                                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                                                value="" />
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Row-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Host</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="text" name="company"
                                                                        class="form-control form-control-lg" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">User
                                                                    Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="text" name="company"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="password" name="password"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Port</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="password" name="password"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Encryption</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="password" name="password"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="text" name="address"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="" value="" />
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                        </form>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Reviews-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab content-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="#" data-bs-dismiss="modal" class="btn btn-light me-5">Cancel</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button class="btn btn-success me-5" onclick="addMore()"><i
                                                class="fa fa-plus"></i>More</button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </form>
                            </div>
                            <!--end::Stepper-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
        </div>
        <!--end::Page-->
    </div>
    <script src="/admin/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/admin/assets/js/scripts.bundle.js"></script>
    <script src="{{url('js/jquery.validate.js')}}"></script>
    <script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script>
    function SelectProject(projectId) {

    }

    var a = 1;

    function addMore() {
        var html = '';
        html += "<div class='row'>";
        html += "<div class='mb-5 col-md-6'>";
        html += "<label class='form-label'>App Name Key</label>";
        html += "<input type='text' value='' name='app_name_key' class='form-control app_name_" +
            a + "'>";
        html += "</div>";
        html += "<div class='mb-5 col-md-6'>";
        html += "<label class='form-label'>App Name Value</label>";
        html += "<input type='text' value='' name='app_name_value' class='form-control app_name_" + a + "'>";
        html += "</div>";
        html += "</div>";
        a++;
        return document.getElementById('addMoreView').innerHTML += html;
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
    });
    </script>
    @yield('script')
</body>
<!--end::Body-->

</html>