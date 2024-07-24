<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'member_id',
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany( Role::class );
    }

    public function permissions() {
        return $this->belongsToMany( Permission::class );
    }

    public static function getRecordListByRole( $role ) {
        return self::where( 'role', $role )->orderBy( 'created_at', 'DESC' )->get();
    }

    public static function getRecordList() {
        return self::orderBy( 'created_at', 'DESC' )->simplePaginate( 10 );
    }

    public static function getCountListByRole( $role ) {
        return self::where( 'role', $role )->count();
    }

    public static function getRecordById( $id ) {
        return self::where( 'id', $id )->first();
    }

    public static function UpdatePasswordByEmail( $email, $password ) {
        return self::where( 'email', $email )->update( [ 'password'=> Hash::make( $password ) ] );
    }

    public function staffMember() {
        return $this->belongsTo( StaffMembers::class );
    }

    public static function getRecordByTeam( $role ) {
        return self::select( 'id', 'name' )->where( 'role', $role )->orderBy( 'id', 'desc' )->get()->toArray();
    }

    public static function getUserCount() {
        return self::count();
    }
}