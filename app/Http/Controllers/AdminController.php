<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listFood;
use App\Models\menuTop;
use App\Models\category;
use App\Models\orderTable;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFoods = listFood::count();
        $menuTops = menuTop::count();
        $categories = category::count();
        $orderTables = orderTable::count();
        return view('admin-index',compact('listFoods','menuTops','categories','orderTables'));
    }
}
?>