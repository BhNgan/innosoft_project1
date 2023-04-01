<?php

namespace App\Http\Controllers\Admin;

use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarousel;
use App\Http\Requests\UpdateCarousel;

class CarouselController extends Controller
{
    public function __construct (Carousel $carousel)
    {
        $this->model = $carousel;
        $this->slug = $carousel->getTable();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.$this->slug.index", [
            'route'         => $this->slug,
            'data_table'    => $this->model->read(),
        ]);
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
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCarousel $request)
    {
        $carousel = $this->model->create($request->all());
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('carousels', "$carousel->id.$extension");
            $carousel->update(['avatar' => "upload/$avatar"]);
        }
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view("admin.$this->slug.edit",
        [
            'data'                  => $carousel,
            'route'                 => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarousel $request, Carousel $carousel)
    {
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('carousels', "$carousel->id.$extension");
            $request->merge(['avatar' => "upload/$avatar"]);
        }
        $carousel->update($request->all());
        if ($request->previous == url()->previous())
            return redirect()->route("$this->slug.index")->with('success', 'update');
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->back();
    }
}
