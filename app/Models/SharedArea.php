<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedArea extends Model
{
    protected $table= 'shared_areas';
    protected $fillable = [
        'id', 'table_image','table_capacity',
        'table_discription','table_price',
        'table_price_time',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    // public function Workspace(){
    //     return $this->belongTo(related:'Workspace',foreignKey:'workspaces_id',localKey:'id');
    // }
}
