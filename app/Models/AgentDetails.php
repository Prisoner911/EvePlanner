<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDetails extends Model
{
    use HasFactory;
    protected $table = "agents";
    protected $primaryKey = "id";


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the highest existing AgentID value
            $highestAgentID = static::max('AgentID');

            // If no AgentID exists, start counting from 1000
            if ($highestAgentID === null) {
                $model->AgentID = 1000;
            } else {
                // Otherwise, increment the highest AgentID by 1
                $model->AgentID = $highestAgentID + 1;
            }
        });
    }
}
