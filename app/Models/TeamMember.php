<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model {
    use HasFactory;

    protected $table = 'team_members';
    protected $fillable = [ 'team_member_name', 'team_member_id', 'language_id' ];

    public static function getRecordList() {
        return TeamMember::orderBy( 'id', 'desc' )->with( 'language' )->with( 'users' )->get();
    }

    public function language() {
        return $this->belongsTo( Language::class,  'language_id' );
    }

    public function users() {
        return $this->belongsTo( StaffMembers::class,  'team_member_id' );
    }

    public static function getRecordById( $id ) {
        return self::with( 'language' )->with( 'users' )->where( 'id', $id )->first();
    }

}