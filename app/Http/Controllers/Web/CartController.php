<?php

namespace App\Http\Controllers\Web;

use App\Menu;
use App\Category;
use App\Product;
// use App\Type;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Session;

class CartController extends Controller
{
    public function __construct(Menu $model)
    {
        $this->menu     = $model;
        $this->category = new Category;
        $this->product  = new Product;
        // $this->type     = $type;
    }

    public function index($menu)
    {
        //-- Load data to footer
        $data2 = Storage::get('config.php');
        if (isset($data2)) {
            $data2 = unserialize($data2);
        }
        //--
        if ( isset(Session::get('products')['cart']) ){
            $data = Session::get('products')['cart'];
            ksort($data);
            $products = $this->product->whereIn('id', array_keys($data))->get()->zip(array_values($data));
        }

        // dd($products, $data, array_keys($data), array_values($data));
        return view("web.cart",
        [
            'about'             => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'cart'              => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
            'categories'        => $this->category->get(),
            'menu'              => $menu,
            'menus'             => $this->menu->getMenus(),
            'products'          => $products ?? null,
            'route'             => $menu->type,
            'data'              => $data2,
            // 'type'      => $type,
            // 'types'     => $this->type->orderBy('sort')->get(),
        ]);
    }
    
    public function add_product(Request $request)
    {
        // $request->session()->flush();
        $id = $request->product_id;
        $quantity = $request->quantity;
        $products = $request->session()->get('products'); //create array product if exists
        if(isset($products['cart'][$id])) {
            if(isset($quantity)) {
                if($quantity != 0 )
                    $products['cart'][$id] = $quantity;
                else
                    unset($products['cart'][$id]);
            }
            else {
                $products['cart'][$id] = $products['cart'][$id] + 1;
            }
        }
        else {
            $quantity ? $products['cart'][$id] = $quantity : $products['cart'][$id] = 1;
        }
        $request->session()->put('products', $products);

        return [
            'products'  => $request->session()->get('products')
        ];
    }
}
