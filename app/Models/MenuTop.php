<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MenuTop extends Model
{
	protected $fillable = [
    		 'name', 'order','slug_name',
    	];
    protected $table = 'menu_tops';
}
