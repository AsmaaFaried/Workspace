<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkinroom extends Model
{
    protected $fillable = [
        'chechin', 'bookingroom_id',
        'created_at','updated_at'
    ];

   
    protected $hidden = [
        'created_at','updated_at'
    ];

}
