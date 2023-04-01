<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Auth;
use Hash;
class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model    = $model;
        $this->slug     = 'users';
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
            'route' => $this->slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $this->model->create($request->merge(['password' => Hash::make($request->password)])->all());
        return redirect()->route("$this->slug.index")->with('success', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.$this->slug.edit",
        [
            'data'  => $user,
            'route' => $this->slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        if ($request->filled('password')) {
            $request->validate([
                'password'  => 'required|confirmed|max:191|min:6',
            ]);
            $user->update($request->merge(['password' => Hash::make($request->password)])->all());
        }
        else $user->update($request->except(['password']));
        return redirect()->route("$this->slug.index")->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user == Auth::user())
            return redirect()->route("$this->slug.index")->with('error', 'selfDeleteError');
        $user->delete();
        return redirect()->route("$this->slug.index")->with('success', 'delete');
    }

    public function profile()
    {
        return view("admin.$this->slug.edit",
        [
            'data'  => Auth::user(),
            'route' => $this->slug,
        ]);
    }
}
