<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use CRUD;
    use SoftDeletes;
    
    protected $fillable = [
        'lang',
        'language',
        'is_default',
        'note',
    ];

    public function defaultLang()
    {
        return self::first()->lang ?? app()->getLocale();
    }
}
