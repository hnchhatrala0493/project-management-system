<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model {
    use HasFactory;
    protected $table = 'activity_logs';
    protected $fillable = [ 'method_name', 'url', 'route', 'member_id' ];

}