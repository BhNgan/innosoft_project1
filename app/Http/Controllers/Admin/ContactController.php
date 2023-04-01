<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class ContactController extends Controller
{
    public function __construct(Contact $model)
    {
        $this->model    = $model;
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
        // return view("admin.$this->slug.index", [
        //     'route'           => $this->slug,
        //     'data_table'      => $this->model->read(),
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
    public function store(StoreContact $request)
    {
        $contact = $this->model->create($request->all());
        Mail::to($request->email)->send(new ContactMail($contact));
        return redirect()->back()->with([
            'info'   => "Cám ơn góp ý của quý khách",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view("admin.$this->slug.show",[
            'data'  => $contact,
            'route' => $this->slug,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // config([
        //     'location.address'   => $request->address,
        //     'location.phone'     => $request->phone,
        //     'location.fax'       => $request->fax,
        //     'location.email'     => $request->email,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'delete');;
    }
}
