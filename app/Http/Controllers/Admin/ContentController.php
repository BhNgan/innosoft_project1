<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Content;
use App\ContentCategory;
use App\Language;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContent;
use App\Http\Requests\UpdateContent;

class ContentController extends Controller
{
    public function __construct(Content $model)
    {
        $this->model            = $model;
        $this->slug             = $model->getTable();
        $this->category         = new Category;
        $this->content_category = new ContentCategory;
        $this->language         = new Language;
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
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContent $request)
    {
        $content = $this->model->create($request->merge([
                'user_id'       => Auth::id(),
                'content_id'    => $this->model->getContentId(),
                'lang'          => $this->language->defaultLang(),
            ])->all());
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('contents', "$content->id.$extension");
            $content->update(['avatar' => "upload/$avatar"]);
        }
        foreach ($request->categories as $category_id)
            $this->content_category->create([
                'content_id'   => $content->id,
                'category_id'   => $category_id,
            ]);
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view("admin.$this->slug.edit",
        [
            'content_categories'    => $content->content_categories()->get()->pluck('category_id'),
            'categories'            => $this->category->get(),
            'data'                  => $content,
            'route'                 => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContent $request, Content $content)
    {
        $content->content_categories()->delete();
        foreach ($request->categories as $category_id)
            $this->content_category->create([
                'content_id'   => $content->id,
                'category_id'   => $category_id,
            ]);
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('contents', "$content->id.$extension");
            $request->merge(['avatar' => "upload/$avatar"]);
        }
        $content->update($request->all());
        if ($request->previous == url()->previous())
            return redirect()->route("$this->slug.index")->with('success', 'update');
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->content_categories()->delete();
        $content->delete();
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }
}
