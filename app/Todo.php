<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    /**
     * @var  string
     */
    protected $table = 'todos';
    protected $fillable = [
        'meeting_id', 'short_description', 'status', 'description', 'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function meeting()
    {
        return $this->belongsTo('App\Meeting', 'meeting_id', 'id');
    }
}
