<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_color extends Model
{
    //
    protected $fillable = [
        'product_id',
        'color_id',
       
    ];
    public function color(){
        return $this->belongsTo('App\Models\Color','color_id');
    }
}
