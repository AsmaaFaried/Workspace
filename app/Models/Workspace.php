<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\BookingRoom;
class Workspace extends Model
{
    //

    protected $table= 'workspaces';
    protected $fillable = [
        'id',
        'profile_picture',
        'name',
        'location',
        'mobile_one',
        'mobile_two',
        'open_time' ,
        'close_time',
        'serve_food',
        'wifi',
        'created_at',
        'updated_at',
    
    ];
    protected $hidden = ['created_at',
    'updated_at',];

    // Begin Relation between workspaces and its Rooms //

    public function rooms(){
        return $this->hasMany(Room::class,'workspace_id','id');
    }

    

    public function booking_rooms(){
        return $this->hasMany(BookingRoom::class,'workspace_id','id');
    }

    // End  Relation between workspaces and its Rooms //

}
