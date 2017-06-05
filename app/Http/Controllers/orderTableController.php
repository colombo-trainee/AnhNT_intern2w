<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderTable;
use Illuminate\Support\Facades\Validator as Validator;
use DB;
class OrderTableController extends Controller
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
        $datas = OrderTable::orderBy('id','desc')->get();
        return view('Order-table.viewlist',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Order-table.create');
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
            'partyNumber' => 'numeric|between:1,20',
            ],
            $msg = [
                'name.required' => 'Không được để trống',
                'email.required'=>'Không được để trống',
                'email.email'=>'Không đúng định dạng email',
                'date.required'=>'Không được để trống',
                'date.after'=>'Không được đặt lịch trong quá khứ',
                'partyNumber.numeric'=>'Đây không phải dạng số',
                'partyNumber.between'=>'Số người không quá 20',

            ]);
            if ($validator->fails()  ){
                return response()->json([
                        'error'      => true,
                        'message'   =>$validator->errors($msg),
                        'dataE'    => $dataE,
                    ],200);
            }else{
                DB::beginTransaction();

                try {
                    OrderTable::create([
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrderTable::find($id);
        return view('Order-table.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrderTable::find($id);
        return view('Order-table.edit',compact('data'));
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
            'email' => 'required',
            'date' => 'required',
            'partyNumber' => 'required',
            ]);
        if ($validator->fails()  ) {
            return redirect()->back()->withInput($data)->withErrors($validator);

        }  else{
            
            DB::beginTransaction();

            try {
                OrderTable::find($id)->update([
                    'name' => $data['name'],
                    'email'   => $data['email'],
                    'date'    => $data['date'],
                    'partyNumber' => $data['partyNumber'],                
                    ]);        
                DB::commit();
                $msg='Đã Sửa thành công';
                return redirect(route('Order-table.index'))->with('status', $msg);

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
        OrderTable::find($id)->delete();
        return response()->json(['error' => false]);
    }
}
