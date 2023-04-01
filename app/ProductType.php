<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use CRUD;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'type_id',
    ];
}
