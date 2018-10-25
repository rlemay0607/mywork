<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'module_id', 'priority', 'short_description', 'description', 'type', 'state', 'points', 'classification',


    ];

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
