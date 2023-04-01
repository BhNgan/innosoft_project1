@section('footer')
<div class="footer text-white">
    <div class="container">
        <div class="row pt-4 pb-0 pb-lg-4">
            <div class="col-lg-4 mb-4 mb-lg-0 pt-lg-3">
                <div class="row">
                    <div class="col-12">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <a class="navbar-brand py-0" href="/">
                                    <h5 class="border border-white text-white my-3 p-2">Thơ Phong Cách Mới</h5>
                                </a>
                                {{-- <div class="logo d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('img/logo.png') }}" class="w-100">
                                </div> --}}
                            </li>
                            <li class="font-weight-medium pb-0 mb-0">
                                <span>
                                    {{ $about->note }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pt-lg-3">
                <div class="row">
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <ul class="list-unstyled mb-0">
                            <div class="text-uppercase font-weight-bold mb-3 mb-lg-4">Liên Kết</div>
                            @foreach ($menus as $loopMenu)
                                @if (count($loopMenu->children) == 0)
                                <li class="font-weight-medium mb-2">
                                    <a href="{{ url($loopMenu->alias) }}">{{ $loopMenu->menu_name }}<span class="sr-only">(current)</span></a>
                                </li>
                                @else
                                @endif
                            @endforeach
                            {{-- <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Sản phẩm
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Thông tin kỹ thuật
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Tin tức
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Tuyển dụng
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Liên hệ
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <ul class="list-unstyled mb-0">
                            <div class="text-uppercase font-weight-bold mb-3 mb-lg-4">Liên Hệ</div>
                            <li class="mb-2">
                                <i class="fas fa-envelope mr-2"></i>
                                <span class="font-weight-medium">
                                    Email: {{ $data['email'] ?? '' }}
                                </span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-phone-alt mr-2"></i>
                                <span class="font-weight-medium">
                                    Điện thoại: {{ $data['phone'] ?? '' }}
                                </span>                         
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span class="font-weight-medium ml-1">
                                    Điạ chỉ: {{ $data['address'] ?? '' }}
                                </span>                         
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <ul class="list-unstyled mb-0">
                            <div class="text-uppercase font-weight-bold mb-3 mb-lg-4">theo dõi chúng tôi</div>
                            <li class="font-weight-medium mb-2">
                                <a href="//{{ $data['facebook'] ?? '' }}">
                                    Facebook
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="//{{ $data['instagram'] ?? '' }}">
                                    Instagram
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="//{{ $data['youtube'] ?? '' }}">
                                    Youtube
                                </a>
                            </li>
                            <li class="font-weight-medium mb-2">
                                <a href="#">
                                    Zalo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="copyright font-weight-medium py-2 mb-0" align="center">
        Bản quyền thuộc về Thơ Phong Cách Mới © 2019. Thiết kế bởi Innosoft
    </div>
</div>