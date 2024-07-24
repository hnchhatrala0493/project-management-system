<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model {
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = [ 'module_id', 'can_permission_name', 'name', 'guard_name' ];

    public static function getRecordList() {
        return Module::orderBy( 'id', 'desc' )->get();
    }

    public static function getRecordPermission() {
        return self::select( 'module_id', 'permissions.*' )
        ->with( 'roles' )
        ->orderBy( 'id', 'desc' )->get();
    }

    public static function getRecordRoleHasPermissions() {
        // return DB::table( 'role_has_permissions as rp' )->select( DB::raw( 'GROUP_CONCAT(module_id SEPARATOR ", ") AS ids' ), 'm.title', 'p.module_id', 'p.created_at', 'p.id', 'rp.permission_id', 'rp.role_id' )
        // ->join( 'permissions as p', 'p.id', 'rp.permission_id' )
        // ->join( 'roles as r', 'r.id', 'rp.role_id' )
        // ->join( 'modules as m', 'm.id', 'p.module_id' )
        // ->groupBy( 'p.module_id', 'rp.role_id', 'm.title', 'p.created_at', 'p.id', 'rp.permission_id' )
        // ->orderBy( 'p.id', 'desc' )->get();
        return DB::table( 'role_has_permissions as rp' )
        ->select(
            DB::raw( 'GROUP_CONCAT(p.module_id SEPARATOR ", ") AS ids' ),
            'm.title',
            'p.module_id',
            'p.created_at',
            'p.id',
            'rp.permission_id',
            'rp.role_id'
        )
        ->join( 'permissions as p', 'p.id', '=', 'rp.permission_id' )
        ->join( 'roles as r', 'r.id', '=', 'rp.role_id' )
        ->join( 'modules as m', 'm.id', '=', 'p.module_id' )
        ->groupBy( 'p.module_id', 'm.title', 'p.created_at', 'p.id', 'rp.permission_id', 'rp.role_id' )
        ->orderBy( 'p.id', 'desc' )
        ->get();
    }

    public static function getRecordById( $moduleId ) {
        return self::where( 'id', $moduleId )->with( 'module' )->first();
    }

    public function module() {
        return $this->belongsTo( Module::class );
    }

    public function roles() {
        return $this->belongsTo( Module::class );
    }

}