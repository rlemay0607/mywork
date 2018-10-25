<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'module',
    ];

    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }
}
