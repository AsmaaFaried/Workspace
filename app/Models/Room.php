<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workspace;

class Room extends Model
{   
    protected $table= 'rooms';
    protected $fillable = [
        'id','workspace_id',
         'room_image', 'room_type','room_capacity',
        'room_discription','rent_room',
        'room_price','room_price_time',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function workspace(){
        return $this->belongsTo(Workspace::class,'workspace_id','id');
    }
}