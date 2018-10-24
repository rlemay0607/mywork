<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Notifications\Notifiable;

class Meeting extends Model
{
    use Notifiable;
    use Actionable;

    protected $fillable = [
        'name', 'details', 'date', 'company_id',
    ];
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    protected $casts = [
        'date' => 'date',
    ];


}