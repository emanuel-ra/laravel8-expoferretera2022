<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_data_sheet_specifications extends Model
{
    use HasFactory;

    public function sub() {
        return $this->hasMany(products_data_sheet_sub_specifications::class,'specifications_id');
    }
}
