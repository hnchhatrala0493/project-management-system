<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model {
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [ 'name' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->get();
    }

    public static function getRecordById( $id ) {
        return self::where( [ 'id'=> $id ] )->first();
    }

}