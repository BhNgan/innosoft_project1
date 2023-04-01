<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuProduct extends Model
{
    protected $fillable = [
        'menu_id',
        'product_id',
    ];

    protected $primaryKey = ['menu_id', 'product_id'];
    public $incrementing = false;
}
