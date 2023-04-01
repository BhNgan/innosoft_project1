<nav class="navbar navbar-expand-lg navbar-dark p-0 shadow">
    <div class="collapse navbar-collapse align-items-start bg-dark sidebar" id="sidebar">
        <ul class="flex-column nav nav-pills nav-fill w-100">
            {{-- @if (Auth::id() < 1) --}}
            <a class="nav-link {{ $route == 'home' ? 'active' : '' }} mt-2" href="{{ route('admin') }}">
                <i class="fas fa-home"></i>
                <span class="pl-3">Dashboard</span>
            </a>
            {{-- <a class="nav-header">ĐIỀU HƯỚNG</a> --}}
            {{-- <a class="nav-link {{ $route == 'languages' ? 'active' : '' }}" href="{{ route('languages.index') }}">
                <i class="fas fa-language"></i>
                <span class="pl-3">Ngôn ngữ</span>
            </a> --}}
            {{-- @endif --}}
            <a class="nav-header">CƠ BẢN</a>
            <a class="nav-link {{ $route=='orders' ? 'active' : '' }}" href="{{ route('orders.index') }}">
                <i class="fas fa-file-invoice"></i>
                <span class="pl-3">Đơn đặt hàng</span>
            </a>
            <a class="nav-link {{ $route=='contacts' ? 'active' : '' }}" href="{{ route('contacts.index') }}">
                <i class="far fa-envelope-open"></i>
                <span class="pl-3">Liên hệ</span>
            </a>
            <a class="nav-link {{ $route == 'products' ? 'active' : '' }}" href="{{ route('products.index') }}">
                <i class="fas fa-truck-loading"></i>
                <span class="pl-3">Sản phẩm</span>
            </a>
            <a class="nav-link {{ $route == 'contents' ? 'active' : '' }}" href="{{ route('contents.index') }}">
                <i class="fas fa-book"></i>
                <span class="pl-3">Bài viết</span>
            </a>
            <a class="nav-header">DANH MỤC</a>
            <a class="nav-link {{ $route == 'categories' ? 'active' : '' }}" href="{{ route('categories.index') }}">
                <i class="fas fa-bookmark"></i>
                <span class="pl-3">Danh mục</span>
            </a>
            <a class="nav-link {{ $route == 'types' ? 'active' : '' }}" href="{{ route('types.index') }}">
                <i class="fas fa-boxes"></i>
                <span class="pl-3">Loại Sản phẩm</span>
            </a>
            <a class="nav-link {{ $route=='sponsors' ? 'active' : '' }}" href="{{ route('sponsors.index') }}">
                <i class="fas fa-briefcase"></i>
                <span class="pl-3">Đối Tác</span>
            </a>
            <a class="nav-link {{ $route=='carousels' ? 'active' : '' }}" href="{{ route('carousels.index') }}">
                <i class="fas fa-image"></i>
                <span class="pl-3">Carousel</span>
            </a>
            <a class="nav-link {{ $route == 'menus' ? 'active' : '' }}" href="{{ route('menus.index') }}">
                <i class="fas fa-clipboard-list"></i>
                <span class="pl-3">Menu</span>
            </a>
            <a class="nav-header">NHÂN SỰ</a>
            <a class="nav-link {{ $route == 'users' ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span class="pl-3">Người dùng</span>
            </a>
            {{-- {{ route(config('contact.email_user')) }} --}}
            <a class="nav-link {{ $route=='config' ? 'active' : '' }}" href="{{ route('config.index') }}">
                <i class="fas fa-cog"></i>
                <span class="pl-3">Thông tin Website</span>
            </a>
            {{-- <a class="nav-link {{ $route == 'customers' ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <i class="fas fa-user-tie"></i>
                <span class="pl-3">Khách Hàng</span>
            </a>
            <a class="nav-link {{ $route == 'providers' ? 'active' : '' }}" href="{{ route('providers.index') }}">
                <i class="fas fa-truck"></i>
                <span class="pl-3">Nhà cung cấp</span>
            </a> --}}
            {{-- <a class="nav-link {{ $route == 'employees' ? 'active' : '' }}" href="{{ route('employees.index') }}">
                <i class="fas fa-people-carry"></i>
                <span class="pl-3">Nhân viên</span>
            </a> --}}
            {{-- @if (Auth::id() < 2)
            <a class="nav-header">NHÂN SỰ</a>
            <a class="nav-link {{ $route == 'users' ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span class="pl-3">Người dùng</span>
            </a>
            @endif --}}

            <div class="d-lg-none">
                <div class="dropdown">
                    <a id="navbarProfile" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->fullname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarProfile">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</nav>