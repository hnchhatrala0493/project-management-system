<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    function __construct()
 {
        // $this->middleware( [ 'permission:role-list|role-create|role-edit|role-delete' ], [ 'only' => [ 'index', 'store' ] ] );
        // $this->middleware( [ 'permission:role-create' ], [ 'only' => [ 'create', 'store' ] ] );
        // $this->middleware( [ 'permission:role-edit' ], [ 'only' => [ 'edit', 'update' ] ] );
        // $this->middleware( [ 'permission:role-delete' ], [ 'only' => [ 'destroy' ] ] );
    }

    public function index() {
        $title = 'Manage Role';
        $addtitle = 'Role';
        $roleList = Role::getRecordList();
        return view( 'admin.role.index', compact( 'roleList', 'title', 'addtitle' ) );
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
        $role = Role::create( [
            'name'=> $request->role_name,
            'guard_name'=> 'web'
        ] );
        if ( $role ) {
            return redirect()->back();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $role = Role::getRecordById( $id );
        $modules = Module::getRecordList();
        $title = 'Edit Role';
        $rolesHasPermission = DB::table( 'permissions as p' )
        ->select( 'm.title as  moduleName', DB::raw( 'GROUP_CONCAT(p.id SEPARATOR ", ") as ids' ), DB::raw( 'GROUP_CONCAT(p.can_permission_name SEPARATOR ", ") as can' ) )
        ->join( 'modules as m', 'p.module_id', 'm.id' )
        ->groupBy( 'moduleName' )
        ->get()->toArray();
        $rolePermission = DB::table( 'role_has_permissions' )->where( 'role_id', $id )->get()->toArray();
        //dd( $rolePermission );
        return view( 'admin.role.view', compact( 'role', 'title', 'rolesHasPermission', 'rolePermission' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $role = Permission::getRecordList();
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request ) {
        Role::where( 'id', $request->role_Id )->update( [
            'name'=> $request->get( 'role_name' )
        ] );
        foreach ( $request->get( 'role' ) as $role ) {
            DB::table( 'role_has_permissions' )->insertGetId( [
                'permission_id'=>$role,
                'role_id'=>$request->get( 'role_Id' ),
            ] );
        }
        return redirect()->back();
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
}