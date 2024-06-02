<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\StaffMembers;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage Employee';
        $employees = StaffMembers::getRecordList();
        return view( 'admin.employee.index', compact( 'employees', 'title' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $title = 'Add Employee';
        $universities = University::getRecordList();
        $languages = Language::getRecordList();
        return view( 'admin.employee.create', compact( 'title', 'languages', 'universities' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $staff = StaffMembers::create( [
            'profile_id'=>$request->get( 'profile_id' ),
            'full_name'=>$request->get( 'full_name' ),
            'father_name'=>$request->get( 'father_name' ),
            'mother_name'=>$request->get( 'mother_name' ),
            'date_of_birth'=>$request->get( 'date_of_birth' ),
            'marital_status'=>$request->get( 'marital_status' ),
            'date_of_anniversary'=>$request->get( 'date_of_anniversary' ),
            'salary'=>$request->get( 'salary' ),
            'date_of_joining'=>$request->get( 'date_of_joining' ),
            'blood_group'=>$request->get( 'blood_group' ),
            'status'=>$request->get( 'status' ),
            'educationalDetails'=>json_encode( $request->get( 'educationalDetails' ) ),
            'history_of_previous_company'=>json_encode( $request->get( 'history_of_previous_company' ) ),
        ] );
        if ( $staff ) {
            return redirect()->route( 'employee.index' );
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $employeeDetail = StaffMembers::find( $id );
        $subTitle = 'View Details of '. ucfirst( $employeeDetail->full_name );
        $title = 'View Details';
        return view( 'admin.employee.view', compact( 'title', 'subTitle', 'employeeDetail' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $employeeDetail = StaffMembers::find( $id );
        $subTitle = 'View Details of '. ucfirst( $employeeDetail->full_name );
        $title = 'View Details';
        return view( 'admin.employee.edit', compact( 'title', 'subTitle', 'employeeDetail' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $staff = StaffMembers::where( 'id', $id )->update( [
            'profile_id'=> $request->get( 'full_name' ),
            'full_name'=> $request->get( 'full_name' ),
            'father_name'=> $request->get( 'father_name' ),
            'mother_name'=> $request->get( 'mother_name' ),
            'isBrotherOrSister'=>$request->get( 'isBrotherOrSister' ),
            'date_of_birth'=>$request->get( 'date_of_birth' ),
            'date_of_anniversary'=>$request->get( 'date_of_anniversary' ),
            'date_of_joining'=>$request->get( 'date_of_joining' ),
            'salary'=>$request->get( 'salary' ),
            'blood_group'=>$request->get( 'blood_group' ),
        ] );
        if ( $staff ) {
            return redirect()->route( 'employee.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $staff = StaffMembers::where( 'id', $id )->delete();
        if ( $staff ) {
            return redirect()->route( 'employee.index' );
        }
    }

    public function educationDetails( Request $request, $staffMemberId ) {
        $universities = University::getRecordList();
        $title = 'Add Education Details';
        $education = StaffMembers::getEducationDetails( $staffMemberId );
        return view( 'admin.employee.education', compact( 'universities', 'title', 'education', 'staffMemberId' ) );
    }

    public function companyDetails( Request $request, $staffMemberId ) {
        $title = 'Add Company Details';
        $company = StaffMembers::getPreviousCompanyDetails( $staffMemberId );
        return view( 'admin.employee.company_history', compact( 'title', 'staffMemberId', 'company' ) );
    }

    public function storeHistory( Request $request ) {
        $staff = DB::table( 'history_of_company_details' )->InsertGetId( [
            'staff_member_id'=>$request->get( 'staffMember_id' ),
            'company_name'=>$request->get( 'history_of_previous_company' )[ 'name_of_company' ],
            'role'=>$request->get( 'history_of_previous_company' )[ 'role' ],
            'duration'=> json_encode( [
                'start_month' => $request->get( 'history_of_previous_company' )[ 'start_month' ],
                'start_year' => $request->get( 'history_of_previous_company' )[ 'start_year' ],
                'end_month' => $request->get( 'history_of_previous_company' )[ 'end_month' ],
                'end_year' => $request->get( 'history_of_previous_company' )[ 'end_year' ]
            ] )
        ] );
        if ( $staff ) {
            return redirect()->route( 'employee.company.details', [ 'id'=>$request->get( 'staffMember_id' ) ] );
        }
    }

    public function storeEducation( Request $request ) {
        $staff = DB::table( 'education_details' )->InsertGetId( [
            'staff_member_id'=>$request->get( 'staffMember_id' ),
            'degree_name'=>$request->get( 'educationalDetails' )[ 'name_of_degree' ],
            'university_name'=>$request->get( 'educationalDetails' )[ 'university_name' ],
            'duration'=> json_encode( [
                'start_month' => $request->get( 'educationalDetails' )[ 'start_month' ],
                'start_year' => $request->get( 'educationalDetails' )[ 'start_year' ],
                'end_month' => $request->get( 'educationalDetails' )[ 'end_month' ],
                'end_year' => $request->get( 'educationalDetails' )[ 'end_year' ]
            ] )
        ] );
        if ( $staff ) {
            return redirect()->route( 'employee.education.details', [ 'id'=>$request->get( 'staffMember_id' ) ] );
        }
    }
}