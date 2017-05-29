<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use SoftDeletes;
    protected $fillable = [
    		 'name',
    	];
    protected $dates = ['deleted_at'];
    public function listFoods()
    {
        return $this->hasMany('App\Models\listFood');
    }
}
