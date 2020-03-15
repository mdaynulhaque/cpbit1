<?php

namespace App\Http\Controllers\admin\car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



// customize area
use App\models\admin\car\Carpool_car;
// random name for image
use Illuminate\Support\Str;

use DataTable;
use Validator;
use Image;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admins.car.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   // Car block function here
    public function block($id){
        $room=Carpool_car::find($id);
        $temp="";

        if($room->status == "1"){
            $temp=0;
        }

        if($room->status =="0"){
           $temp=1;
        }
        $room->status=$temp;
        $status=$room->save();
        if ($status) {
           return response()->json(['success' => 'Data  Updated successfully.']);
        }
        
    }



    // Car Type change function here
    public function carType($id){
        $data=Carpool_car::find($id);
        $temp="";

        if($data->temporary == "1"){
            $temp=0;
        }

        if($data->temporary =="0"){
           $temp=1;
        }
        $data->temporary=$temp;
        $status=$data->save();
        if ($status) {
           return response()->json(['success' => 'Data  Updated successfully.']);
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
         if(request()->ajax())
        {
            $data = Carpool_car::findOrFail($id);
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
//date fixed function for edit data
    public function fixed($id)
    {
    if(request()->ajax())
        {
            $data = Carpool_car::findOrFail($id);
            return $data;
        }
    }
    //date fixed function for edit data

    public function fixedUpdate(Request $request)
    {
         // update id start 
        $id = $request->updateId1;
        $data =  Carpool_car::find($id);     
        //end update id    

        $data->last_use=$request->last_use;
        $status=$data->save();
        if ($status) {
           return response()->json(['success' => 'Data  Updated successfully.']);
        }    

    }


    // celendar view in admin car area
    public function celendar()
    {

        // // $rooms= Room_booking::all();
        // $leaves= Leave::all();
        // return view('admins.room.celendar_admin',compact('rooms','leaves'));
    }


 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         if(request()->ajax())
        {
            return datatables()->of(Carpool_car::latest()->get())
                    ->addColumn('action', function($data){
                        // addclear fix button
                        $button = '<button type="button" name="add" id="'.$data->id.'" class="add btn btn-secondary btn-sm"><i class="fa fa-plus"></i>&nbsp; Deadline</button>';
                        $button .= '&nbsp;&nbsp;';

                        // edit button 
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</button>';
                        $button .= '&nbsp;&nbsp;';

                        //delete Button
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Delete</button>';
                        $button .= '&nbsp;&nbsp;';

                        //block car button
                        if($data->status == 1){
                          $button .= '<button type="button" name="status" id="'.$data->id.'" class="status btn btn-info btn-sm"><i class="fa fa-check"></i>&nbsp;Block</button>';  
                        }
                        else{
                            $button .= '<button type="button" name="status" id="'.$data->id.'" class="status btn btn-warning btn-sm"><i class="fa fa-times"></i>&nbsp;Unblock</button>'; 
                        }

                        
                        return $button;
                    })
                     

                    ->addColumn('image', function($data){
                        $url1=asset("$data->image_small");
                        $url2=asset("$data->image2_small");
                        $url3=asset("$data->image3_small");
                        $button = '<div class="img-hover-zoom d-inline-block"><img src='.$url1.' width="100" height="100" class="img-thumbnail img-hover-zoom" /></div>';
                         $button .= '<div class="img-hover-zoom d-inline-block"><img src='.$url2.' width="100" height="100" class="img-thumbnail img-hover-zoom" /></div>';
                          $button .= '<div class="img-hover-zoom d-inline-block"><img src='.$url3.' width="100" height="100" class="img-thumbnail img-hover-zoom" /></div>';

                        return $button;
                    })
                    ->addColumn('name', function($info){
                        $button ='<p class="mb-0"><b>Car Name: </b>'.$info->name.' </p>';
                        $button .= '<p class="mb-0"> <b>Car Number: </b>'.$info->number.' </p>';
                        $button .= '<p class="mb-0"> <b>Capacity: </b>'.$info->capacity.' </p>';

                        if($info->temporary == 1){
                          $button .= '<p class="mb-0 d-inline-block"> <b>Car Type: </b> Regular</p> <button type="button" name="temporary" id="'.$info->id.'" class="temp btn btn-primary btn-sm m-0 float-right"><i class="fa fa-check"></i>&nbsp;temporary</button>';  
                        }
                        else{
                            $button .= '<p class="mb-0 d-inline-block"> <b>Car Type: </b> Temporary</p><button type="button" name="temporary" id="'.$info->id.'" class="temp btn btn-primary btn-sm m-0 float-right"><i class="fa fa-check"></i>&nbsp;Regular</button>'; 
                        }



                          $button .= '<p class="mb-0"> <b>Remarks: </b>'.$info->remarks.' </p>';
                          if(!empty($info->last_use)){
                             $button .= '<p class=""> <b>Use Deadline: </b>'.date("m-d-Y", strtotime($info->last_use)) .'</p>';
                          }
                          else{
                             $button .= '<p class=""> <b>Use Deadline: </b><del>Not Fixed </del></p>';
                          }
                        

                        return $button;
                    })
                    


                    ->rawColumns(['action', 'image','name'])
                    ->make(true);
        }
        return view('admins.car.car_details');
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
            'number'    =>  'required',
            'capacity'    =>  'required',
            'temporary'    =>  'required',
            'status'    =>  'required',
            'remarks'    =>  'required',
             'image'         =>   'required|image|mimes:jpeg,png,jpg|max:1500',
            'image2'         =>   'required|image|mimes:jpeg,png,jpg|max:1500',
            'image3'         =>   'required|image|mimes:jpeg,png,jpg|max:1500',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = new Carpool_car();        


            // image load one with original image

             $image = $request->file('image'); //take data from view
                    if ($image) {
                    $image_name = Str::random(5);  //random data create
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path_sm = 'images/car/small/';
                    $image_url_sm = $upload_path_sm . $image_full_name;

                    // image resize from here

                    $resize_image = Image::make($image->getRealPath());
                     $resize_image->resize(150, 150, function($constraint){
                         $constraint->aspectRatio();
                    })->save($upload_path_sm . '/' . $image_full_name);

                     // end image resize

                 // upload original image
                 $upload_path = 'images/car/original/';
                 $image_url = $upload_path . $image_full_name;

                Image::make($image)->save($image_url);
                //end upload original image

                // data insert from here
                 $data->image_small = $image_url_sm;

                 $data->image = $image_url;

            }

            //end   image load one with original image



// image load two with original image
  $image2 = $request->file('image2'); //take data from request
        if ($image2) {
            $image2_name = Str::random(5); //start random number
            $ext = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext;
            $upload_path = 'images/car/small/';
            $image2_url = $upload_path . $image2_full_name;

            // resize image start from here
            $resize_image2 = Image::make($image2->getRealPath());
             $resize_image2->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image2_full_name);
              //end resize image start from here


             // upload original image  from here
             $upload_path1 = 'images/car/original/';
             $image2_url1 = $upload_path1 . $image2_full_name;
             Image::make($image2)->save($image2_url1);
            //end upload original image  from here


             $data->image2_small = $image2_url;
             $data->image2 = $image2_url1;

        }
// end load image 2 with original image



//load image 3 with original image

        $image3 = $request->file('image3'); //take data from request
        if ($image3) {
            $image3_name = Str::random(5); //take random number
            $ext = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext;
            $upload_path = 'images/car/small/';
            $image3_url = $upload_path . $image3_full_name;

            //Resize image start from here

            $resize_image3 = Image::make($image3->getRealPath());
             $resize_image3->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image3_full_name);

            //Resize image end  here


             //upload original  image start from here
             $upload_path1 = 'images/car/original/';
             $image3_url1 = $upload_path1 . $image3_full_name;
            Image::make($image3)->save($image3_url1);

             //upload original  image end  here

            // data insert in datatables
             $data->image3_small = $image3_url;
             $data->image3 = $image3_url1;

        }
 // end load image 3 with original image




        //save data database in rooms table 

        $data->name = $request->name;
        $data->number = $request->number;
        $data->capacity = $request->capacity;
        $data->temporary = $request->temporary;
        $data->status = $request->status;
        $data->remarks = $request->remarks;

        

        $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Added successfully.']);
        }
        else{
             return response()->json(['success' => 'Data  Added Faild.']);
        }
    }

   
   



    //data update start
    public function update(Request $request)
    {
         $rules = array(
            'name'    =>  'required',
            'number'    =>  'required',
            'capacity'    =>  'required',
            'temporary'    =>  'required',
            'status'    =>  'required',
            'remarks'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       // update id start 
        $id = $request->updateId;
        $data =  Carpool_car::find($id);        
        //end update id        


// image load one with original image

   $image = $request->file('image'); 
        if ($image) {

            //delete image
            if(!empty($data->image)){

                $imgPath =$data->image;
                $delImg = unlink(public_path($imgPath));
            }

             if(!empty($data->image_small)){
                 $imgPath =$data->image_small;
                $delImg = unlink(public_path($imgPath));
            }
            // end delete image process


            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'images/car/small/';
            $image_url = $upload_path . $image_full_name;

            // image resize start here
            $resize_image = Image::make($image->getRealPath());
             $resize_image->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image_full_name);
             // end resize image here


             // upload original image start here
             $upload_path1 = 'images/car/original/';
             $image_url1 = $upload_path1 . $image_full_name;

            Image::make($image)->save($image_url1);
             // upload original image end here


            // data update from here
             $data->image_small = $image_url;

             $data->image = $image_url1;

        }

//end   image load one with original image



// image load two with original image
  $image2 = $request->file('image2');
        if ($image2) {

            // delete image two 

            if(!empty($data->image2)){

                $imgPath =$data->image2;
                $delImg = unlink(public_path($imgPath));
            }

             if(!empty($data->image2_small)){
                 $imgPath =$data->image2_small;
                $delImg = unlink(public_path($imgPath));
            }

            $image2_name = Str::random(5);
            $ext = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext;
            $upload_path = 'images/car/small/';
            $image2_url = $upload_path . $image2_full_name;

            // image resize start here
            $resize_image2 = Image::make($image2->getRealPath());
             $resize_image2->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image2_full_name);

             //image resize end here


             // upload image original here
             $upload_path1 = 'images/car/original/';
             $image2_url1 = $upload_path1 . $image2_full_name;
             Image::make($image2)->save($image2_url1);

              //end upload image original here


              // data update from here
             $data->image2_small = $image2_url;
             $data->image2 = $image2_url1;

        }
