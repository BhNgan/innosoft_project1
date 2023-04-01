<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ 
    use CRUD;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'parent_id',
        'avatar',
        'category_name',
        'is_show',
        'sort',
        'description',
        'lang',
        'note',
        'is_recruit',
    ];
        
    public static $search = [
        'category_name',
        'category_id',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function contents()
    {
        return $this->belongsToMany('App\Content', 'App\ContentCategory');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'App\MenuCategory');
    }

    public function getCategoryId()
    {
        return (self::where('lang', app()->getLocale())->get()->last()->id ?? 0) + 1;
    }
}
