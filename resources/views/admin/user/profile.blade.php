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
                        <span class="fw-bold fs-6 text-gray-800 me-2">{{ $getProfileDetail->email }}</span>
                        @if($getProfileDetail->email_verified_at)
                        <span class="badge badge-success">Verified</span>
                        @else
                        <span class="badge badge-danger">Not Verified Yet</span>
                        <button class="btn btn-link pl-3 verification_email_otp">Please Verify</button>
                        @endif
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
                    <div class="col-lg-8">
                        <span
                            class="fw-bold fs-6 text-gray-800 me-2">{{ $getProfileDetail->phone ? $getProfileDetail->phone : 'Not Available'  }}</span>
                        @if($getProfileDetail->phone_verified_at)
                        <span class="badge badge-success">Verified</span>
                        @else
                        <span class="badge badge-danger">Not Verified Yet</span>
                        <button class="btn btn-link pl-3 verification_phone_otp">Please
                            Verify</button>
                        @endif
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
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
    <div class="modal fade" id="verification_email_otp" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-800px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('profile.sendOTP.verification.email')}}"
                    id="verification_otp">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Email OTP Verification</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" data-bs-dismiss="modal"
                            class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <div id="kt_modal_add_customer_billing_info" class="collapse show">
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row g-9">
                                    <!--begin::Col-->
                                    <div class="col-md-10 fv-row">
                                        <!--begin::Label-->
                                        <div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 8 digit
                                            security code</div>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-wrap flex-stack">
                                            <input type="text" name="code" class="form-control" value="" />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Billing form-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" class="btn btn-light me-3">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <div class="modal fade" id="verification_phone_otp" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-800px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('profile.sendOTP.verification.phone')}}"
                    id="verification_otp_modal">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Phone OTP Verification</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" data-bs-dismiss="modal"
                            class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <div id="kt_modal_add_customer_billing_info" class="collapse show">
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row g-9">
                                    <!--begin::Col-->
                                    <div class="col-md-10 fv-row">
                                        <!--begin::Label-->
                                        <div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 8 digit
                                            security code</div>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-wrap flex-stack">
                                            <input type="text" name="code" class="form-control" value="" />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Billing form-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" class="btn btn-light me-3">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
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

    $('.verification_phone_otp').click(function() {
        var url = "{{route('profile.sendOTP.phone')}}";
        Swal.fire({
            title: "Loading....Please wait...!",
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "post",

            datatype: 'Json',
            data: {
                phone: "{{ encrypt($getProfileDetail->phone) }}"
            },
            success: function(result) {
                if (result) {
                    swal.close();
                    $('#verification_phone_otp').modal('show');
                }
            }

        });
    });
    $('.verification_email_otp').click(function() {
        var url = "{{route('profile.sendOTP.email')}}";
        Swal.fire({
            title: "Loading....Please wait...!",
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "post",

            datatype: 'Json',
            data: {
                email: "{{ encrypt($getProfileDetail->email) }}"
            },
            success: function(result) {
                if (result) {
                    swal.close();
                    $('#verification_email_otp').modal('show');
                }
            }

        });
    });
});
</script>
@endsection