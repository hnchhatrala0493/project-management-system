<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Image extends Model {
    use HasFactory;
    protected $table = 'profile_images';
    protected $fillable = [ 'member_id', 'member_profile_path' ];
}