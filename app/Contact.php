<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use CRUD;

    protected $fillable = [
        'customer_name',
        'email',
        'content',
    ];
          
    public static $search = [
        'customer_name',
        'email',
    ];
}
