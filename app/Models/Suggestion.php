<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'suggest_date',

    ];
}
