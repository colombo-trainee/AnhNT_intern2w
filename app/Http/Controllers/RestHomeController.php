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
      	$datasCate = category::all();
    	$datasMenuF = listFood::orderBy('special','asc')->get();
    	$datasMenuT = menuTop::limit(6)->orderBy('order','asc')->orderBy('name','asc')->get();
    	return view('restaurant',compact('datasCate','datasMenuT','datasMenuF'));
   	}
   	
}
