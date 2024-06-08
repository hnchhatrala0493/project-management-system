<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        return self::where( 'email', $email )->update( [ 'password'=>$password ] );
    }
}