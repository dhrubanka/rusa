<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monetary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function record(){
        return $this->belongsTo(Record::class);
    }
}
