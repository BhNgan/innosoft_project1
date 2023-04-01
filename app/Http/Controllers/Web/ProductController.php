<?php

namespace App\Http\Controllers\Web;
use App\Product;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(Menu $model)
    {
        $this->menu = $model;
        $this->type = $type;
    }
    
    public function index($menu)
    {
        return view("web.$menu->type",
        [
            'product'   => $menu->products()->firstOrFail(),
            'menu'      => $menu,
            'menus'     => $this->menu->getMenus(),
            'route'     => $menu->type,
            'type'      => $type,
            'types'     => $this->type->orderBy('sort')->get(),
            'cart'      => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }
}
