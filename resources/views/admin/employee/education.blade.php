@extends('layouts.app')
@section('content')
<div class="app-container container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="card card-body flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Form-->
            <form class="form p-10" action="{{route('employee.education.store',['id'=>$staffMemberId])}}" method="post">
                @csrf
                <input type="hidden" value="{{$staffMemberId}}" name="staffMember_id" />
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="fs-1 fw-semibold mb-2">Education Details</label>
                    <div class="row col-12 mb-5">
                        <div class="fv-row col-6">
                            <label class="fs-6 fw-semibold mb-2">Degree Name</label>
                            <input type="text" placeholder="Enter Degree Name" class="form-control"
                                name="educationalDetails[name_of_degree]" id="educationalDetails[name_of_degree]" />
                        </div>
                        <div class="fv-row col-6">
                            <label class="fs-6 fw-semibold mb-2">University Name</label>
                            <select class="form-select" data-control="select2"
                                name="educationalDetails[university_name]">
                                @foreach($universities as $university)
                                <option value="{{$university->university_name}}">{{$university->university_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mb-5">
                        <div class="fv-row col-3">
                            <label class="fs-6 fw-semibold mb-2">Start Month</label>
                            <select class="form-select" data-control="select2" name="educationalDetails[start_month]">
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
                            <select class="form-select" data-control="select2" name="educationalDetails[start_year]">
                                @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                </option>@endfor
                            </select>
                        </div>
                        <div class="fv-row col-3">
                            <label class="fs-6 fw-semibold mb-2">End Month</label>
                            <select class="form-select" data-control="select2" name="educationalDetails[end_month]">
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
                            <select class="form-select" data-control="select2" name="educationalDetails[end_year]">
                                @for($i = date( 'Y' );$i >= date( 'Y' )-25;$i--) <option value="{{$i}}">{{$i}}
                                </option>@endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="fv-row">
                    <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                    <!-- <a href="javascript:void(0)" id="AddEducationDetails" class="btn btn-success me-3">Add Education</a> -->
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
                        <th class="min-w-125px">Degree Name</th>
                        <th class="min-w-125px">University Name</th>
                        <th class="min-w-125px">Start Month</th>
                        <th class="min-w-125px">Start Year</th>
                        <th class="min-w-125px">End Month</th>
                        <th class="min-w-125px">End Year</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($education as $education)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{$education->id}}" />
                            </div>
                        </td>
                        <td>{{ $education->degree_name }}</td>
                        <td>{{ $education->university_name }}</td>
                        @php
                        $new = json_decode( $education->duration);
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