@extends('layouts.app')

@section('content')
<div class="app-container container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <form class="form p-10" action="{{route('team.store')}}" method="post">
                @csrf
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="team_member_name" class="form-control"
                        value="{{$getDetails->team_member_name}}">
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Team Member Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select" multiple name="team_member_id[]" data-control="select2">
                        @foreach($staffMembers as $staffMember)
                        <option value="{{ $staffMember->id }}"
                            {{ $getDetails->team_member_id == $staffMember->id ? 'selected' : '' }}>
                            {{$staffMember->full_name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Select Language</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select" multiple name="language[]" data-control="select2">
                        @foreach($languages as $language)
                        <option value="{{ $language->id }}"
                            {{ $getDetails->language_id == $language->id ? 'selected' : '' }}>
                            {{$language->language_name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-2">Role Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select" name="role" data-control="select2">
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ $getDetails->language_id == $language->id ? 'selected' : '' }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-2">Status</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select" name="status" data-control="select2">
                        <option value="Active">Active</option>
                        <option value="Inactive">In Active</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="fv-row">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Layout-->
    <!--begin::Modals-->
    <!--begin::Modal - Users Search-->

    <!--end::Modal - Users Search-->
    <!--begin::Modal - New Product-->
    <div class="modal fade" id="kt_modal_add_product" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_product_form">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add a Product</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                        <!--begin::Label-->
                        <h3 class="mb-7">
                            <span class="fw-bold required">Select Subscription</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Please select a subscription">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </h3>
                        <!--end::Label-->
                        <!--begin::Scroll-->
                        <div class="scroll-y mh-300px me-n7 pe-7">
                            <!--begin::Product-->
                            <div class="fv-row">
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product" checked="checked"
                                            data-kt-product-name="Basic" data-kt-product-price="15.99"
                                            data-kt-product-frequency="Month" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Basic</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Basic subscription</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$15.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Month</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Basic Bundle" data-kt-product-price="149.99"
                                            data-kt-product-frequency="Year" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Basic Bundle</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Basic yearly bundle</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$149.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Year</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Teams" data-kt-product-price="20.99"
                                            data-kt-product-frequency="Month" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Teams</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Teams subscription</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$20.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Month</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Teams Bundle" data-kt-product-price="199.99"
                                            data-kt-product-frequency="Year" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Teams Bundle</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Teams yearly bundle</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$199.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Year</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Corporate" data-kt-product-price="224.99"
                                            data-kt-product-frequency="Month" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Corporate</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Corporate subscription</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$224.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Month</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Corporate Bundle" data-kt-product-price="1249.99"
                                            data-kt-product-frequency="Year" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Corporate Bundle</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Corporate yearly bundle</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$1249.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Year</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Enterprise" data-kt-product-price="224.99"
                                            data-kt-product-frequency="Month" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Enterprise</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Enterprise subscription</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$224.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Month</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                                <!--begin::Subscription-->
                                <label class="d-flex align-items-center mb-5">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="radio" name="product"
                                            data-kt-product-name="Enterprise Bundle" data-kt-product-price="2249.99"
                                            data-kt-product-frequency="Year" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Description-->
                                    <span class="d-flex flex-column me-3">
                                        <span class="fw-bold">Enterprise Bundle</span>
                                        <span class="text-gray-400 fw-semibold fs-6">Enterprise yearly bundle</span>
                                    </span>
                                    <!--end::Description-->
                                    <!--begin::Pricing-->
                                    <span class="fw-bold ms-auto">$2249.99 /
                                        <span class="text-gray-400 fs-6 fw-semibold">Year</span></span>
                                    <!--end::Pricing-->
                                </label>
                                <!--end::Subscription-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_product_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" id="kt_modal_add_product_submit" class="btn btn-primary">
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