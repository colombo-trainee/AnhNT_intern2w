<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ListFood extends Model
{
	// use SoftDeletes;
	protected $fillable = [
	'name', 'image','price','description','category_id','type','special',
	];
	// protected $dates = ['deleted_at'];
	public function category()
	{
		return $this->belongsTo('App\Models\Category', 'category_id');
	}
	protected $table = 'list_foods';
}
