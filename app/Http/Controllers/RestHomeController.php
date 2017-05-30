<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listFood;
use App\Models\category;
use App\Models\menuTop;
class RestHomeController extends Controller
{
    public function index()
    {
    	$datasMenuF = listFood::all();
    	$datasMenuT = menuTop::limit(6)->orderBy('order','asc')->get();
    	return view('restaurant',compact('datasMenuF','datasMenuT'));
   	}
   	public function getMenu()
   	{
   		# code...
   	}
}
