<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderProduct;
use App\Product;
use App\Menu;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use Session;

class OrderController extends Controller
{
    public function __construct(Order $model, Product $product, Menu $menu, Category $category)
    {
        $this->category = $category;
        $this->menu     = $menu;
        $this->model    = $model;
        $this->product  = $product;
        $this->slug     = $model->getTable();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appends = $request->has('search') ? ['search' => $request->search] : [];
        return view("admin.$this->slug.index", [
            'request'       => $request,
            'appends'       => $appends,
            'data_table'    => $this->model->read(),
            'route'         => $this->slug,
        ]);
        // return view("admin.$this->slug.index",[
        //     'data_table'    => $this->model->read(),
        //     'route'         => $this->slug,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order, Product $product)
    {
        return view("admin.$this->slug.show",[
            'orders'            => $this->model->read(false),
            'products'          => $this->product->read(false),
            'data'              => $order,
            // 'route'             => $this->slug,
            'route'             => 'orders',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();
        //Foreign Key
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }
}
