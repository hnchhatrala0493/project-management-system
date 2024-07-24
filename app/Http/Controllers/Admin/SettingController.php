<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
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
        //
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

    public function edit( $id ) {
        //return view( '' );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request ) {
        $setting = [
            'date_format' => [
                'setting_key'=> 'DATE_FORMAT',
                'setting_value'=> $request->get( 'date_format' )
            ],
            'app_name'=>[
                'setting_key'=> 'APP_NAME',
                'setting_value'=> $request->get( 'app_name' )
            ],
            'mailer'=>[
                'setting_key'=> 'MAIL_MAILER',
                'setting_value'=> $request->get( 'mailer' )
            ],
            'host'=>[
                'setting_key'=> 'MAIL_HOST',
                'setting_value'=> $request->get( 'host' )
            ],
            'port'=>[
                'setting_key'=> 'MAIL_PORT',
                'setting_value'=> $request->get( 'port' )
            ],
            'username'=>[
                'setting_key'=> 'MAIL_USERNAME',
                'setting_value'=> $request->get( 'username' )
            ],
            'password'=>[
                'setting_key'=> 'MAIL_PASSWORD',
                'setting_value'=> $request->get( 'password' )
            ],
            'encryption'=>[
                'setting_key'=> 'MAIL_ENCRYPTION',
                'setting_value'=> $request->get( 'encryption' )
            ],
            'address'=>[
                'setting_key'=> 'MAIL_FROM_ADDRESS',
                'setting_value'=> $request->get( 'address' )
            ],
            'token'=>[
                'setting_key'=> 'TWILLO_TOKEN',
                'setting_value'=> $request->get( 'twillo_token' )
            ],
            'twillo_account_sid'=>[
                'setting_key'=> 'TWILLO_ACCOUNT_SID',
                'setting_value'=> $request->get( 'twillo_account_sid' )
            ],
            'twillo_url'=>[
                'setting_key'=> 'TWILLO_URL',
                'setting_value'=> $request->get( 'twillo_url' )
            ],
            'meta_title'=>[
                'setting_key'=> 'META_TITLE',
                'setting_value'=> $request->get( 'meta_title' )
            ],
            'meta_subtitle'=>[
                'setting_key'=> 'META_SUBTITLE',
                'setting_value'=> $request->get( 'meta_subtitle' )
            ],
            'meta_description'=>[
                'setting_key'=> 'META_DESCRIPTION',
                'setting_value'=> $request->get( 'meta_description' )
            ]
        ];
        foreach ( $setting as $value ) {
            $getAll = DB::table( 'setting' )->where( [ 'setting_key'=> $value[ 'setting_key' ] ] )->count();
            if ( $getAll>0 ) {
                $setting = DB::table( 'setting' )->where( [ 'setting_key'=> $value[ 'setting_key' ] ] )->update( [ 'setting_value'=> $value[ 'setting_value' ] ] );
            } else {
                $setting = DB::table( 'setting' )->insertGetId( [ 'setting_key'=>$value[ 'setting_key' ], 'setting_value'=> $value[ 'setting_value' ] ] );
            }
            if ( $setting >= 1 ) {
                return redirect()->back();
            }
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

    public function upload( Request $request ) {
        $request->validate( [
            'file' => 'required|mimes:jpg,png,pdf|max:2048',
        ] );

        $file = $request->file( 'file' );
        $path = $file->store( 'uploads', 'public' );

        // Additional logic ( e.g., storing file information in the database )

        return 'File uploaded successfully!';
    }
}