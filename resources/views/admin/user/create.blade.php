@extends('layouts.app')
@section('content')
<div class="app-container container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <form class="form p-10" action="{{route('user.store')}}" method="post">
                @csrf
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select" name="name" data-control="select2">
                        @foreach($staffMember as $staffMembers)
                        <option value="{{ $staffMembers->full_name }}">{{$staffMembers->full_name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" class="form-control" name="email" />
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-9">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold required mb-2">Phone</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control" name="phone" />
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
                        <option value="{{ $role->name }}">{{$role->name}}</option>
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
    <!--end::Modal - New Product-->
    <!--begin::Modal - New Card-->
    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Add New Card</h2>
                    <!--end::Modal title-->
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Name On Card</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="card_name"
                                value="Max Doe" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                <!--end::Input-->
                                <!--begin::Card logos-->
                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                    <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                </div>
                                <!--end::Card logos-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Col-->
                            <div class="col-md-8 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_month" class="form-select form-select-solid"
                                            data-control="select2" data-hide-search="true" data-placeholder="Month">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_year" class="form-select form-select-solid"
                                            data-control="select2" data-hide-search="true" data-placeholder="Year">
                                            <option></option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">CVV</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" minlength="3"
                                        maxlength="4" placeholder="CVV" name="card_cvv" />
                                    <!--end::Input-->
                                    <!--begin::CVV icon-->
                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                        <i class="ki-duotone ki-credit-cart fs-2hx">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <!--end::CVV icon-->
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="me-5">
                                <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget
                                    planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label fw-semibold text-muted">Save Card</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel"
                                class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Card-->
    <!--end::Modals-->
</div>
@endsection