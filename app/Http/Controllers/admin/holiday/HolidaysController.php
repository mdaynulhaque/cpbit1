<?php

namespace App\Http\Controllers\admin\holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//customize
use DataTable;
use Validator;

use App\models\leave\Leave;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          if(request()->ajax())
        {
            return datatables()->of(Leave::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Delete</button>';
                        
                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admins.holiday.holiday');
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
          $rules = array(
            'holiday'    =>  'required',
            'startDate'    =>  'required',
            'endDate'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = new Leave();     


        $data->title = $request->holiday;

        $start=$request->startDate;
        $data->startDate = $start." 00:00";

        $end= $request->endDate;

        $data->endDate =$end ." 24:00";

        

        $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Update successfully.']);
        }
        else{
             return response()->json(['success' => 'Data not Update successfully.']);
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
         if(request()->ajax())
        {
            $data = Leave::findOrFail($id);
            return $data;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

          $rules = array(
            'holiday'    =>  'required',
            'startDate'    =>  'required',
            'endDate'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        
        // update id start 
        $id = $request->updateId;
        $data =  Leave::find($id);        
        //end update id    


        $data->title = $request->holiday;
        $start=$request->startDate;
        $data->startDate = $start." 00:00";

        $end= $request->endDate;

        $data->endDate =$end ." 24:00";

        

        $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Update successfully.']);
        }
        else{
             return response()->json(['success' => 'Data not Update successfully.']);
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
        $leave = Leave::findOrFail($id); //find id here

         if($leave->delete()){
             return response()->json(['success' => 'Data Delete successfully.']);
         }
    }
}
