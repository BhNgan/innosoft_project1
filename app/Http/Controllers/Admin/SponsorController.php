<?php

namespace App\Http\Controllers\Admin;

use App\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSponsor;
use App\Http\Requests\UpdateSponsor;

class SponsorController extends Controller
{
    public function __construct (Sponsor $sponsor)
    {
        $this->model = $sponsor;
        $this->slug = $sponsor->getTable();
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
        // return view("admin.$this->slug.index", [
        //     'route'         => $this->slug,
        //     'data_table'    => $this->model->read(),
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
            'route'         => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSponsor $request)
    {
        $sponsor = $this->model->create($request->all());
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('sponsors', "$sponsor->id.$extension");
            $sponsor->update(['avatar' => "upload/$avatar"]);
        }
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view("admin.$this->slug.edit",
        [
            'data'                  => $sponsor,
            'route'                 => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsor $request, Sponsor $sponsor)
    {
        if ($request->hasFile('upload'))
        {
            $extension = $request->upload->extension();
            $avatar = $request->upload->storeAs('sponsors', "$sponsor->id.$extension");
            $request->merge(['avatar' => "upload/$avatar"]);
        }
        $sponsor->update($request->all());
        if ($request->previous == url()->previous())
            return redirect()->route("$this->slug.index")->with('success', 'update');
        return redirect($request->previous)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->back();
    }
}
