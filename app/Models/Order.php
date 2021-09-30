<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'order_no',
    'user_id',
    'address_id',
    'payway',
    'payment_id',
    'order_date',
    'copoun',
    'subtotally',
    'tax',
    'delivery_cost',
    'total',
    'status',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
      }

}
