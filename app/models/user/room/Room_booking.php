<?php

namespace App\models\user\room;

use Illuminate\Database\Eloquent\Model;

use App\models\admin\room\Room;

class Room_booking extends Model
{
     protected $fillable = [
        'room_id', 'start', 'end',
        'hours', 'purpose', 'status',
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }
}
