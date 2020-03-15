<?php

namespace App\Http\Controllers\user\car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// customize area
use App\models\user\car\Carpool_car_booking;
use App\models\admin\car\Carpool_car;
use App\models\admin\car\destination\Carpool_destination;
use App\models\admin\car\driver\Carpool_driver;
use App\models\leave\Leave;

use Validator;

class CarBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.car.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $car_cars=Carpool_car::all();
        $car_drivers=Carpool_driver::all();

        return view('users.car.index',compact('car_cars','car_drivers'));
        
    }


     public function show1()
    {
        $car_cars=Carpool_car::all();
        $car_drivers=Carpool_driver::all();

        return view('users.car.temporary',compact('car_cars','car_drivers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $car=Carpool_car::find($id);
        return view('users.car.car_details',compact('car'));
    }







// car booking function

     public function  booked_car($id)
    {
        $car_destinations=Carpool_destination::all();
        $car=Carpool_car::find($id);
        $car_bookings=Carpool_car_booking::all();
        $holidays=Leave::all();
        return view('users.car.car_view',compact('car','car_destinations','car_bookings','holidays'));
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
            
            'start'    =>  'required',
            'end'    =>  'required',
            'startTime'    =>  'required',
            'endTime'    =>  'required',
            'destination'    =>  'required',
            'purpose'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data=new Carpool_car_booking();

        $data->carpool_car_id=$request->carpool_car_id;
        $data->carpool_driver_id=$request->carpool_driver_id;



        // start date
        $date= $request->start;
        $time= $request->startTime;
        $first_time  = date("H:i", strtotime($time));

        $start_date=($date)." ".($first_time);
        $data->start=$start_date;



        // end date start
        $date_end= $request->end;
        $time_end= $request->endTime;

        $end_time  = date("H:i", strtotime($time_end));
        $end_date=($date_end)." ".($end_time);
        $data->end=$end_date;


        $data->destination=$request->destination;

         

  
        // end time conversion

        $data->purpose= $request->purpose;


      $success=$data->save();
     if ($success) {
         return response()->json(['success' => 'Data Added successfully.']);
     }
            
        
     else{
        return response()->json(['errors' => 'Data not Added successfully.']);
        }
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
