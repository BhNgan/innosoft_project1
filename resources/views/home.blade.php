@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                            You are logged in!
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('orders.index') }}">
                        <div class="card card-dash flex-fill bg-primary text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-file-invoice icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Đơn Đặt Hàng</p>
                                        <h3 class="text-white">{{ App\Order::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('contacts.index') }}">
                        <div class="card card-dash flex-fill bg-purple text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-envelope-open icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Mail Liên Hệ</p>
                                        <h3 class="text-white">{{ App\Contact::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('products.index') }}">
                        <div class="card card-dash flex-fill bg-success text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-truck-loading icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Sản Phẩm</p>
                                        <h3 class="text-white">{{ App\Product::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('contents.index') }}">
                        <div class="card card-dash flex-fill bg-brown text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-book icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Bài Viết</p>
                                        <h3 class="text-white">{{ App\Content::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('categories.index') }}">
                        <div class="card card-dash flex-fill bg-orange text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-bookmark icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Danh Mục</p>
                                        <h3 class="text-white">{{ App\Category::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('types.index') }}">
                        <div class="card card-dash flex-fill bg-warning text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-boxes icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Loại Sản Phẩm</p>
                                        <h3 class="text-white">{{ App\Type::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('sponsors.index') }}">
                        <div class="card card-dash flex-fill bg-cyan text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-briefcase icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Đối Tác</p>
                                        <h3 class="text-white">{{ App\Sponsor::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('menus.index') }}">
                        <div class="card card-dash flex-fill bg-dark text-white h-100">
                            <div class="card-body py-3">
                                <div class="row no-gutters">
                                    <div class="col-4 align-self-center text-left">
                                        <i class="fas fa-compass icon"></i>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <p class="text-white mb-1">Điều Hướng</p>
                                        <h3 class="text-white">{{ App\Menu::all()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
