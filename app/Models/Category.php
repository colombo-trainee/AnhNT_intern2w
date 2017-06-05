<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    		 'name',
    	];
    public function listFoods()
    {
        return $this->hasMany('App\Models\ListFood');
    }
    protected $table = 'categories';
}
