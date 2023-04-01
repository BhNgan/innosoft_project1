<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreConfig;

class ConfigController extends Controller
{
    public function index()
    {
        // dd(Storage::get('config.php'));
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        return view('admin.config.index', [
            'data'  => $data,
            'route' => 'config',
        ]);
    }

    public function change(StoreConfig $request)
    {
        $data = $request->except(['_token', 'previous']);
        $write_data = serialize($data);
        Storage::put('config.php', $write_data);
        return redirect()->back()->with('success', 'create');
    }
}
