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

    public function users(){
        return $this->belongsToMany('App\User','product_rates');
      }

      public function images(){
        return $this->hasMany('App\Models\Product_image');
      }
      public function review(){
        return $this->hasMany('App\Models\Product_rate');
      }

      public function sizes()
      {
      return $this->belongsToMany('App\Models\Size', 'product_sizes', 'product_id',
     'size_id');
       }

    public function color()
    {
    return $this->belongsToMany('App\Models\Color', 'Product_colors', 'product_id')->withPivot('color_id');;
    }
    public function details()
    {
        return $this->hasMany('App\Models\Product_componant');
    }
    public function avgRating()
{
    return round($this->review()->avg('rate_no'),1);
}
public function verifyedReviews() {
    // return "ff";
    return $this->review()->pluck('comment')->toArray();

}
}
