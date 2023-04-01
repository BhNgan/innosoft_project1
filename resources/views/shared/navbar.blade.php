<nav class="navbar navbar-dark navbar-expand-lg navbar-top border-bottom border-secondary d-none d-lg-flex">
    <div class="container">
        <div>
            <small class="text-white border-right border-secondary pr-2">
                <i class="fas fa-phone-alt mr-2"></i>
                <span class="font-weight-medium">
                    Điện thoại/Zalo: {{ $data['phone'] ?? '' }}
                </span>  
            </small>
            <small class="text-white border-right border-secondary ml-3 pr-2">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <span class="font-weight-medium ml-1">
                    Điạ chỉ: {{ $data['address'] ?? '' }}
                </span>
            </small>
        </div>
        <div class="d-flex">
            <a href="//{{ $data['facebook'] ?? '' }}">
                <div class="text-white mr-4 pr-2">
                    <i class="fab fa-facebook-f"></i>
                </div>
            </a>
            <a href="//{{ $data['youtube'] ?? '' }}">
                <div class="text-white mr-4 pr-2">
                    <i class="fab fa-youtube"></i>
                </div>
            </a>
            <a href="//{{ $data['instagram'] ?? '' }}">
                <div class="text-white mr-4 pr-2">
                    <i class="fab fa-instagram"></i>
                </div>
            </a>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-xl navbar-light sticky-top bg-dark py-xl-0">
    <div class="container py-xl-0">
        <a class="navbar-brand py-0" href="/">
            <h5 class="border border-white text-white my-3 p-2">Thơ Phong Cách Mới</h5>
            {{-- <img src="{{ asset('img/logo.png') }}" class="logo"> --}}
        </a>
        {{-- <div class="search rounded-circle bg-primary text-white d-inline-block d-xl-none ml-auto mr-3">
            <div class="search-icon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="search-bar d-none">
                <form>
                    <input type="text" class="border-0 text-white" placeholder="Tìm kiếm">
                    <div class="search-close text-white"><i class="fas fa-times"></i></div>
                </form>
            </div>
        </div> --}}
        <a class="cart-icon d-inline-block d-xl-none text-white ml-auto mr-3" href="{{ url($cart->alias) }}">
            <div class="font-weight-bold text-uppercase shopping-card-nav">
                <i class="fas fa-shopping-basket text-white"></i>
                <span class="notify-badge rounded-circle text-white d-none"></span>
            </div>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="x-close text-white"><i class="fas fa-times"></i></span>
            {{-- <span class="triangle d-none"></span> --}}
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-xl-end fs-15 w-100">
                @foreach ($menus as $loopMenu)
                    @if (count($loopMenu->children) == 0)
                    <li class="nav-item mr-1 ml-xl-3 px-2 {{ $menu->id == $loopMenu->id ? "active" : "" }}">
                        <a class="nav-link text-uppercase font-weight-bold" href="{{ url($loopMenu->alias) }}">{{ $loopMenu->menu_name }}<span class="sr-only">(current)</span></a>
                    </li>
                    @else
                    <li class="nav-item dropdown mr-1 ml-xl-3 px-2 {{ $menu->parent ? $menu->parent->id : "" == $loopMenu->id ? "active" : "" }}">
                        <a class="nav-link dropdown-toggle font-weight-bold text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                            {{ $loopMenu->menu_name }}
                        </a>
                        <div class="dropdown-menu border-0" aria-labelledby="navbarDropdown">
                            @foreach ($loopMenu->children as $children)
                            <a class="dropdown-item font-weight-bold text-uppercase" href="{{ url($children->alias) }}">{{ $children->menu_name }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <a class="cart-icon d-none d-xl-inline-block text-white mx-3" href="{{ url($cart->alias) }}">
            <div class="font-weight-bold text-uppercase shopping-card-nav">
                <i class="fas fa-shopping-basket text-white"></i>
                <span class="notify-badge rounded-circle text-white d-none"></span>
            </div>
        </a>
        {{-- <div class="search rounded-circle bg-primary text-white d-none d-xl-inline-block ml-auto mr-3">
            <div class="search-icon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="search-bar d-none">
                <form>
                    <input type="text" class="border-0 text-white" placeholder="Tìm kiếm">
                    <div class="search-close text-white"><i class="fas fa-times"></i></div>
                </form>
            </div>
        </div> --}}
    </div>
</nav>

@push('js')
    <script>
        $('.navbar-toggler').click(function() {
            if ($('.triangle').hasClass('d-none')){
                $('.triangle').removeClass('d-none');
            } else {
                $('.triangle').addClass('d-none');
            }
        });

        // Search button
        $(".search-icon").click(function() {
            $(".search-bar").removeClass("d-none");
        });

        $(".search-close").click(function() {
            $(".search-bar").addClass("d-none");
            $(".search-bar input").val("");
        });
    </script>
@endpush

@push('ready')
    $('[data-toggle="popover"]').popover();
    @if( Session::has('products') && array_sum(Session::get('products')['cart']) != 0 )
    $(".notify-badge").removeClass("d-none").text("{{ array_sum(Session::get('products')['cart']) > 9 ? "9+" : array_sum(Session::get('products')['cart']) }}");
    @endif
@endpush