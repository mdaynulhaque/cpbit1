<?php

namespace App\Http\Controllers\admin\car\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// customize here
use Illuminate\Support\Str;
use App\models\admin\car\driver\Carpool_driver;
use App\models\admin\car\Carpool_car;

use DataTable;
use Validator;
use Image;

class DriversController extends Controller
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
            return datatables()->of(Carpool_driver::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Delete</button>';
                        $button .= '&nbsp;&nbsp;';

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
                       
                        $button = '<img src='.$url1.' width="100" height="100" class="img-thumbnail" />';
                         $button .= '<p class="mb-0"> <b>Name: </b>'.$data->name.' </p>';
                         $button .= '<p class="mb-0"> <b>Phone: </b>'.$data->contact.' </p>';
                         $button .= '<p class="mb-0"> <b>License: </b>'.$data->license.' </p>';
                        return $button;
                    })
                    ->addColumn('car_info', function($data){

                        $button = '<img src='.$data->driver->image2_small.' width="200" height="200" class="img-thumbnail" />';
                         $button .= '<p class="mb-0"> <b>Car Name: </b>'.$data->driver->name.' </p>';
                         $button .= '<p class="mb-0"> <b>Car Number: </b>'.$data->driver->number.' </p>';
                        
                         if($data->driver->temporary == 1){
                          $button .= '<p class="mb-0"> <b>Car Type: </b> Regular </p>';  
                        }
                        else{
                          $button .= '<p class="mb-0"> <b>Car Type: </b> Temporary </p>'; 
                        }


                        return $button;
                    })
                    ->rawColumns(['action', 'image','car_info'])
                    ->make(true);


                 
             
        }

        





        return view('admins.car.driver.driver_details');
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
            'image'         =>   'required|image|mimes:jpeg,png,jpg|max:500',
            'contact'    =>  'required',
            'license'    =>  'required',
            'status'    =>  'required',
            'nid'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = new Carpool_driver();        


// image load one with original image

 $image = $request->file('image'); //take data from view
        if ($image) {
            $image_name = Str::random(5);  //random data create
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path_sm = 'images/car/driver/small/';
            $image_url_sm = $upload_path_sm . $image_full_name;

            // image resize from here

            $resize_image = Image::make($image->getRealPath());
             $resize_image->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path_sm . '/' . $image_full_name);

             // end image resize

             // upload original image
             $upload_path = 'images/car/driver/original/';
             $image_url = $upload_path . $image_full_name;

            Image::make($image)->save($image_url);
            //end upload original image

            // data insert from here
             $data->image_small = $image_url_sm;

             $data->image = $image_url;

        }

//end   image load one with original image





        //save data database in rooms table 

        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->license = $request->license;
        $data->status = $request->status;
        $data->nid = $request->nid;


        $success = $data->save();

        if($success){
             return response()->json(['success' => 'Data Added successfully.']);
        }
        else{
             return response()->json(['success' => 'Data not Added successfully.']);
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


// Driver  block function here


    public function block($id){
        $driver=Carpool_driver::find($id);
        $temp="";

        if($driver->status == "1"){
            $temp=0;
        }

        if($driver->status =="0"){
           $temp=1;
        }
        $driver->status=$temp;
        $status=$driver->save();
        if ($status) {
           return response()->json(['success' => 'Driver Block successfully.']);
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
            $data = Carpool_driver::findOrFail($id);
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
            'contact'    =>  'required',
            'license'    =>  'required',
            'status'    =>  'required',
            'nid'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // update id start 
        $id = $request->updateId;
        $data =  Carpool_driver::find($id);        
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
            $upload_path = 'images/car/driver/small/';
            $image_url = $upload_path . $image_full_name;

            // image resize start here
            $resize_image = Image::make($image->getRealPath());
             $resize_image->resize(150, 150, function($constraint){
                 $constraint->aspectRatio();
            })->save($upload_path . '/' . $image_full_name);
             // end resize image here


             // upload original image start here
             $upload_path1 = 'images/car/driver/original/';
             $image_url1 = $upload_path1 . $image_full_name;

            Image::make($image)->save($image_url1);
             // upload original image end here


            // data update from here
             $data->image_small = $image_url;

             $data->image = $image_url1;

        }

//end   image load one with original image




        //save data database in rooms table 

        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->license = $request->license;
        $data->status = $request->status;
        $data->nid = $request->nid;


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
         $car_driver = Carpool_driver::findOrFail($id); //find id here

        $imgName1 = $car_driver->image;
        $imgName1_small = $car_driver->image_small;
     

        //check this image have or  not in data base

        if( !empty($imgName1  && $imgName1_small)){

            $imgPath1 = $car_driver->image;
            $delImg = unlink(public_path($imgPath1));


            $imgPath1_small = $car_driver->image_small;
            $delImg = unlink(public_path($imgPath1_small));


            // data delete is successfully then data delete
            if($delImg){
               if($car_driver->delete())
               {
                  echo 'Deleted';
                }
            } 
        }
    }
}
