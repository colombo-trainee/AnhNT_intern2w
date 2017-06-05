<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ListFood;
use Illuminate\Support\Facades\Validator as Validator;
use DB;
class CategoryController extends Controller
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
        $datas = Category::orderBy('id','desc')->paginate(5);
        $dataFood = ListFood::all();
        return view('category.viewlist',compact('datas','dataFood'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required|unique:categories',
            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);
        }  else{
            DB::beginTransaction();

            try {
                Category::create([
                    'name' => $data['name'],             
                    ]);        
                DB::commit();
                $msg='Đã thêm thành công';
                return redirect(route('category.index'))->with('status', $msg);

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
        $data = Category::find($id);
        $dataFood = ListFood::all();
        return view('category.show',compact('data','dataFood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('category.edit',compact('data'));
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
            'name' => 'required|unique:categories',
            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);
        }  else{
            DB::beginTransaction();

            try {
                Category::find($id)->update([
                    'name' => $data['name'],             
                    ]);        
                DB::commit();
                $msg='Đã sửa thành công';
                return redirect(route('category.index'))->with('status', $msg);

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
        $des = Category::find($id);
        $data_food = ListFood::where('category_id',$id);
        if ($data_food->count() >0) {
            $data_food->delete();
        }
        $des->delete();
        
         return response()->json(['error' => false]);
            
    }
    
}
