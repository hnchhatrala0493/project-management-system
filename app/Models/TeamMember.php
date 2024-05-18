<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model {
    use HasFactory;
    protected $table = 'team_members';
    protected $filled = [ 'team_member_name', 'team_member_id', 'language' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->get();
    }

}