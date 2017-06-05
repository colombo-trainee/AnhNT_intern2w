<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuTop;
use Illuminate\Support\Facades\Validator as Validator;
use DB;


class MenuTopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        // $data =  MenuTop::all();
        // return view('Menu-top.test');
        $datas = MenuTop::orderBy('id','desc')->get();
        return view('Menu-top.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = MenuTop::orderBy('order','asc')->get();
        return view('Menu-top.create',compact('datas'));
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
            'order' => 'required|numeric',
            'name' => 'required|unique:menu_tops',
            ],$msg=[
                'order.required' => 'Không được để trống',
                'order.numeric' => 'Bắt buộc là số ',
                'name.required' => 'Không được để trống',
                'name.unique' => 'Đã có tên menu này',
            ]);

        if ($validator->fails()  ) {
            return response()->json([
                        'error' => true,
                        'message'   =>$validator->errors($msg),
                        'data'    => $data,
                    ],200);
        }  else{
            DB::beginTransaction();

            try {
                MenuTop::create([
                    'name'   => ucfirst($data['name']),
                    'slug_name'    => str_slug(strtolower($data['name'])),  
                    'order' => $data['order'],              
                    ]);        
                DB::commit();
                $msg='Đã thêm thành công';
                return redirect(route('Menu-top.index'))->with('status', $msg);

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
        $menu  = MenuTop::find($id);    
        $data_all = MenuTop::orderBy('order','asc')->orderBy('name','asc')->get();
        return view('Menu-top.show',compact('menu','data_all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = MenuTop::find($id);
        return view('Menu-top.edit',compact('data'));
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
        $data = $request->all();
        
        $validator = Validator::make($data,[
            'order' => 'required|numeric',
            'name' => 'required',
            ],$msg=[
                'order.required' => 'Không được để trống',
                'order.numeric' => 'Bắt buộc là số ',
                'name.required' => 'Không được để trống',
            ]);

        if ($validator->fails()  ) {
             return redirect()->back()->withInput($data)->withErrors($validator);
        }  else{
            DB::beginTransaction();

            try {
                MenuTop::find($id)->update([
                    'name'   => ucfirst($data['name']),
                    'slug_name'    => str_slug(strtolower($data['name'])),  
                    'order' => $data['order'],              
                    ]);        
                DB::commit();
                    $msg='Đã sửa thành công';
                    return redirect(route('Menu-top.index'))->with('status', $msg);

                            // all good
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong 
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MenuTop::find($id)->delete();
        return response()->json(['error' => false]);
    }
}
