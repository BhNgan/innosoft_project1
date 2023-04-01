<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Content;
use App\Language;
use App\Menu;
use App\MenuCategory;
use App\MenuType;
use App\MenuContent;
use App\Product;
use App\Type;
use App\MenuProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenu;
use App\Http\Requests\UpdateMenu;

class MenuController extends Controller
{
    public function __construct(Menu $model)
    {
        $this->model            = $model;
        $this->slug             = $model->getTable();
        $this->category         = new Category;
        $this->content          = new Content;
        $this->type             = new Type;
        $this->product          = new Product;
        $this->language         = new Language;
        $this->menu_category    = new MenuCategory;
        $this->menu_type        = new MenuType;
        $this->menu_content     = new MenuContent;
        $this->menu_product     = new MenuProduct;
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
        // return view("admin.$this->slug.index",
        // [
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
        return view("admin.$this->slug.create",
        [
            'categories'    => $this->category->get(),
            'contents'      => $this->content->get(),
            'types'         => $this->type->get(),
            'products'      => $this->product->get(),
            'menus'         => $this->model->get(),
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu $request)
    {
        // dd($request->all());
        $menu = $this->model->create($request->merge([
                'menu_id'   => $this->model->getMenuId(),
                'lang'      => $this->language->defaultLang(),
            ])->all());
        $request->merge([
            'menu_id'   => $menu->id
        ]);
        if ($menu->type == 'about' || $menu->type == 'content')
        {
            $this->menu_content->create($request->only(['menu_id', 'content_id']));
        }
        else if ($menu->type == 'home' || $menu->type == 'category')
        {
            $this->menu_category->create($request->only(['menu_id', 'category_id']));
            if ($request->banner_id) {
                $menu->categories()->attach($request->banner_id, [
                    'is_banner'    => true,
                ]);
            }
        }
        else if ($menu->type == 'type')
        {
            $this->menu_type->create($request->only(['menu_id', 'type_id']));
        }
        else if ($menu->type == 'product')
        {
            $this->menu_product->create($request->only(['menu_id', 'product_id']));
        }
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view("admin.$this->slug.edit",
        [
            'menu_type'     => $menu->menu_type,
            'types'         => $this->type->get(),
            'products'      => $this->product->get(),
            'menu_product'  => $menu->menu_product,
            'menu_category' => $menu->menu_category,
            'menu_content'  => $menu->menu_content,
            'banner'        => $menu->getBanners->first(),
            'categories'    => $this->category->get(),
            'contents'      => $this->content->get(),
            'menus'         => $this->model->get()->except($menu->id),
            'data'          => $menu,
            'route'         => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenu $request, Menu $menu)
    {
        $request->merge([
            'target'    => ($request->target ?? '')
        ]);
        $menu->update($request->all());
        $request->merge([
            'menu_id'   => $menu->id,
        ]);
        if ($menu->type == 'about' || $menu->type == 'content')
        {
            $menu->menu_contents()->delete();
            $this->menu_content->create($request->only(['menu_id', 'content_id']));
        }
        else if ($menu->type == 'category' || $menu->type == 'home')
        {
            $menu->menu_categories()->delete();
            $this->menu_category->create($request->only(['menu_id', 'category_id']));
            if ($request->banner_id) {
                $menu->categories()->attach($request->banner_id, [
                    'is_banner'    => true,
                ]);
            }
        }
        else if ($menu->type == 'type')
        {
            $menu->menu_type()->delete();
            $this->menu_type->create($request->only(['menu_id', 'type_id']));
        }
        else if ($menu->product == 'product')
        {
            $menu->menu_products()->delete();
            $this->menu_product->create($request->only(['menu_id', 'product_id']));
        }
        if ($request->previous == url()->previous())
            return redirect()->route("$this->slug.index")->with('success', 'update');
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }
}
