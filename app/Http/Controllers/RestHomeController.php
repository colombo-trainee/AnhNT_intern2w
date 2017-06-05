<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListFood;
use App\Models\Category;
use App\Models\MenuTop;
class RestHomeController extends Controller
{
    public function index()
    {
      	$datasCate = Category::all();
    	$datasMenuF = ListFood::orderBy('special','asc')->get();
    	$datasMenuT = MenuTop::limit(6)->orderBy('order','asc')->orderBy('name','asc')->get();
    	return view('restaurant',compact('datasCate','datasMenuT','datasMenuF'));
   	}
   	
}