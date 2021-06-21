<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'fees', 'bookingroom_id',
        'created_at','updated_at'
    ];

   
    protected $hidden = [
        'created_at','updated_at'
    ];
}
