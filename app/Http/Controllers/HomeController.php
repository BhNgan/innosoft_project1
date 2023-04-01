<?php

namespace App\Http\Controllers;

// use App\Store;
// use Auth;
use App;
use App\Menu;
use App\Sponsor;
use App\Carousel;
use App\Product;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->menu = new Menu;
        $this->type = new Type;
        $this->sponsor = new Sponsor;
        $this->carousel = new Carousel;
        $this->product = new Product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return redirect()->route('admin');
        // return view('web.home');
        // dd($this->type->first()->menuType->menu->alias);
        $menu = $this->menu->where('alias', '/')->where('lang', app()->getLocale())->firstOrFail();
        $category = $menu->categories()->firstOrFail();
        $contents = $category->contents()->where('contents.is_featured')->take(3)->latest()->get();
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        if(count($contents) == 0 )
            $contents = $category->contents()->take(2)->latest()->get();
        // $contents = $category->contents()->where('contents.is_show', 1)->orderBy('contents.id', 'desc')->paginate(3);
        return view("web.$menu->type",
        [
            'data'          => $data,
            'about'         => $this->menu->where('type', 'about')->first() ? $this->menu->where('type', 'about')->first()->contents()->first() :  null,
            'banner'        => $menu->getBanners->where('is_show', 1)->first(),
            'carousels'     => $this->carousel->orderBy('sort')->get(),
            'cart'          => $this->menu->where('type', 'cart')->where('lang', app()->getLocale())->firstOrFail(),
            'category'      => $category,
            'contents'      => $contents,
            'menu'          => $menu,
            'menu_category' => $category->menus()->where('alias', '<>', '/')->first(),
            'menus'         => $this->menu->getMenus(),
            'products'      => $this->product->where('is_show', 1)->take(4)->get(),
            'route'         => $menu->type,
            'sponsors'      => $this->sponsor->where('is_show', 1)->orderBy('sort')->get(),
            'test'          => $this->type->first(),
            'types'         => $this->type->orderBy('sort')->get(),
        ]);
    }

    public function menu($alias)
    {
        // return view("web.$alias");
        $menus = explode('/', $alias);
        $countMenu = count($menus);
        if ($countMenu > 2) abort(404);
        $menu = $this->menu->where('alias', $menus[0])->where('lang', app()->getLocale())->firstOrFail();
        if ($countMenu == 2)
            return App::make("App\Http\Controllers\Web\\" . Str::studly($menu->type) . "Controller")->detail($menu, $menus[1]);
        return App::make("App\Http\Controllers\Web\\" . Str::studly($menu->type) . "Controller")->index($menu);
    }
    
    public function type(Request $request)
    {
        
        $view = View::make('web.home.append', [
            'type'          => $this->type->find($request->type),
            'products'      => $this->type->find($request->type)->shownProducts
        ]);
        // return view("web.home.append", [
        //     // 'types'         => $this->type->orderBy('sort')->get(),
        //     'type'          => $this->type->find($request->type),
        //     'products'      => $this->type->find($request->type)->products
        // ]);
        
        return [
            'products'      => $this->type->find($request->type)->shownProducts->count(),
            'view'  => $view->render(),
        ];
    }

    public function contact()
    {
        // dd("aa");
        $data = Storage::get('config.php');
        if (isset($data)) {
            $data = unserialize($data);
        }
        return view('web.contact', [
            'data' => $data,
        ]);
    }
}