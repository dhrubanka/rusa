<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputtype extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inputs(){
        return $this->hasMany(Input::class);
    }
}
