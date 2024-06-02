<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffMembers extends Model {
    use HasFactory;
    protected $table = 'staff_members';
    protected $fillable = [ 'profile_id', 'full_name', 'father_name', 'mother_name', 'isBrotherOrSister', 'date_of_birth', 'date_of_anniversary', 'date_of_joining', 'salary', 'blood_group', 'history_of_previous_company', 'status' ];

    public static function getRecordList() {
        return self::orderBy( 'created_at', 'DESC' )->get();
    }

    public static function getEducationDetails( $id ) {
        return DB::table( 'education_details' )->where( 'staff_member_id', $id )->get();
    }

    public static function getPreviousCompanyDetails( $id ) {
        return DB::table( 'history_of_company_details' )->where( 'staff_member_id', $id )->get();
    }

    public static function getMemberberIdByFullName( $staffMemberName ) {
        return self::select( 'profile_id' )->where( 'full_name', $staffMemberName )->first();
    }
}