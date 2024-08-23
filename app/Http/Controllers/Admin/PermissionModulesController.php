<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionModulesController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage Permission';
        $addtitle = 'Permission';
        $permissionList = Permission::getRecordPermission();
        $permissions = Permission::getRecordRoleHasPermissions();
        $modules = Module::getRecordList();
        $roles = Role::getRecordList();
        $assignTo = Role::getAssignTo();
        return view( 'admin.permission.index', compact( 'title', 'permissionList', 'permissions', 'addtitle', 'modules', 'roles', 'assignTo' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        return Permission::create( $request->all() );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( Request $request, $id ) {
        $title = 'Edit Permission';
        $modules = Module::getRecordList();
        $role = Role::getRecordById( $id );
        // dd( $role );
        return view( 'admin.permission.edit', compact( 'title', 'modules', 'role' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function getpermissionbyRole( $id ) {
        $title = 'Edit Permission';
        $modules = Module::getRecordList();
        $role = Role::getRecordById( $id );
        return view( 'admin.permission.edit', compact( 'title', 'modules', 'role' ) );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function permissionbyRole( $id, Request $request ) {
        $title = 'Given Permission';
        // dd( $request->all() );
        $modules = Module::getRecordList();
        $role = Role::getRecordById( $id );
        // return view( 'admin.permission.edit', compact( 'title', 'modules', 'role' ) );
    }
}