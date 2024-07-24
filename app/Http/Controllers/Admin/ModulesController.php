<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class ModulesController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage Module';
        $addtitle = 'Module';
        $getModuleList = Module::getRecordList();
        return view( 'admin.module.index', compact( 'title', 'addtitle', 'getModuleList' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $title = 'Manage Module';
        return view( 'admin.module.index', compact( 'title' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $module = Module::create(
            [
                'title'=>$request->get( 'title' ),
                'menu_name'=>$request->get( 'menu_name' ),
                'controller_name'=>$request->get( 'controller_name' ),
                'model_name'=>$request->get( 'model_name' ),
                'view_name'=>$request->get( 'view_name' ),
                'table_name'=>$request->get( 'table_name' ),
                'route_name'=>$request->get( 'route_name' ),
            ]
        );
        foreach ( $request->get( 'permission' ) as $permissionValue ) {
            Permission::InsertGetId( [
                'module_id'=>$module->id,
                'can_permission_name'=> $permissionValue,
                'name'=> $permissionValue. ' '. strtolower( $request->get( 'title' ) ),
                'guard_name'=>'web'
            ] );
        }
        if ( $module ) {
            return redirect()->route( 'module.index' );
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function getPermissionList( Request $request ) {
        dd( $request );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
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
}