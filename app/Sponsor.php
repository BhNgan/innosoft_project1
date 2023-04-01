<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use CRUD;
    protected $fillable = [
        'sponsor_name',
        'avatar',
        'url',
        'target',
        'sort',
        'is_show',
        'note'
    ];

    public static $search = [
        'sponsor_name',
    ];
}
