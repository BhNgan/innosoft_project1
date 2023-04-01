<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = [
        'menu_id',
        'category_id',
        'is_banner',
    ];

    protected $primaryKey = ['menu_id', 'category_id'];
    public $incrementing = false;
}
