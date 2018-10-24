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
 
																												}
