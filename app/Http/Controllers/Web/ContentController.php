<?php

namespace App\Http\Controllers\Web;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(Menu $model)
    {
        $this->menu = $model;
    }

    public function index($menu)
    {
        return view("web.$menu->type",
        [
            'content'   => $menu->contents()->firstOrFail(),
            'menu'      => $menu,
            'menus'     => $this->menu->getMenus(),
            'route'     => $menu->type,
            'cart'      => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }
}