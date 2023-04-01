<?php

namespace App\Http\Controllers\Web;
use App\Type;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function __construct(Menu $model, Product $product, Type $type)
    {
        $this->product  = $product;
        $this->menu     = $model;
        $this->type     = $type;
    }

    public function index($menu)
    {
        //-- Load data to footer
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        //-- 
        
        $type = $menu->types()->firstOrFail();
        $featured = $type->products()->where('is_featured', 1)->where('is_show', 1)->get();
        // if ($featured->count() == 0)
        //     $featured = $type->products()->where('is_featured', 1)->where('is_show', 1)->get();

            // $featured = $type->products()->where('is_featured', 0)->where('is_show', 1)->orderBy('id', 'desc')->take(3)->get();
        $products = $type->products()->where('products.is_show', 1)->orderBy('products.id', 'desc')->paginate(9);
        // $products = $type->products()->where('is_featured', 0)->where('is_show', 1)->whereNotIn('id', $featured->pluck('id'))->orderBy('id', 'desc')->paginate(3);
        // dd($featured);
        return view("web.product-categories",
        [
            'about'             => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'data'              => $data,
            'products'          => $products,
            'featured_products' => $featured,
            'type'              => $type,
            'types'             => $this->type->orderBy('sort')->get(),
            'menu'              => $menu,
            'menus'             => $this->menu->getMenus(),
            'route'             => $menu->type,
            'cart'              => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
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
        $type = $menu->types()->firstOrFail();
        $product = $this->product->firstAlias($alias);
        $products = $type->products()->where('products.is_show', 1)->where('id', '<>', $product->id)->orderBy('id', 'desc')->paginate(3);
        $featured = $type->products()->where('is_featured', 1)->where('is_show', 1)->get();
        // if ($featured->count() == 0)
        //     $featured = $type->products()->where('is_featured', 0)->where('is_show', 1)->orderBy('id', 'desc')->take(3)->get();
        // $products = $type->products()->where('is_show', 1)->where('id', '<>', $product->id)->orderBy('id', 'desc')->paginate(3);
        return view("web.product",
        [
            'about'     => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'data'      => $data,
            'products'  => $products,
            'product'   => $product,
            'featured_products' => $featured,
            'type'      => $type,
            'types'     => $this->type->orderBy('sort')->get(),
            'menu'      => $menu,
            'menus'     => $this->menu->getMenus(),
            'route'     => $menu->type,
            'cart'      => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
        ]);
    }
}
