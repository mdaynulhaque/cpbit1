<?php

namespace App\Http\Controllers\admin\car\destination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\admin\car\destination\Carpool_destination;

// customize area
use DataTable;
use Validator;



class Carpool_destinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(request()->ajax())
        {
            return datatables()->of(Carpool_destination::latest()->get())
                    ->addColumn('action', function($data){
                        
                        // edit button 
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</button>';
                        $button .= '&nbsp;&nbsp;';

                        //delete Button
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Delete</button>';
                        

                     

                        
                        return $button;
                    })
                     

                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admins.car.destination.index');
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
            'name'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // validation end





        $data = new Carpool_destination();    

        $data->name=$request->name;   

         $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Added successfully.']);
        }
        else{
             return response()->json(['success' => 'Data Added Failed.']);
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
            $data = Carpool_destination::findOrFail($id);
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
            'name'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // validation end




        // update id start 
        $id = $request->updateId;
        $data =  Carpool_destination::find($id);        
        //end update id      


        $data->name=$request->name;   

         $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Update successfully.']);
        }
        else{
             return response()->json(['success' => 'Data  Update Failed.']);
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
           $data = Carpool_destination::findOrFail($id);

           $success=$data->delete();

           if ($success) {
                return response()->json(['success' => 'Data Delete successfully.']);
           }
           else
           {
            return response()->json(['success' => 'Data Delete Failed.']);
           }
    }
}
