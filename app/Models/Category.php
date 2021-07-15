<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    'image',
    'description',
    'order',
    'parent_category_id',
    ];
    public function sub_cat(){
        return $this->belongsTo('App\Models\Category','parent_category_id');
    }
    
}
