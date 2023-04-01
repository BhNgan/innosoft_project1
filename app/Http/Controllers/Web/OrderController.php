<?php

namespace App\Http\Controllers\Web;

use App\Menu;
use App\Order;
use App\Category;
use App\Product;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder;
use Session;

class OrderController extends Controller
{
    public function __construct(Menu $menu, Order $model, Category $category, Product $product)
    {
        $this->menu     = $menu;
        $this->category = $category;
        $this->product  = $product;
        $this->model    = $model;
    }

    public function index($menu)
    {
        //-- Load data to footer
        $data2 = Storage::get('config.php');
        if (isset($data2)) {
            $data2 = unserialize($data2);
        }
        //--

        $sum = 0;
        $menu_cart = $this->menu->where('type', 'cart')->where('lang', $lang ?? app()->getLocale())->firstOrFail();
        if ( isset(Session::get('products')['cart']) ) {
            $data = Session::get('products')['cart'];
            ksort($data);
            $products = $this->product->whereIn('id', array_keys($data))->get()->zip(array_values($data));
            foreach ($products as $product) {
                $sum = $sum + ($product[0]->bill_price * $product[1]);
            }
            // dd($this->product->whereIn('id', array_keys(Session::get('products')['cart']))->orderByRaw('id')->get(), $this->product->whereIn('id', array_keys(Session::get('products')['cart']))->get());
        }
        return view("web.order",
        [
            'about'             => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'cart'              => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
            'categories'        => $this->category->get(),
            'menu'              => $menu,
            'menu_cart'         => $menu_cart,
            'menus'             => $this->menu->getMenus(),
            'products'          => $products ?? null,
            'route'             => $menu->type,
            'sum'               => $sum ?? 0,
            'data'              => $data2,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        if ( isset(Session::get('products')['cart']) ) {
            $products = $this->product->whereIn('id', array_keys(Session::get('products')['cart']))->get()->zip(array_values(Session::get('products')['cart']));
            $order = $this->model->create($request->all());
            $sum = 0;
            // dd($order->products()->attach($product[0]->id, ['quantity' => $product[1]]));
            foreach ($products as $product) {
                $sum += $this->product->find($product[0]->id)->bill_price * $product[1];
                // dd($product[0]->bill_price);
                $order->products()->attach($product[0]->id, ['quantity' => $product[1], 'bill_price' => $product[0]->bill_price]);
            }
            $order->update([
                'sum' => $sum,
            ]);
            Mail::to($request->email)->send(new OrderMail($order));
            $request->session()->forget('products');
        }
        else {
            return ('Giỏ hàng không có sản phẩm nào');
        }
        return redirect()->route('home')->with('status', 'Profile updated!');
    }
}
