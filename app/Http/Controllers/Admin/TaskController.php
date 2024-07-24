<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {
        $title = 'Manage Tasks';
        $addtitle = 'Task';
        $userId = Auth::user()->id;
        $taskList = Tasks::getRecordList( $userId );
        if ( !$request->ajax() ) {
            return view( 'admin.task.index', compact( 'taskList', 'title', 'addtitle' ) );
        } else {
            $taskList = Tasks::getRecordByProId( $request->project_id );
            return response()->json( [ 'status'=> 200, 'messages'=> '', 'result'=> 'pass', 'taskList'=> $taskList ] );
        }

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return view( 'admin.task.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $task = Tasks::create( [
            'project_id'=> $request->project_id,
            'title'=> $request->title,
            'task_description'=> $request->description,
            'task_status'=> $request->task_status,
            'task_start_date_time'=> $request->start_date,
            'task_end_date_time'=> $request->due_date,
            'assign_task_member_id'=> $request->user,
        ] );
        if ( $task ) {
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
        return view( 'admin.task.view' );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        return view( 'admin.task.edit' );
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