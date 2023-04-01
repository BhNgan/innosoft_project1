<?php

namespace App\Http\Controllers\Web;

use App\Content;
use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct(Menu $model, Content $content)
    {
        $this->content  = $content;
        $this->menu     = $model;
    }

    public function index($menu)
    {
        //-- Load data to footer
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        //--
        $category = $menu->categories()->firstOrFail();
        $featured = $category->contents()->where('contents.is_featured', 1)->where('contents.is_show', 1)->orderBy('contents.sort', 'desc')->get();
        if ($featured->count() == 0)
            $featured = $category->contents()->where('contents.is_featured', 0)->where('contents.is_show', 1)->orderBy('contents.id', 'desc')->orderBy('contents.sort', 'desc')->take(3)->get();
            // $contents = $category->contents()->where('contents.is_featured', 0)->where('contents.is_show', 1)->whereNotIn('contents.id', $featured->pluck('id'))->orderBy('contents.id', 'desc')->paginate(5);
        $contents = $category->contents()->where('contents.is_show', 1)->orderBy('contents.id', 'desc')->paginate(5);
        return view("web.news",
        [
            'about'             => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'contents'          => $contents,
            'featured_contents' => $featured,
            'category'          => $category,
            'menu'              => $menu,
            'menus'             => $this->menu->getMenus(),
            'route'             => $menu->type,
            'cart'              => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
            'data'              => $data,
        ]);
    }

    public function detail($menu, $alias)
    {
        //-- Load data to footer
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        //--
        $category = $menu->categories()->firstOrFail();
        $content = $this->content->firstAlias($alias);
        $contents = $category->contents()->where('contents.is_show', 1)->where('contents.id', '<>', $content->id)->orderBy('id', 'desc')->paginate(3);
        return view("web.content",
        [
            'about'     => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'contents'  => $contents,
            'content'   => $content,
            'category'  => $category,
            'data'      => $data,
            'menu'      => $menu,
            'menus'     => $this->menu->getMenus(),
            'route'     => $menu->type,
            'cart'      => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }
}