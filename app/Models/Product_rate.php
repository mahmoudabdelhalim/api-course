<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_rate extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'rate_no',
        'comment',
       
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

}
