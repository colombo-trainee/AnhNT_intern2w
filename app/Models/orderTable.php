<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class orderTable extends Model
{
	protected $fillable = [
	'name', 'email','date','partyNumber',
	];
	protected $dates = ['deleted_at'];
	protected $table="order_tables";
}
