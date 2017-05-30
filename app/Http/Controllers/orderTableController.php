<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderTable;
use Illuminate\Support\Facades\Validator as Validator;
use DB;
class orderTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = orderTable::all();
        return view('order-table.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $dataE = $request->all();
            $validator = Validator::make($dataE,[

            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required|after:today',
            'partyNumber' => 'required|numeric',
            ],
            $msg = [
                'name.required' => 'Không được để trống',
                'email.required'=>'Không được để trống',
                'email.email'=>'Không đúng định dạng email',
                'date.required'=>'Không được để trống',
                'date.after'=>'Không được đặt lịch trong quá khứ',
                'partyNumber.required'=>'Không được để trống',
                'partyNumber.numeric'=>'Đây không phải phonenumber',

            ]);
            if ($validator->fails()  ){
                return response()->json([
                        'error'      => true,
                        'message'   =>$validator->errors($msg),
                        'dataE'    => $dataE
                    ],200);
            }else{
                DB::beginTransaction();

                try {
                    orderTable::create([
                        'name' => $dataE['name'],
                        'email'   => $dataE['email'],
                        'date'    => $dataE['date'],
                        'partyNumber' => $dataE['partyNumber'],                
                        ]);
                    DB::commit();
                    return response()->json([
                        'error'      => false,
                        'dataE'    => $dataE
                    ],200);
                                // all good
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                    DB::rollback();
                                // something went wrong
                }
            }



        }









        // $dataE = $request->all();
        // $validator = Validator::make($dataE,[

        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'date' => 'required|after:today',
        //     'partyNumber' => 'required|numeric',
        //     ],[
        //         'name.required' => 'Không được để trống',
        //         'email.required'=>'Không được để trống',
        //         'email.email'=>'Không đúng định dạng email',
        //         'date.required'=>'Không được để trống',
        //         'date.after'=>'Không được đặt lịch trong quá khứ',
        //         'partyNumber.required'=>'Không được để trống',
        //         'partyNumber.numeric'=>'Đây không phải phonenumber',

        //     ]);
                
        // if ($validator->fails()  ) {
        //     return redirect('home')->withInput($dataE)->withErrors($validator)->with('fail','Có lỗi trong đặt bàn');

        // }  else{
            
        //     DB::beginTransaction();

        //     try {
        //         orderTable::create([
        //             'name' => $dataE['name'],
        //             'email'   => $dataE['email'],
        //             'date'    => $dataE['date'],
        //             'partyNumber' => $dataE['partyNumber'],                
        //             ]);
        //         DB::commit();
        //         $msg='Đã đặt bàn thành công';
        //         return redirect()->back()->with('status', $msg);
        //                     // all good
        //     } catch (\Exception $e) {
        //         \Log::info($e->getMessage());
        //         DB::rollback();
        //                     // something went wrong
        //     }
            
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = orderTable::find($id);
        return view('order-table.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = orderTable::find($id);
        return view('order-table.edit',compact('data'));
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
            'email' => 'required|unique:order_tables',
            'date' => 'required',
            'partyNumber' => 'required',
            ]);
        // $validator = Validator::make($data,[

        //     'name' => 'required',
        //     'email' => 'required|unique:order-tables',
        //     'date' => 'required|date_format:Y-m-d|before:tomorrow',
        //     'partyNumber' => 'required|regex:/(01[2689]|09)[0-9]{8}/',
        //     ],[
        //         'name.required' => 'Không được để trống',
        //         'email.required'=>'Không được để trống',
        //         'email.unique:order-tables'=>'Email đã có người dùng',
        //         'date.required'=>'Không được để trống',
        //         'date.date_format:Y-m-d'=>'Chưa đúng định dạng Y-m-d',
        //         'date.before:tomorrow'=>'Không được đặt lịch trong quá khứ',
        //         'partyNumber.required'=>'Không được để trống',
        //         'partyNumber.regex:/(01[2689]|09)[0-9]{8}/'=>'Chưa đúng định dạng phone number',
        //     ]);
                
        if ($validator->fails()  ) {
            return redirect('home')->withInput($data)->withErrors($validator);

        }  else{
            
            DB::beginTransaction();

            try {
                orderTable::find($id)->update([
                    'name' => $data['name'],
                    'email'   => $data['email'],
                    'date'    => $data['date'],
                    'partyNumber' => $data['partyNumber'],                
                    ]);        
                DB::commit();
                $msg='Đã Sửa thành công';
                return redirect(route('order-table.index'))->with('status', $msg);

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
        //
    }
}
