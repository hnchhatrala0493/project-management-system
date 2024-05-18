<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model {
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = [ 'language_name' ];

    public static function getRecordList() {
        return self::orderBy( 'id', 'desc' )->get();
    }
}