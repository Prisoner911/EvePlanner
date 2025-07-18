<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerDetails extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = "id";

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the highest existing srNo value and increment it by 1
            $highestApplicationNo = static::max('ApplicationNo') ?? 0;
            $model->ApplicationNo = $highestApplicationNo + 1;
        });
    }
}
