<?php

namespace App\models\admin\car\driver;

use Illuminate\Database\Eloquent\Model;

use App\models\admin\car\Carpool_car;

class Carpool_driver extends Model
{
    
	 protected $fillable = [
       'car_id', 'name', 'contact', 'license',
        'image', 'nid', 'status',
        
    ];


     public function driver()
    {
    	return $this->belongsTo(Carpool_car::class,'car_id');
    }
}
