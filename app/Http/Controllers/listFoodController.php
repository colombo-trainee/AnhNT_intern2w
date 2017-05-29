<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listFood;
use Illuminate\Support\Facades\Route;
use App\Models\category;
use Illuminate\Support\Facades\Validator as Validator;

class listFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = listFood::all();
        return view('list-food.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = category::all();
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

                'name' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|image',

            ]);

        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);

        }  else{
            // rename img
            $time = time();
            $name_image = $str_lug($data['name']).$time.strstr($request->file('image')->getClientOriginalName(),'.');;
            $image = $request -> file('image')->storeAs('images/food',$name_image);

            $data['image'] = $name_image;
            

            
            DB::beginTransaction();

            try {
                User::create([
                    'name' => $data['name'],
                    'gender'   => $data['gender'],
                    'avatar'    => $data['avatar'],
                    'birthday' => $data['date_birthday'],
                    'mobile'    => $data['mobile'],
                    'email'    =>  $data['email'],
                    'password'  => bcrypt($data['password']),
                    'address'    => $data['address'],
                    'facebook'    => $data['facebook'],
                    'skype'       => $data['skype'],
                    'work_place' => $data['work_place'],
                    'education_info' => $data['education_info'],
                    'skill' => $data['skill'],
                    'position' => $data['position'],
                    'note' => $data['note'],
                    'desire' => $data['desire'],
                    'type' => $data['type'],
                    ]);        
                
                DB::commit();
                return redirect(route('team.index'));

                            // all good
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                            // something went wrong
                            // 
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
