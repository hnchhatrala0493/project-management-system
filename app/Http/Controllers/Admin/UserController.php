<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\EmailLog;
use App\Models\Role;
use App\Models\StaffMembers;
use App\Models\User;
use App\Models\VerificationOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $title = 'Manage User';
        $addtitle = 'User';
        $userList = User::getRecordList();
        $roles = Role::getRecordList();
        $staffMember = StaffMembers::getRecordList();
        return view( 'admin.user.index', compact( 'title', 'userList', 'addtitle', 'roles', 'staffMember' ) );
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
        $users = array_column( $request->get( 'users' ), 'value', 'name' );
        $getMemberId = StaffMembers::getMemberberIdByFullName( $users[ 'name' ] );
        $user = User::create( [
            'member_id' => $getMemberId->profile_id,
            'name' => $users[ 'name' ],
            'email' => $users[ 'email' ],
            'phone' => $users[ 'phone' ],
            'password' => Hash::make( 'Admin@123' ),
            'role' => $users[ 'role' ],
        ] );
        if ( $user ) {
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
        $title = 'Edit User';
        $roles = Role::getRecordList();
        $staffMember = StaffMembers::getRecordList();
        $getUser = User::getRecordById( $id );
        return response()->json( [ 'data'=> [ 'getUser'=>$getUser, 'staffMember'=> $staffMember, 'roles'=> $roles, 'title'=>$title ], 'status_code'=>200, 'result'=>'pass' ] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $users = array_column( $request->get( 'users' ), 'value', 'name' );
        $userUpdate = User::where( 'id', $users[ 'userId' ] )->update( [
            'member_id'=> $users[ 'memberId' ],
            'name'=> $users[ 'name' ],
            'email'=> $users[ 'email' ],
            'phone'=> $users[ 'phone' ],
            'role'=> $users[ 'role' ],
            'password'=> Hash::make( 'Admin@123' )
        ] );
        if ( $userUpdate ) {
            return response()->json( [ 'result'=>'pass', 'status'=> 200 ] );
        } else {
            return response()->json( [ 'result'=>'fail', 'status'=> 500 ] );
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

    public function sendEmailForChangePassword( $email, $name ) {
        $emailTemplate = 'admin.email_template.changePassword';
        $subject = 'Change Your Password';
        $data = [
            'link' => route( 'user.new.password', [ 'email' => encrypt( $email ), 'name'=> encrypt( $name ) ] ),
            'name' => $name
        ];
        EmailLog::create( [
            'subject' => env( 'APP_NAME' ).' - '. $subject,
            'to' => $email,
            'from'=> env( 'MAIL_FROM_ADDRESS' ),
            'date'=>date( 'Y-m-d', strtotime( 'now' ) )
        ] );

        SendEmail::sendEmail( $emailTemplate, $data, $email, $name, $subject );
        return redirect()->back();
    }

    public function ChangePassword( Request $request ) {
        $email = $request->get( 'email' );
        $name = $request->get( 'name' );
        return view( 'admin.user.newPassword', compact( 'email', 'name' ) );
    }

    public function SendOTPByEmail( Request $request ) {
        $subject = 'Your Email OTP';
        $email = decrypt( $request->email );
        $emailTemplate = 'admin.email_template.email_otp';
        $OTP = rand( 11111111, 99999999 );
        $data = [
            'emailOTP' => $OTP,
            'name' => 'User'
        ];
        $otpData = [
            'type'=>'email',
            'otp'=>$OTP,
            'user_id' =>Auth::id(),
            'otp_status'=> 'Not Verify'
        ];
        VerificationOTP::InsertGetId( $otpData );
        SendEmail::sendEmail( $emailTemplate, $data, $email, 'User', $subject );
        EmailLog::create( [
            'subject' => env( 'APP_NAME' ).' - '. $subject,
            'to' => $email,
            'from'=>env( 'MAIL_FROM_ADDRESS' ),
            'date'=>date( 'Y-m-d', strtotime( 'now' ) )
        ] );
        return redirect()->back();
    }

    public function SendOTPByPhone( Request $request ) {
        $token  = env( 'TWILLO_TOKEN' );
        $account_sid = env( 'TWILLO_ACCOUNT_SID' );
        $phone = decrypt( $request->get( 'phone' ) );
        // Recipient and sender numbers
        $to = '+91'.$phone;
        $from = '+17013944819';

        $OTP = rand( 11111111, 99999999 );
        $otpData = [
            'type'=>'phone',
            'otp'=> $OTP,
            'user_id' => Auth::id(),
            'otp_status'=> 'Not Verify'
        ];
        VerificationOTP::InsertGetId( $otpData );
        // Message body
        $body = 'Your Verification Code is : '. $OTP;

        // Twilio API endpoint
        $url = env( 'TWILLO_URL' ) . $account_sid . '/Messages.json';

        // Data to be sent in POST request
        $data = array(
            'To' => $to,
            'From' => $from,
            'Body' => $body
        );

        // Initialize cURL
        $ch = curl_init();
        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
        curl_setopt( $ch, CURLOPT_USERPWD, $account_sid . ':' . $token );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        // Execute cURL request
        $response = curl_exec( $ch );
        // Check for errors
        return $response;
    }

    public function VerificationCodeByPhone( Request $request ) {
        $code = $request->code;
        $verified = VerificationOTP::where( [ 'user_id'=> Auth::user()->id, 'otp'=> $code ] )->update( [ 'otp_status'=>'Verified' ] );
        if ( $verified ) {
            User::where( 'id', Auth::id() )->update( [ 'phone_verified_at'=>date( 'Y-m-d h:i:s' ) ] );
        }
        return redirect()->back();
    }

    public function VerificationCodeByEmail( Request $request ) {
        $code = $request->code;
        $verified = VerificationOTP::where( [ 'user_id'=> Auth::user()->id, 'otp'=> $code ] )->update( [ 'otp_status'=>'Verified' ] );
        if ( $verified ) {
            User::where( 'id', Auth::id() )->update( [ 'email_verified_at'=>date( 'Y-m-d h:i:s' ) ] );
        }
        return redirect()->back();
    }

    public function UpdatePassword( Request $request ) {
        $subject = 'Your password has been successfully updated';
        $email = decrypt( $request->get( 'email' ) );
        $name = decrypt( $request->get( 'name' ) ) ?? 'Admin';
        $password = $request->get( 'password' );
        $emailTemplate = 'admin.email_template.changedPassword';
        $data = [
            'name'=> $name
        ];
        $updatePassword = User::UpdatePasswordByEmail( $email, $password );
        if ( $updatePassword ) {
            EmailLog::create( [
                'subject' => env( 'APP_NAME' ).' - '. $subject,
                'to' => $request->get( 'email' ),
                'from'=>env( 'MAIL_FROM_ADDRESS' ),
                'date'=>date( 'Y-m-d', strtotime( 'now' ) )
            ] );
            SendEmail::sendEmail( $emailTemplate, $data, $email, $name, $subject );
        }
        return redirect()->route( 'logout' );
    }

}