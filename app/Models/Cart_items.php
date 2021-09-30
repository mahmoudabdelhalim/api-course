<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_items extends Model
{
    //
    protected $fillable = [
        'cart_id',
        'product_id',
        'price',
    ];

    public function user(){
        return $this->belongsTo('App\Models\Cart','cart_id');
      }

      public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
      }
}
