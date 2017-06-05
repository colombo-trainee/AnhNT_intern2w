<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListFood;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use Illuminate\Support\Facades\Validator as Validator;
use DB;
use Illuminate\Http\UploadedFile;
class ListFoodController extends Controller
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
        $datas = ListFood::orderBy('id', 'desc')->get();
        return view('list-food.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Category::all();
        return view('list-food.create',compact('datas'));
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

            'name' => 'required|unique:list_foods',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required',
            ],$msg=[
                'name.required'=> 'Không được để trống',
                'name.unique'=> 'Đã có món này rồi',
                'price.required'=> 'Không được để trống',
                'price.numeric'=> 'Không phải định dạng số',
                'image.required'=> 'Không được để trống',
                'image.image'=> 'Không phải định dạng ảnh',
                'description.required'=> 'Không được để trống',
            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);

        }  else{
            // rename img
            $time = time();
            $name_image = str_slug($data['name']).$time.strstr($request->file('image')->getClientOriginalName(),'.');
            $image = $request -> file('image')->storeAs('img/food',$name_image);

            $data['image'] = $image;
            

            
            DB::beginTransaction();

            try {
                ListFood::create([
                    'name' => $data['name'],
                    'image'   => $data['image'],
                    'price'    => $data['price'],
                    'description' => $data['description'],
                    'category_id' => $data['category_id'],
                    'special' => $data['special'],                   
                    ]);        
                DB::commit();
                $msg='Đã thêm thành công';
                return redirect(route('list-food.index'))->with('status', $msg);

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
        $data = ListFood::find($id);
        return view('list-food.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ListFood::find($id);
        $datas_cate = Category::all();
        return view('list-food.edit',compact('data','datas_cate'));
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

            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);

        }  else{


            if ($request->hasFile('image')) {
            // rename img
                 $time = time();
                 $name_image = str_slug($data['name']).$time.strstr($request->file('image')->getClientOriginalName(),'.');
                 $image = $request -> file('image')->storeAs('img/food',$name_image);

                 $data['image'] = $image;
                 DB::beginTransaction();

                 try {
                    ListFood::find($id)->update([
                        'name' => ucfirst($data['name']),
                        'price'    => $data['price'],
                        'image' => $data['image'],
                        'description' => ucfirst($data['description']),
                        'category_id' => $data['category_id'],
                        'special' => $data['special'],                   
                        ]);        
                    DB::commit();
                    $msg='Đã sửa thành công';
                    return redirect(route('list-food.index'))->with('status', $msg);

                                        // all good
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                    DB::rollback();
                                        // something went wrong
                }      
            }else{
                DB::beginTransaction();

                try {
                    ListFood::find($id)->update([
                        'name' => ucfirst($data['name']),
                        'price'    => $data['price'],
                        'description' => ucfirst($data['description']),
                        'category_id' => $data['category_id'],
                        'special' => $data['special'],                   
                        ]);        
                    DB::commit();
                    $msg='Đã sửa thành công';
                    return redirect(route('list-food.index'))->with('status', $msg);

                                        // all good
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                    DB::rollback();
                                        // something went wrong
                }
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
        $des = ListFood::find($id);
        $des->delete();
        $datas = ListFood::orderBy('id', 'desc')->paginate(5);

        return view('list-food.viewlist',compact('datas'))->with('status','Deleted!');

    }
    // public function index_admin()
    // {
    //     return view('admin-index');
    // }
    
}
