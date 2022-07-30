<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function monetaries(){
        return $this->hasMany('App\Models\Monetary', 'record_id', 'id');
        // ('App\Models\Inputtype','input_type_id','id');
    }

    public function particulars(){
        return $this->hasMany('App\Models\Particular', 'record_id', 'id');
    }
}
