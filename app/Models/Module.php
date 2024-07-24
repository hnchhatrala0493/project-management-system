<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
 {
    use HasFactory;
    protected $table = 'modules';
    protected $fillable = [ 'title', 'menu_name', 'controller_name', 'model_name', 'view_name', 'table_name', 'route_name' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->get();
    }

    public function module() {
        return $this->hasOne( Permission::class,  'module_id' );
    }

    public static function getModuleName( $id ) {
        return self::where( 'id', $id )->first();
    }

}