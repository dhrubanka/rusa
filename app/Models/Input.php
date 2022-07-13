<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inputtype(){
        return $this->belongsTo('App\Models\Inputtype','input_type_id','id');
    }
}
