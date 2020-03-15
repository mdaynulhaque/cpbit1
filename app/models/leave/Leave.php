<?php

namespace App\models\leave;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
     protected $fillable = [
        'title', 'startDate', 'endDate',
    ];

}
