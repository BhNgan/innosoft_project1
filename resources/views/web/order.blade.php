@extends('layouts.web')
@section('content')

<div class="order">
    <div class="container">
        <div class="py-5">
            <div class="row">
                <div class="col-lg-6 mb-4 h-100">
                    <div class="bg-white pb-2">
                        <h4 class="text-uppercase font-weight-bold border-bottom pb-3 px-2">
                            giỏ hàng (<span id="inCart">{{ Session::get('products')['cart'] ? array_sum(Session::get('products')['cart']) : 0 }}</span>)
                        </h4>
                        <div class="cart-overflow pb-2 px-2">
                            @if (!$products)
                            @else
                                @foreach ($products as $product)
                                {{-- {{ dd($product[1] ) }} --}}
                                <div class="border-bottom py-2">
                                    <a href="{{ url(($product[0]->type()->menuType->menu->alias ?? '') .'/'. $product[0]->alias) }}">
                                        <div class="card border-0 h-100" style="width:100%;">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="image d-flex align-items-center justify-content-center border">
                                                        <img href="/product" src="{{ asset($product[0]->avatar)}}" alt="Card image cap" 
                                                        class="card-img-top">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="card-body p-0">
                                                        <div class="card-title text-justify text-warning font-weight-bold">
                                                            {{ $product[0]->product_name }}
                                                        </div> 
                                                    </div>
                                                    <div class="card-text text-muted">
                                                        <div class="card-text">
                                                            <div>Đơn giá: {{ number_format($product[0]->bill_price) }} đ</div>
                                                        </div>
                                                        <div class="card-text my-1">
                                                            <div>Số lượng: {{ $product[1] }}</div>
                                                        </div>
                                                        <div class="card-text">
                                                            <div>Tổng cộng: {{ number_format($product[1] * $product[0]->bill_price) }} đ</div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="bg-white mb-3 px-2">
                        <div class="mt-3 p-2">
                            <div class="d-flex justify-content-between">
                                <div>Giỏ hàng</div>
                                <div class="font-weight-bold">{{ number_format($sum) }}</div>
                            </div>
                            <div class="d-flex justify-content-between border-bottom my-3 pb-3">
                                <div>Phí giao hàng</div>
                                <div class="font-weight-bold">Liên Hệ</div>
                            </div>
                            <div class="d-flex justify-content-between my-2">
                                <div>Tổng Cộng</div>
                                <div class="font-weight-bold">{{ number_format($sum) }} VND</div>
                                <input type="hidden" name="total" value="{{ $sum ?? 0 }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('order') }}" method="post">
                        @csrf
                        <h4 class="text-uppercase text-center text-md-left font-weight-bold mb-4">thông tin khách hàng</h4>
                        <div class="row mb-4">
                            <div class="col-6 pr-1 mb-3">
                                <input type="text" name="first_name" class="form-control" type="text" placeholder="Họ" required>
                                @if ($errors->has('first_name'))
                                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-6 pl-1 mb-3">
                                <input type="text" name="last_name" class="form-control" type="text" placeholder="Tên" required>
                                @if ($errors->has('last_name'))
                                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="phone" class="form-control" type="text" placeholder="Số điện thoại" required>
                                @if ($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="email" class="form-control" type="text" placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <h4 class="text-uppercase text-center text-md-left font-weight-bold mb-4">thông tin giao hàng</h4>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" name="address" class="form-control" type="text" placeholder="Địa chỉ" required>
                                @if ($errors->has('address'))
                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <textarea type="text" name="content" class="form-control my-md-2" id="exampleFormControlTextarea1" required placeholder="Ghi chú" rows="8" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-5 d-flex ml-auto">
                                <button type="submit" class="btn btn-warning btn-send btn-block font-weight-bold text-uppercase mt-3">Đặt Hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection