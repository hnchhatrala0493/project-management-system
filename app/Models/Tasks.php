<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model {
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [ 'project_id', 'title', 'task_description', 'task_status', 'task_start_date_time', 'task_end_date_time', 'assign_task_member_id' ];

    public static function getRecordList( $id ) {
        return self::where( 'userId', $id )->orderBy( 'id', 'desc' )->with( 'project' )->get();
    }

    public static function getRecordByProId( $proId ) {
        return self::orderBy( 'id', 'desc' )->where( 'project_id', $proId )->with( 'project' )->get();
    }

    public function project() {
        return $this->belongsTo( Projects::class, 'project_id' );
    }

    public static function getTaskCount() {
        return self::count();
    }
}