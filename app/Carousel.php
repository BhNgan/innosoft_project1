<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use CRUD;
    protected $fillable = [
        'carousel_name',
        'avatar',
        'url',
        'text_overlay',
        'sort',
    ];
}
