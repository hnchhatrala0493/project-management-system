<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage Projects';
        $addtitle = 'Project';
        $projects = Projects::getRecordList();
        $categorys = Category::get();
        return view( 'admin.project.index', compact( 'title', 'projects', 'addtitle', 'categorys' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $title = 'Projects';
        $categorys = Category::get();
        return view( 'admin.project.create', compact( 'title', 'categorys' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $projects = array_column( $request->get( 'projects' ), 'value', 'name' );
        $addproject = Projects::create( $projects );
        if ( $addproject ) {
            return response()->json( [ 'status_code' => 200, 'result'=>'1', 'messages' => 'Record Added Successfully' ] );
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $title = 'Projects';
        $subTitle = Projects::find( $id )->project_name;
        $projectDetail = Projects::find( $id );
        return view( 'admin.project.view', compact( 'title', 'subTitle', 'projectDetail' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $title = 'Projects';
        $addtitle = 'Edit Project';
        $projectDetail = Projects::find( $id );
        $categorys = Category::get();
        return view( 'admin.project.edit', compact( 'title', 'projectDetail', 'categorys', 'addtitle' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request ) {
        $project = Projects::findorfail( $request->get( 'project_id' ) );
        $project->update( $request->all() );
        if ( $project ) {
            return redirect()->route( 'project.index' );
        }
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