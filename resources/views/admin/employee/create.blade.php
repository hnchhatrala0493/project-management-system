@extends('layouts.app')

@section('content')
<div class="app-container container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <form class="form p-10" action="{{route('employee.store')}}" method="post">
                @csrf
                <input type="hidden" name="profile_id" value="{{ rand(111111,999999)}}">
                <div class="row mb-9 col-14">
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Full Name</label>
                            <input type="text" class="form-control" name="full_name" />
                        </div>
                    </div>
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Father Name</label>
                            <input type="text" class="form-control" name="father_name" />
                        </div>
                    </div>
                </div>
                <!--end::Input group-->
                <div class="row mb-9 col-12">
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Mother Name</label>
                            <input type="text" class="form-control" name="mother_name" />
                        </div>
                    </div>
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Birth Date</label>
                            <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" />
                        </div>
                    </div>
                </div>
                <div class="row mb-9 col-12">
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Marital Status</label>
                            <!-- <input type="text" class="form-control" name="mother_name" /> -->
                            <select class="form-select" data-control="select2" name="marital_status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorce">Divorce</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Annivarsary Date</label>
                            <input type="text" class="form-control" name="date_of_anniversary"
                                id="date_of_anniversary" />
                        </div>
                    </div>
                </div>
                <div class="row mb-9 col-12">
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Gender</label>
                            <!-- <input type="text" class="form-control" name="salary" id="salary" /> -->
                            <select name="gender" id="gener" class="form-select" data-control="select2">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Joining Date</label>
                            <input type="text" class="form-control" name="date_of_joining" id="date_of_joining" />
                        </div>
                    </div>
                </div>
                <div class="row mb-9 col-12">
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Blood Group</label>
                            <!-- <input type="text" class="form-control" name="salary" id="salary" /> -->
                            <select class="form-select" data-control="select2" name="blood_group" id="blood_group">
                                <option value="A">A</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B">B</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O">O</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB">AB</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold required mb-2">Status</label>
                            <!-- <input type="text" class="form-control" name="date_of_joining" id="date_of_joining" /> -->
                            <select class="form-select" data-control="select2" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="fv-row">
                    <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                    <a href="javascript:void(0)" id="AddCompanyDetails" class="btn btn-success me-3">Add
                        Company</a>
                    <a href="javascript:void(0)" id="AddEducationDetails" class="btn btn-success me-3">Add Education</a>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <div class="modal fade" id="addMoreHistory" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" method="post" id="storeHistory">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Previous Company History</h2>
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
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="row col-12 mb-5">
                                <div class="fv-row col-6">
                                    <label class="fs-6 fw-semibold mb-2">Company Name</label>
                                    <input type="text" placeholder="Enter Company Name" class="form-control"
                                        name="history_of_previous_company[name_of_company]"
                                        id="history_of_previous_company[name_of_company]" value="" />
                                </div>
                                <div class="fv-row col-6">
                                    <label class="fs-6 fw-semibold mb-2">Role</label>
                                    <select class="form-select" data-control="select2"
                                        name="history_of_previous_company[role]">
                                        <option value="developer">Developer</option>
                                        <option value="team_lead">Team Lead</option>
                                        <option value="project manager">Project Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-12 mb-5">
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">Start Month</label>
                                    <select class="form-select" data-control="select2"
                                        name="history_of_previous_company[start_month]">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">Auguast</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">Start Year</label>
                                    <select class="form-select" data-control="select2"
                                        name="history_of_previous_company[start_year]">
                                        @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                        </option>@endfor
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">End Month</label>
                                    <select class="form-select" data-control="select2"
                                        name="history_of_previous_company[end_month]">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">Auguast</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">End Year</label>
                                    <select class="form-select" data-control="select2"
                                        name="history_of_previous_company[end_year]">
                                        @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                        </option>@endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="history"></div>
                    </div>
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Add</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!-- <a id="addMore" class="btn btn-success">Add More</a> -->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - Users Search-->
    <!--begin::Modal - New Product-->
    <div class="modal fade" id="addEducationMore" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" id="storeEducation" method="post">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add a Education</h2>
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
                        <div class="scroll-y me-n7 pe-7">
                            <div class="row col-12 mb-5">
                                <div class="fv-row col-6">
                                    <label class="fs-6 fw-semibold mb-2">Degree Name</label>
                                    <input type="text" placeholder="Enter Degree Name" class="form-control"
                                        name="educationalDetails[name_of_company]"
                                        id="educationalDetails[name_of_company]" />
                                </div>
                                <div class="fv-row col-6">
                                    <label class="fs-6 fw-semibold mb-2">University Name</label>
                                    <select class="form-select" data-control="select2"
                                        name="educationalDetails[university_name]">
                                        @foreach($universities as $university)
                                        <option value="{{$university->university_name}}">
                                            {{$university->university_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row col-12 mb-5">
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">Start Month</label>
                                    <select class="form-select" data-control="select2"
                                        name="educationalDetails[start_month]">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">Auguast</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">Start Year</label>
                                    <select class="form-select" data-control="select2"
                                        name="educationalDetails[start_year]">
                                        @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                        </option>@endfor
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">End Month</label>
                                    <select class="form-select" data-control="select2"
                                        name="educationalDetails[end_month]">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">Auguast</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="fv-row col-3">
                                    <label class="fs-6 fw-semibold mb-2">End Year</label>
                                    <select class="form-select" data-control="select2"
                                        name="educationalDetails[end_year]">
                                        @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                        </option>@endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="education"></div>
                    </div>
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <!-- <a class="btn btn-success" id="addEducationField"><i class="fa fa-plus"></i></a> -->
                        <button type="button" id="kt_modal_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Add</span>
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
<script src="{{url('js/add-more.js')}}"></script>
<script>
var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear(maxBirthdayDate.getFullYear() - 18);
$("#date_of_birth").flatpickr({
    dateFormat: "Y-m-d",
    enableTime: false,
    maxDate: maxBirthdayDate
});
$("#date_of_anniversary").flatpickr({
    dateFormat: "Y-m-d",
    enableTime: false,
    maxDate: "today"
});
$("#date_of_joining").flatpickr({
    dateFormat: "Y-m-d",
    enableTime: false
});
</script>
@endsection