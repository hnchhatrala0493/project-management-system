@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Full Name</th>
                        <th class="min-w-125px">Father Name</th>
                        <th class="min-w-125px">Mother Name</th>
                        <th class="min-w-125px">Birth date</th>
                        <th class="min-w-125px">Blood Group</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Date</th>
                        <th class="min-w-125px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($employees as $employee)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{$employee->id}}" />
                            </div>
                        </td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->father_name }}</td>
                        <td>{{ $employee->mother_name }}</td>
                        <td>{{ date('d-m-Y',strtotime($employee->date_of_birth)) }}</td>
                        <td>{{ $employee->blood_group }}</td>
                        <td>
                            @if($employee->status == 'Active')
                            <span class="badge py-3 px-4 fs-7 badge-light-success">{{ $employee->status }}</span>
                            @else
                            <span class="badge py-3 px-4 fs-7 badge-light-danger">{{ $employee->status }}</span>
                            @endif
                        </td>
                        <td>{{ $employee->created_at }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('employee.edit',['id'=>$employee->id])}}"
                                        class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"
                                        data-kt-users-table-filter="delete_row">Delete</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{route('employee.view',['id'=>$employee->id])}}"
                                        class="menu-link px-3">View</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{route('employee.education.details',['id'=>$employee->id])}}"
                                        class="menu-link px-3">Educational</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{route('employee.company.details',['id'=>$employee->id])}}"
                                        class="menu-link px-3">Company</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <div class="modal fade" id="modal_create_employee" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-950px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add Employee</h2>
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
                <div class="modal-body">
                    <!--begin::Form-->
                    <form class="form" action="{{route('employee.store')}}" method="post" id="createEmployee">
                        @csrf
                        <input type="hidden" name="profile_id" value="{{ rand(111111,999999)}}">
                        <div class="row mb-5 col-14">
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name" />
                                </div>
                            </div>
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Father Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" />
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-5 col-14">
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" />
                                </div>
                            </div>
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Birth Date</label>
                                    <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5 col-14">
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Marital Status</label>
                                    <!-- <input type="text" class="form-control" name="mother_name" /> -->
                                    <select class="form-select" data-control="select2" name="marital_status"
                                        id="marital_status">
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
                        <div class="row mb-5 col-14">
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
                                    <input type="text" class="form-control" name="date_of_joining"
                                        id="date_of_joining" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5 col-14">
                            <div class="row col-6">
                                <div class="form-group">
                                    <label class="fs-6 fw-semibold required mb-2">Blood Group</label>
                                    <!-- <input type="text" class="form-control" name="salary" id="salary" /> -->
                                    <select class="form-select" data-control="select2" name="blood_group"
                                        id="blood_group">
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
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
</div>
@endsection
@section('script')
<script src="{{url('js/jquery.validate.js')}}"></script>
<script src="{{url('js/validation/employee_validation.js')}}"></script>
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