<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOtp extends Model
{
    use HasFactory;
    protected $table = "customer_otp";
    protected $primaryKey = "id";
}
