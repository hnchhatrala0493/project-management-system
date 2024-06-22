<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model {

    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [ 'project_name', 'project_status', 'project_category' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->with( 'category' )->get();
    }

    public static function getProjectListByAssigned() {
        return self::orderBy( 'id', 'desc' )->get();
    }

    public function category() {
        return $this->belongsTo( Category::class, 'project_category' );
    }

}