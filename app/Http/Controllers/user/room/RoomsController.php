<?php

namespace App\Http\Controllers\user\room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\user\room\Room_booking;
use App\models\admin\room\Room;

use App\models\leave\Leave;
use Validator;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("users.room.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // View specified  booking page
    public function details($id)
    {
         $room=Room::find($id);
        return view("users.room.room_details",compact('room'));
    }


// View specified  booking page
    public function booked_room($id)
    {
        $rooms=Room_booking::all();
        $leaves=Leave::all();
         $room=Room::find($id);
        return view("users.room.booked_room",compact('room','rooms','leaves'));
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
            
            'start_event'    =>  'required',
            'startTime'    =>  'required',
            'endTime'    =>  'required',
            'purpose'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data=new Room_booking();

        $data->room_id=$request->id;

        // start date
        $date= $request->start_event;
        $time= $request->startTime;
        $first_time  = date("H:i", strtotime($time));

        $start_date=(string)($date)." ".(string)($first_time);
        $data->start=$start_date;

        // end date start
        $date_end= $request->start_event;
        $time_end= $request->endTime;

        $end_time  = date("H:i", strtotime($time_end));
        $end_date=(string)($date_end)." ".(string)($end_time);
        $data->end=$end_date;


        // time conversion
        $first_time  = date("H:i", strtotime($time));
        $end_time  = date("H:i", strtotime($time_end));


        //substruct here
        $hours=strtotime($end_time) - strtotime( $first_time);

        // convert time
        $total=(int)$hours/(60);

         $total_hour="";


         

         // check time negetive or not
         if($total>0)
         {
            if ($total>=60) {
                $total_hour=(int)$total/(60);
                $data->hours= $total_hour;
            }
            else{
                (string)$minute=$total;
                $data->hours= $minute." minute";
            }
         }
         // if negetive
         else
         {
              return response()->json(['errors' => 'Data Added Faild.']);
         }
  
        // end time conversion

        $data->purpose= $request->purpose;




        // fixed time convertion
       (int)$f_time=date("H:i", strtotime("8:00"));
       (int)$e_time=date("H:i", strtotime("18:00")); 






        $exists = Room_booking:: where('start', '>=', $start_date)
       
        ->where('end', '<=',  $end_date)
        ->get();

        if (!$exists) {
               return response()->json(['errors' => 'Data Added Faild.']);
        }








         // time checking it 8:00 to 18:00 if possible then save data    

        if(($end_time <= $e_time) && ($first_time >= $f_time)){
           


            $success=$data->save();
            if ($success) {
                 return response()->json(['success' => 'Data Added successfully.']);
            }
            
        }
        else{
             return response()->json(['errors' => 'Data not Added successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // show user home page booking area
    public function show()
    {
        $rooms=Room::all();
        return view('users.room.index',compact('rooms'));
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
