<?php

namespace App\models\admin\car;

use Illuminate\Database\Eloquent\Model;
use App\models\admin\car\driver\Carpool_driver;

class Carpool_car extends Model
{
     protected $fillable = [
        'name', 'number', 'capacity',
        'image', 'image2', 'image3',
        'temporary', 'remarks', 'status',
    ];

     public function car()
    {
    	return $this->hasOne(Carpool_driver::class,'car_id');
    }

}
