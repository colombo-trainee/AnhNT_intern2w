<?php

namespace App\Models;
	
use Illuminate\Database\Eloquent\Model;

class orderTable extends Model
{
	protected $fillable = [
	'name', 'email','date','partyNumber',
	];
	protected $table = 'order_tables';
}
