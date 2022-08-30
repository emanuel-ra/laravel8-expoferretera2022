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
    public function detail(){
        return $this->hasMany(quote_detail::class,'quote_id','id')->with('product');
    }
}