// end load image 2 with original image



//load image 3 with original image

        $image3 = $request->file('image3');
        if ($image3) {

            // delete image start from here
            if(!empty($data->image3)){

                $imgPath =$data->image3;
                $delImg = unlink(public_path($imgPath));
            }

             if(!empty($data->image3_small)){
                 $imgPath =$data->image3_small;
                $delImg = unlink(public_path($imgPath));
            }
            // end delete here


            $image3_name = Str::random(5);
            $ext = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext;
            $upload_path = 'images/car/small/';
            $image3_url = $upload_path . $image3_full_name;

            // image resize start from here
            $resize_image3 = Image::make($image3->getRealPath());
             $resize_image3->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image3_full_name);
             //image resize end here


             // upload original image
             $upload_path1 = 'images/car/original/';
             $image3_url1 = $upload_path1 . $image3_full_name;

            Image::make($image3)->save($image3_url1);
            // end upload original image


            // update data here
             $data->image3_small = $image3_url;
             $data->image3 = $image3_url1;

        }
 // end load image 3 with original image



        //save data database in rooms table 

        $data->name = $request->name;
        $data->number = $request->number;
        $data->capacity = $request->capacity;
        $data->temporary = $request->temporary;
        $data->status = $request->status;
        $data->remarks = $request->remarks;

        

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
         $room = Carpool_car::findOrFail($id); //find id here

        $imgName1 = $room->image;
        $imgName1_small = $room->image_small;
        $imgName2 = $room->image2;
        $imgName2_small = $room->image2_small;
        $imgName3 = $room->image3;
        $imgName3_small = $room->image3_small;

        //check this image have or  not in data base

        if( !empty($imgName1 && $imgName2 && $imgName3 &&$imgName1_small && $imgName2_small  && $imgName3_small)){

            $imgPath1 = $room->image;
            $delImg = unlink(public_path($imgPath1));


            $imgPath1_small = $room->image_small;
            $delImg = unlink(public_path($imgPath1_small));


            $imgPath2 = $room->image2;
            $delImg = unlink(public_path($imgPath2));


            $imgPath2_small = $room->image2_small;
            $delImg = unlink(public_path($imgPath2_small));


            $imgPath3 = $room->image3;
            $delImg = unlink(public_path($imgPath3));

            $imgPath3_small =$room->image3_small;
            $delImg = unlink(public_path($imgPath3_small));

            // data delete is successfully then data delete
            if($delImg){
               if($room->delete())
               {
                  echo 'Deleted';
                }
            } 
        }
    }
}
