<?php

namespace App\Http\Controllers\Web;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct(Menu $model)
    {
        $this->menu = $model;
    }

    public function index($menu)
    {
        //-- Load data to footer
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        //--
        return view("web.$menu->type",
        [
            'about' => $menu->contents()->firstOrFail(),
            'data'  => $data,
            'menu'  => $menu,
            'menus' => $this->menu->getMenus(),
            'route' => $menu->type,
            'cart'  => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }
}