<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workspace;
class BookingRoom extends Model
{
    protected $table= 'booking_rooms';
    protected $fillable = [
        'id','workspace_id','phone','hours',
        'max_num',
        'time_from','time_to','date',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function workspace(){
        return $this->belongsTo(Workspace::class,'workspace_id','id');
    }
}
