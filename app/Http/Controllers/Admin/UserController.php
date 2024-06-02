<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailLog;
use App\Models\Role;
use App\Models\StaffMembers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SimonMarcelLinden\Toast\Facades\Toast;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage User';
        $userList = User::getRecordList();
        return view( 'admin.user.index', compact( 'title', 'userList' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $title = 'Add User';
        $roles = Role::getRecordList();
        $staffMember = StaffMembers::getRecordList();
        return view( 'admin.user.create', compact( 'roles', 'staffMember', 'title' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $getMemberId = StaffMembers::getMemberberIdByFullName( $request->get( 'name' ) );
        $user = User::create( [
            'member_id' => $getMemberId->profile_id,
            'name' => $request->get( 'name' ),
            'email' => $request->get( 'email' ),
            'phone' => $request->get( 'phone' ),
            'password' => Hash::make( 'Admin@123' ),
            'role' => $request->get( 'role' ),
        ] );
        if ( $user ) {
            return redirect()->route( 'user.index' );
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
        $getDetails = User::find( $id );
        return view( 'admin.user.view', compact( 'title', 'getDetails' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $title = 'Add User';
        $roles = Role::getRecordList();
        $staffMember = StaffMembers::getRecordList();
        $getUser = User::getRecordById( $id );
        return view( 'admin.user.edit', compact( 'title', 'roles', 'staffMember', 'getUser' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $user = User::where( 'id', $id )->update( [
            'member_id'=> $request->get( 'member_id' ),
            'name'=>$request->get( 'name' ),
            'email'=>$request->get( 'email' ),
            'phone'=>$request->get( 'phone' ),
            'role'=>$request->get( 'role' ),
            'password'=>Hash::make( 'Admin@123' )
        ] );
        if ( $user ) {
            return redirect()->route( 'user.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $user = User::where( 'id', $id )->delete();
        if ( $user ) {
            return redirect()->route( 'user.index' );
        }
    }

    public function getProfile( $id ) {
        $getProfileDetail = User::getRecordById( $id );
        $title = 'User Profile';
        return view( 'admin.user.profile', compact( 'getProfileDetail', 'title' ) );
    }

    public function changePasswordOrEmail( Request $request ) {
        $title = 'User Profile';
        $id = Auth::id();
        $getProfileDetail = User::getRecordById( $id );
        if ( $request->get( 'userEmail' ) == 'emailChange' ) {
            if ( $request->get( 'emailaddress' ) != $request->get( 'confirmemail' ) ) {
                return redirect()->route( 'user.profile', [ 'id'=> $id ] );
            }
            $email = User::where( 'id', $id )->update( [
                'email'=> $request->get( 'emailaddress' )
            ] );
            if ( $email ) {
                return redirect()->route( 'user.profile', [ 'id'=>$id ] );
            }
        } else {
            if ( !Hash::check( $request->get( 'currentpassword' ), $getProfileDetail->password ) ) {
                return redirect()->route( 'user.profile', [ 'id'=> $id ] );
            }
            if ( $request->get( 'newpassword' ) != $request->get( 'confirmpassword' ) ) {
                return redirect()->route( 'user.profile', [ 'id'=> $id ] );
            }
            $password = User::where( 'id', $id )->update( [
                'password'=>Hash::make( $request->get( 'confirmpassword' ) )
            ] );
            if ( $password ) {
                return redirect()->route( 'user.profile', [ 'id'=>$id ] );
            }
        }
        return view( 'admin.user.profile', compact( 'getProfileDetail', 'title' ) );
    }

    public function sendEmailForChangePassword( $email,$name ) {
        $data = [];
        EmailLog::create([
            'subject' => env('APP_NAME').' - '. " Change Password",
            'to' => $email,
            'from'=>env('MAIL_FROM_ADDRESS'),
            'date'=>date('Y-m-d',strtotime('now'))
        ]);
        
        Mail::send('admin.email.changePassword',$data,function($message) use ( $email,$name) {
            $message->to($email, $name)
            ->subject(env('APP_NAME').' - '. " Change Password");
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });      
        
        return redirect()->back();
    }
}