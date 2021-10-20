<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCMNotification extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
}
