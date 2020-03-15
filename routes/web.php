<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// this is for admin room route start
Route::group(['prefix'=>'admin_room'] ,function(){
	Route::get('/' , 'admin\room\RoomsController@index')->name('room.dashboard');
	Route::get('/details' ,'admin\room\RoomsController@show')->name('room.show'); //view file route
	Route::post('/store' ,'admin\room\RoomsController@store')->name('room.store'); //store file route
	Route::get('/edit/{id}', 'admin\room\RoomsController@edit')->name('room.edit'); //edit data from view  file
	Route::post('/room/update', 'admin\room\RoomsController@update')->name('room.update'); //updata database room booking

	Route::get('/delete/{id}', 'admin\room\RoomsController@destroy')->name('room.delete'); //delete data in 
	Route::get('/report', 'admin\room\RoomsController@report')->name('booking.report'); //Booking report data in 
	Route::get('/celendar', 'admin\room\RoomsController@celendar')->name('booking.celendar'); //view data  in celendar 

	Route::get('/block/{id}', 'admin\room\RoomsController@block')->name('room.block'); //Change status for room block
    
});
// this is for admin room route end





//this is for user room booking start
Route::group(['prefix'=>'user_room'] ,function(){
	Route::get('/' , 'user\room\RoomsController@index')->name('booking.dashboard');

	Route::get('/view_room' , 'user\room\RoomsController@show')->name('room.view');
	
	Route::get('/details/{id}' ,'user\room\RoomsController@details')->name('booking.details'); //view file route
	Route::post('/store' ,'user\room\RoomsController@store')->name('booked'); //view file route

	Route::get('/booked_room/{id}' ,'user\room\RoomsController@booked_room')->name('booked.room'); //view file route

    
});

//this is for user room booking end



// login route  start from Here
 Route::get("/", "login\LoginsController@index")->name('login.index');
 Route::post("/dashboard", "login\LoginsController@store")->name('login.dashboard');
//login route end





// this is for admin Holiday route start
 Route::group(['prefix'=>'holiday'] ,function(){
 	Route::get('/' , 'admin\holiday\HolidaysController@index')->name('holiday');
 	Route::post('/store' , 'admin\holiday\HolidaysController@store')->name('holiday.store');
 	Route::get('/edit/{id}' , 'admin\holiday\HolidaysController@edit')->name('holiday.edit');
 	Route::post('/update' , 'admin\holiday\HolidaysController@update')->name('holiday.update');
 	Route::get('/delete/{id}' , 'admin\holiday\HolidaysController@destroy')->name('holiday.delete');

});
// this is for admin Holiday route end















 // this is for admin room route start
Route::group(['prefix'=>'admin_car'] ,function(){
	Route::get('/' , 'admin\car\CarsController@index')->name('car.dashboard');
	Route::get('/details' ,'admin\car\CarsController@show')->name('car.show'); //view file route
	Route::post('/store' ,'admin\car\CarsController@store')->name('car.store'); //store file route
	Route::get('/edit/{id}', 'admin\car\CarsController@edit')->name('car.edit'); //edit data from view  file
	Route::post('/car/update', 'admin\car\CarsController@update')->name('car.update'); //updata database car booking

	Route::get('/delete/{id}', 'admin\car\CarsController@destroy')->name('car.delete'); //delete data in 
	// // Route::get('/report', 'admin\car\CarsController@report')->name('booking.report'); //Booking report data in 
	// Route::get('/celendar', 'admin\car\CarsController@celendar')->name('car_booking.celendar'); //view data  in celendar 

	Route::get('/block/{id}', 'admin\car\CarsController@block')->name('car.block'); //Change status for car block
	Route::get('/type/{id}', 'admin\car\CarsController@carType')->name('car.type'); //Change status for car block

	Route::get('/car/fixed/{id}', 'admin\car\CarsController@fixed')->name('car.fixed'); //updata database car booking

	Route::post('/car/fixed/store' ,'admin\car\CarsController@fixedUpdate')->name('car.fixed.store'); //store file route
    
});
// this is for admin car route end










//Admin car driver route start
Route::group(['prefix'=>'admin_car_driver'] ,function(){
	Route::get('/' , 'admin\car\driver\DriversController@index')->name('driver.index');
	Route::post('/store' , 'admin\car\driver\DriversController@store')->name('driver.store');
	Route::get('/edit/{id}' , 'admin\car\driver\DriversController@edit')->name('driver.edit');
	Route::post('/update' , 'admin\car\driver\DriversController@update')->name('driver.update');
	Route::get('/delete/{id}' , 'admin\car\driver\DriversController@destroy')->name('driver.delete');

	Route::get('/block/{id}', 'admin\car\driver\DriversController@block')->name('car.block'); //Change status for car block
});





//Admin car Destination route start
Route::group(['prefix'=>'admin_car_destination'] ,function(){
	Route::get('/' , 'admin\car\destination\Carpool_destinationsController@index')->name('destination.index');

	Route::post('/store' , 'admin\car\destination\Carpool_destinationsController@store')->name('destination.store');


	Route::get('/edit/{id}' , 'admin\car\destination\Carpool_destinationsController@edit')->name('destination.edit');

	Route::post('/update' , 'admin\car\destination\Carpool_destinationsController@update')->name('destination.update');


	Route::get('/delete/{id}' , 'admin\car\destination\Carpool_destinationsController@destroy')->name('destination.delete');

	
});



//this is for user room booking start
Route::group(['prefix'=>'user_car'] ,function(){
	Route::get('/' , 'user\car\CarBookingController@index')->name('car_booking.dashboard');

	Route::get('/regular' , 'user\car\CarBookingController@show')->name('car.view.regular');
	Route::get('/temmporary' , 'user\car\CarBookingController@show1')->name('car.view.temporary');
	
	Route::get('/details/{id}' ,'user\car\CarBookingController@details')->name('car_booking.details'); //view file route
	Route::post('/store' ,'user\car\CarBookingController@store')->name('car.booked'); //view file route

	Route::get('/booked_car/{id}' ,'user\car\CarBookingController@booked_car')->name('car_booking.view'); //view file route

    
});

//this is for user room booking end
