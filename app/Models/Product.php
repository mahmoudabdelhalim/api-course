<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'price_after_discount',
        'brand_id',
        'category_id',
        'shop_id',
        'status',
    ];
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function shop(){
        return $this->belongsTo('App\Models\Shop','shop_id');
    }
}
