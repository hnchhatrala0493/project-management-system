<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonModal extends Model {
    use HasFactory;
    protected $table = 'setting';

    public function setDateTime( $value ) {
        $getDateFormat = self::where( 'setting_key', 'DATE_FORMAT' )->first();
        return date( $getDateFormat[ 'setting_value' ], strtotime( $value ) );
    }
}