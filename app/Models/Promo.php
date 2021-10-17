<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    //
    protected $table = 'promos';
    protected $fillable = [
        'promo_key',
        'expired_date',
        'value',
        'status',
    ];
}
