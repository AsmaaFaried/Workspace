<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkoutroom extends Model
{
    protected $fillable = [
        'chechout', 'bookingroom_id',
        'created_at','updated_at'
    ];

   
    protected $hidden = [
        'created_at','updated_at'
    ];
}
