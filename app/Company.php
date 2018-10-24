<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	/**
	 * @var  string
	 */
	protected $table = 'companies';

	protected $casts = [
																																												'created_at' => 'datetime',
												'updated_at' => 'datetime',
						];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function meetings()
    {
        return $this->hasMany('App\Meeting');
    }
}
