<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quote extends Model
{
    use HasFactory;

    public function prospect(){
        return $this->hasOne(prospects::class,'id','prospect_id');
    }
}
