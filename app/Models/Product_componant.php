<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_componant extends Model
{
    //
    protected $fillable = [
        'product_id',
        'key_name',
        'value_text',
    ];
}
