<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use CRUD;

    protected $fillable = [
        'menu_id',
        'parent_id',
        'menu_name',
        'alias',
        'type',
        'target',
        'is_show',
        'sort',
        'lang',
        'note',
    ];
      
    public static $search = [
        'menu_name',
        'menu_id',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'App\MenuCategory');
    }

    public function contents()
    {
        return $this->belongsToMany('App\Content', 'App\MenuContent');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type', 'App\MenuType');
    }

    public function menu_categories()
    {
        return $this->hasMany('App\MenuCategory');
    }

    public function menu_contents()
    {
        return $this->hasMany('App\MenuContent');
    }

    public function menu_category()
    {
        return $this->hasOne('App\MenuCategory');
    }

    public function menu_content()
    {
        return $this->hasOne('App\MenuContent');
    }

    public function menu_product()
    {
        return $this->hasOne('App\MenuProduct');
    }

    public function menu_type()
    {
        return $this->hasOne('App\MenuType');
    }
    
    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function getMenuId()
    {
        return (self::where('lang', app()->getLocale())->get()->last()->id ?? 0) + 1;
    }

    public function getMenus($parent_id = 0, $lang = null)
    {
        return self::where('lang', $lang ?? app()->getLocale())
                    ->where('parent_id', $parent_id)
                    ->where('is_show', 1)
                    ->orderBy('sort')
                    ->get()
                    ->load('children');
    }
    
    public function getBanners()
    {
        return $this->belongsToMany('App\Category', 'App\MenuCategory')->wherePivot('is_banner', true);
    }
}
