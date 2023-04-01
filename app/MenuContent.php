<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuContent extends Model
{
    protected $fillable = [
        'menu_id',
        'content_id',
    ];

    protected $primaryKey = ['menu_id', 'content_id'];
    public $incrementing = false;
}
