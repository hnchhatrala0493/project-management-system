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
</div>
@endsection