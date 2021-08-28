<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    protected $table = 'product_sizes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'size_id',

    ];
    public function size(){
        return $this->belongsTo('App\Models\Size','size_id');
    }
}
