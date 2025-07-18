<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerDetails extends Model
{
    use HasFactory;
    protected $table = "managers";
    protected $primaryKey = "id";

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the highest existing ManagerID value
            $highestManagerID = static::max('ManagerID');

            // If no ManagerID exists, start counting from 1000
            if ($highestManagerID === null) {
                $model->ManagerID = 2000;
            } else {
                // Otherwise, increment the highest ManagerID by 1
                $model->ManagerID = $highestManagerID + 1;
            }
        });
    }
}
