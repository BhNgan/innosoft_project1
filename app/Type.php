<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\CRUD;

class Type extends Model
{
    use CRUD;
    use Notifiable;
    use SoftDeletes;
    
    protected $fillable = [
        'alias',
        'avatar',
        'type_name',
        'sort',
        'note',
    ];

    public static $search = [
        'type_name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'App\ProductType');
        // return $this->belongsToMany('App\Product', 'product_types', 'type_id', 'product_id');
    }
    
    public function shownProducts()
    {
        return $this->belongsToMany('App\Product', 'App\ProductType')->where('is_show', 1 );
        // return $this->belongsToMany('App\Product', 'product_types', 'type_id', 'product_id');
    }

    public function menuType()
    {
        return $this->hasOne('App\MenuType');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'App\MenuType');
    }

    public function menu()
    {
        return $this->menus()->exists() ? $this->menus()->where('alias', '<>', '/')->firstOrFail() : [];
    }
    // public function menu()
    // {
    //     return $this->menuType()->menu;
    // }
}
