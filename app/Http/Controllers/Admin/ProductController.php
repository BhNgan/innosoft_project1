<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\Type;
use App\ProductType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

class ProductController extends Controller
{
    public function __construct(Product $model)
    {
        $this->model    = $model;
        $this->slug     = 'products';
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
        return view("admin.$this->slug.create",[
            'types'         => Type::all(),
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = $this->model->create($request->all());
        $product->types()->attach($request->type_ids);
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('products', "$product->id.$extension");
            $product->update(['avatar' => "upload/$avatar"]);
        }
        if ($request->continue) {
            return redirect()->route("$this->slug.create")->with('success', 'create');
        }
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("admin.$this->slug.edit", [
            'types'         => Type::all(),
            'product_types' => $product->types->pluck('id')->toJson(),
            'data'          => $product,
            'route'         => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('products', "$product->id.$extension");
            $request->merge(['avatar' => "upload/$avatar"]);
        }
        $product->update($request->all());
        $product->types()->sync($request->type_ids);
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }
    
    public function products()
    {
        return view("admin.$this->slug.products",[
            'products'    => $this->model->read(),
        ]);
    }
}
