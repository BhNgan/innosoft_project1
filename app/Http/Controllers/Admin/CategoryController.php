<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    public function __construct(Category $model)
    {
        $this->model    = $model;
        $this->slug     = $model->getTable();
        $this->language = new Language;
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
            'categories'    => $this->model->get(),
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = $this->model->create($request->merge([
                'category_id'   => $this->model->getCategoryId(),
                'lang'          => $this->language->defaultLang(),
            ])->all());
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('categories', "$category->id.$extension");
            $category->update(['avatar' => "upload/$avatar"]);
        }
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.$this->slug.edit",
        [
            'categories'    => $this->model->get()->except($category->id),
            'data'          => $category,
            'route'         => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('categories', "$category->id.$extension");
            $request->merge(['avatar' => "upload/$avatar"]);
        }
        $category->update($request->all());
        if ($request->previous == url()->previous())
            return redirect()->route("$this->slug.index")->with('success', 'update');
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }
}
