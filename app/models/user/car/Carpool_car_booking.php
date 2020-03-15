<?php

namespace App\models\user\car;

use Illuminate\Database\Eloquent\Model;
use App\models\admin\car\Carpool_car;

class Carpool_car_booking extends Model
{
      protected $fillable = [
        'user_id', 'carpool_car_id', 'carpool_driver_id',
        'start', 'end', 'destination',
        'purpose',
    ];

    public function car()
    {
    	return $this->belongsTo(Carpool_car::class,'carpool_car_id');
    }
}
