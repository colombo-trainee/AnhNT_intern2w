<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuTop;
use Illuminate\Support\Facades\Validator as Validator;
use DB;


class menuTopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data =  menuTop::all();
        // return view('menu-top.test');
        $datas = menuTop::all();
        return view('menu-top.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu-top.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data,[

            'parent_id' => 'required',
            'name' => 'required|unique:menu_tops',
            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);

        }  else{
            DB::beginTransaction();

            try {
                menuTop::create([
                    'parent_id' => $data['parent_id'],
                    'name'   => $data['name'],
                    'slug_name'    => str_slug(strtolower($data['name'])),                
                    ]);        
                DB::commit();
                $msg='Đã thêm thành công';
                return redirect(route('menu-top.index'))->with('status', $msg);

                            // all good
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data  = menuTop::find($id);
        return view('menu-top.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
