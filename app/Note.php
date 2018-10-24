<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Silvanite\Brandenburg\Traits\HasRoles;
use Laravel\Nova\Actions\Actionable;

class Note extends Model
{
    use Notifiable;
    use Actionable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note', 'meeting_id',
    ];

    public function meeting()
    {
        return $this->belongsTo('App\Meeting');
    }
}
