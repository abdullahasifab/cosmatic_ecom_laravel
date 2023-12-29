<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $guarded=[];
         public function order()
    {
        return $this->hasMany("App\Models\order");
    }
    use HasFactory;
}
