<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class menuTop extends Model
{
	use SoftDeletes;
	protected $fillable = [
    		 'name', 'parent_id','slug_name',
    	];
	protected $dates = ['deleted_at'];
}
