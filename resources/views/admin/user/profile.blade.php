@extends('layouts.app')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">

        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Profile Details</h3>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                <a href="../../demo1/dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit
                    Profile</a>
                <!--end::Action-->
            </div>
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800">{{ $getProfileDetail->name }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Email</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800">{{ $getProfileDetail->email }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                        <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                            <i class="ki-duotone ki-information fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span></label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <span
                            class="fw-bold fs-6 text-gray-800 me-2">{{ $getProfileDetail->phone ? $getProfileDetail->phone : 'Not Available'  }}</span>
                        <span class="badge badge-success">Verified</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
        {!! Toast::message() !!}
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Sign-in Method</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_signin_method" class="collapse show">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Email Address-->
                    <div class="d-flex flex-wrap align-items-center">
                        <!--begin::Label-->
                        <div id="signin_email" class="">
                            <div class="fs-6 fw-bold mb-1">Email Address</div>
                            <div class="fw-semibold text-gray-600">{{ $getProfileDetail->email }}</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="signin_email_edit" class="flex-row-fluid d-none">
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{ route('user.changePassword') }}">
                                @csrf
                                <input type="hidden" value="emailChange" name="userEmail">
                                <div class="row mb-6">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="fv-row mb-0">
                                            <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New
                                                Email Address</label>
                                            <input type="email" class="form-control form-control-lg form-control-solid"
                                                id="emailaddress" placeholder="Email Address" name="emailaddress"
                                                value="{{ $getProfileDetail->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-0">
                                            <label for="confirmemailpassword"
                                                class="form-label fs-6 fw-bold mb-3">Confirm Email</label>
                                            <input type="email" class="form-control form-control-lg form-control-solid"
                                                name="confirmemail" id="confirmemail" />
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary me-2 px-6">Update
                                        Email</button>
                                    <button type="button"
                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="signin_email_button" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Email Address-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-6"></div>
                    <!--end::Separator-->
                    <!--begin::Password-->
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <!--begin::Label-->
                        <div id="kt_signin_password" class="">
                            <div class="fs-6 fw-bold mb-1">Password</div>
                            <div class="fw-semibold text-gray-600">************</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="signin_password_edit" class="flex-row-fluid d-none">
                            <!--begin::Form-->
                            <form id="kt_signin_change_password" method="post"
                                action="{{ route('user.changePassword') }}" class="form">
                                @csrf
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current
                                                Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid"
                                                name="currentpassword" id="currentpassword" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                                Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid"
                                                name="newpassword" id="newpassword" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm
                                                New Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid"
                                                name="confirmpassword" id="confirmpassword" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mb-5">Password must be at least 8 character and contain symbols
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                    <button id="kt_password_cancel" type="button"
                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="signin_password" class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                        </div>
                        <!--end::Action-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#signin_password').click(function() {
        $('#signin_password_edit').removeClass('d-none');
        $('#kt_signin_password,#signin_password').addClass('d-none');
    });
    $('#signin_email_button').click(function() {
        $('#signin_email_edit').removeClass('d-none');
        $('#signin_email,#signin_email_button').addClass('d-none');
    });
});
</script>
@endsection