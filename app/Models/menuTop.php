<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class menuTop extends Model
{
	protected $fillable = [
    		 'name', 'order','slug_name',
    	];
}
