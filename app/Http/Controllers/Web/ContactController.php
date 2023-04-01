<?php

namespace App\Http\Controllers\Web;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->menu = new Menu;
    }

    public function index($menu)
    {
        //-- Load data to footer and contact page
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        //--
        return view("web.$menu->type",
        [
            'about' => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,            
            'data'  => $data,
            'menu'  => $menu,
            'menus' => $this->menu->getMenus(),
            'route' => $menu->type,
            'cart'  => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }

    
    public function contact()
    {
        // dd("aa");
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        return view('web.contact', [
            'data' => $data,
        ]);
    }
}