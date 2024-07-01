<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Role;
use App\Models\StaffMembers;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Team Member';
        $teamMembers = TeamMember::getRecordList();
        return view( 'admin.team.index', compact( 'title', 'teamMembers' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $title = 'Add Team Leader Detail';
        $staffMembers = StaffMembers::getRecordList();
        $roles = Role::getRecordList();
        $languages = Language::getRecordList();
        return view( 'admin.team.create', compact( 'title', 'staffMembers', 'roles', 'languages' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $language = implode( ',', $request->get( 'language' ) );
        foreach ( $request->get( 'team_member_id' ) as $team ) {
            $teamLeader = TeamMember::create( [
                'team_member_name' => $request->team_member_name,
                'team_member_id' => $team,
                'language_id' => $language,
                'role' => 'Team Leader',
            ] );
        }
        if ( $teamLeader ) {
            return redirect()->route( 'team.index' );
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $title = 'View Details';
        $getDetails = TeamMember::find( $id );
        //dd( $getDetails );
        return view( 'admin.team.view', compact( 'title', 'getDetails' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $title = 'Edit Team Member';
        $getDetails = TeamMember::getRecordById( $id );
        $staffMembers = StaffMembers::getRecordList();
        $roles = Role::getRecordList();
        $languages = Language::getRecordList();
        return view( 'admin.team.edit', compact( 'title', 'getDetails', 'staffMembers', 'roles', 'languages' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $language = implode( ',', $request->get( 'language' ) );
        foreach ( $request->get( 'team_member_id' ) as $team ) {
            $teamUpdate = TeamMember::where( 'id', $id )->update( [
                'team_member_name' => $request->team_member_name,
                'team_member_id' => $team,
                'language_id' => $language,
                'role' => 'Team Leader',
            ] );
        }
        if ( $teamUpdate ) {
            return redirect()->route( 'team.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $delete = TeamMember::where( 'id', $id )->delete();
        if ( $delete ) {
            return redirect()->route( 'team.index' );
        }
    }
}