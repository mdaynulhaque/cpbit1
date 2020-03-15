<?php

namespace App\models\admin\room;

use Illuminate\Database\Eloquent\Model;
use App\models\user\room\Room_booking;

class Room extends Model
{
     protected $fillable = [
        'name', 'image', 'image2',
        'image3', 'image_small', 'image2_small',
        'image3_small', 'capacity', 'remarks',
        'residance', 'projector', 'status','created_by',
    ];

 
}
