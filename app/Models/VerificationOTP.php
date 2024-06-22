<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationOTP extends Model {
    use HasFactory;
    protected $table = 'verification_o_t_p_s';
    protected $fillable = [ 'type', 'otp' ];
}