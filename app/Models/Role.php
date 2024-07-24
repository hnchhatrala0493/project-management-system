<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model {
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [ 'name', 'guard_name' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->get();
    }

    public static function getAssignTo() {
        return DB::table( 'role_has_permissions' )
        ->join( 'roles as r', 'r.id', '=', 'role_has_permissions.role_id' )
        ->join( 'permissions as p', 'p.id', '=', 'role_has_permissions.permission_id' )
        ->join( 'modules as m', 'm.id', '=', 'p.module_id' )
        ->select(
            DB::raw( 'GROUP_CONCAT(role_has_permissions.permission_id SEPARATOR " ") as ids' ),
            'role_has_permissions.role_id',
            'r.name as role_name',
            'm.title',
            'p.name as permission_name',
            'r.*',
        )
        ->groupBy( 'role_has_permissions.role_id', 'p.module_id', 'r.name', 'm.title', 'p.name', 'r.id', 'r.guard_name', 'r.created_at', 'r.updated_at' )
        ->get()->toArray();
        // return DB::table( 'role_has_permissions as rp' )->join( 'roles as r', 'r.id', 'rp.role_id' )->groupBy( 'rp.role_id', 'rp.permission_id', 'r.id', 'r.name', 'r.guard_name', 'r.created_at', 'r.updated_at' )->get()->toArray();
    }

    public static function getRecordById( $id ) {
        return self::where( [ 'id'=> $id ] )->first();
    }

    public function roles() {
        return $this->belongsTo( Permission::class );
    }
}