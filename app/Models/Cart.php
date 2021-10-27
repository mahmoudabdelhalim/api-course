<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id',
        'product_id',
        'product_size',
        'product_color',
        'quantity',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
      }

      public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
      }
}
