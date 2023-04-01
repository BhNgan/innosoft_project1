<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    protected $fillable = [
        'content_id',
        'category_id',
        'is_used',
        'is_show',
        'is_featured',
        'sort',
    ];

    protected $primaryKey = ['content_id', 'category_id'];
    public $incrementing = false;
}
