@extends('layouts.app')
@section('content')
<div class="app-container container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <form class="form p-10" action="{{route('employee.history.store',['id'=>$staffMemberId])}}" method="post">
                @csrf
                <input type="hidden" value="{{$staffMemberId}}" name="staffMember_id" />
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="fs-1 fw-semibold mb-2">Previous Company History</label>
                    <div class="row col-12 mb-5">
                        <div class="fv-row col-6">
                            <label class="fs-6 fw-semibold mb-2">Company Name</label>
                            <input type="text" placeholder="Enter Company Name" class="form-control"
                                name="history_of_previous_company[name_of_company]"
                                id="history_of_previous_company[name_of_company]" value="" />
                        </div>
                        <div class="fv-row col-6">
                            <label class="fs-6 fw-semibold mb-2">Role</label>
                            <select class="form-select" data-control="select2" name="history_of_previous_company[role]">
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
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Auguast">Auguast</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
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
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Auguast">Auguast</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
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
                <div class="fv-row">
                    <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                    <a href="javascript:void(0)" id="AddCompanyDetails" class="btn btn-success me-3">Add
                        More Company</a>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex flex-column flex-lg-row mt-10">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Company Name</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">Start Month</th>
                        <th class="min-w-125px">Start Year</th>
                        <th class="min-w-125px">End Month</th>
                        <th class="min-w-125px">End Year</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($company as $company)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{$company->id}}" />
                            </div>
                        </td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->role }}</td>
                        @php
                        $new = json_decode( $company->duration);
                        @endphp
                        @foreach($new as $v)
                        <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection