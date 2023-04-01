@extends('layouts.web')
@section('content')

<div class="product">
    <div class="container">
        <div class="row mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url($menu->alias, [$type->alias]) }}">{{ $type->type_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bold mb-2">{{ $product->product_name }}</h2>
                <h5 class="border-bottom pb-3">Loại sản phẩm : {{ $type->type_name }}</h5>
            </div>
        </div>
        <div class="row mb-md-4">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Flickity HTML init -->
                        <div class="carousel carousel-main" data-flickity='{ "groupCells": "100%",
                                    "prevNextButtons": false,
                                    "pageDots": false,
                                    "wrapAround": true}'>
                            <div class="carousel-cell d-flex border align-items-center justify-content-center m-2">
                                <img href="#" src="{{ asset($product->avatar)}}" alt="Card image cap" 
                                class="card-img-top">
                            </div>
                            @isset($product->productImages)
                                @foreach ($product->productImages as $image)
                                <div class="carousel-cell border d-flex align-items-center justify-content-center m-2">
                                    <img href="#" src="{{ asset($image->avatar)}}" alt="Card image cap" 
                                    class="card-img-top">
                                </div>
                                @endforeach
                            @endisset
                        </div>
                        {{-- @isset($product->productImages) --}}
                        <div class="carousel carousel-nav p-3"
                            data-flickity='{  "wrapAround": true, 
                                            "asNavFor": ".carousel-main", 
                                            "contain": true,
                                            "draggable": ">2",
                                            "freeScroll": false,
                                            "pageDots": false }'>
                                <div class="carousel-cell border d-flex align-items-center justify-content-center m-2">
                                    <img href="#" src="{{ asset($product->avatar)}}" alt="Card image cap" 
                                    class="card-img-top">
                                </div>
                                {{-- @foreach ($product->productImages as $image)
                                <div class="carousel-cell shadow d-flex align-items-center justify-content-center m-2">
                                    <img href="#" src="{{ asset($image->avatar)}}" alt="Card image cap" 
                                    class="card-img-top">
                                </div>
                                @endforeach --}}
                            {{-- @for($i=0; $i<10; $i++)
                            <div class="carousel-cell shadow d-flex align-items-center justify-content-center m-2">
                                <img href="#" src="{{ asset('img/test/'.(($i%5)+1).'.png')}}" alt="Card image cap" 
                                class="card-img-top">
                            </div>
                            @endfor --}}
                        </div>
                        {{-- @endisset --}}
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h2 class="font-weight-bold text-danger my-4">
                                {{ number_format($product->bill_price) }} VNĐ
                            </h2>
                            <div class="font-weight-medium my-3">
                                {{ $product->note }}
                            </div>
                            <div class="mb-3">
                                <div class="d-flex flex-wrap border-top border-bottom py-4">
                                    <div class="input-group mr-4 mb-3 mb-lg-0">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-dark btn-minus border-secondary rounded-0" type="button"><i class="fas fa-minus"></i></button>
                                        </div>
                                        <input type="text" class="form-control text-center border-secondary count" maxlength="3" value="1" name="qty">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-dark btn-plus border-secondary rounded-0" type="button"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger font-weight-medium rounded-0 mb-3 mb-lg-0" onclick="add_cart_2({{ $product->id }})">
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="font-weight-medium mr-4">Chia sẻ</div>
                                    <div class="d-flex mt-4 my-md-4">
                                        <a href="#">
                                            <div class="icon border btn btn-outline-primary border-dark text-body mr-4">
                                                <i class="fab fa-facebook-f w-100"></i>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon border btn btn-outline-primary border-dark text-body mr-4">
                                                <i class="fab fa-youtube w-100"></i>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon border btn btn-outline-primary border-dark text-body mr-4">
                                                <i class="fab fa-instagram w-100"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h4 class="text-uppercase font-weight-bold my-3">Mô tả sản phẩm</h4>
                        <div class="text-secondary text-justify mt-3">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <h4 class="text-uppercase font-weight-bold border-dark my-4">sản phẩm cùng loại</h4>
                        <div class="row">
                            {{-- {{ dd($products) }} --}}
                            @foreach ($products as $product)
                            <div class="col-lg-4 mb-3">
                                @include('web.card.product')
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 my-4 my-lg-0">
                <div class="bg-light border rounded p-3">
                    <h5 class="text-uppercase font-weight-bold">
                        danh mục sản phẩm
                    </h5>
                    @forelse ($types ?? [] as $type)
                    <div class="d-flex border-top py-2">
                        <a href="{{ $type->menu() ? url( $type->menu()->alias) : "#" }}" class="font-weight-medium">
                            {{ $type->type_name }} 
                        </a>
                        <span class="ml-auto">{{ $type->products()->count() }}</span>
                    </div>
                    @empty
                    @endforelse
                </div>
                {{-- @if (count($featured_products) == 0)
                @else
                    <h5 class="text-uppercase font-weight-bold mt-5 mb-4">
                        sản phẩm nổi bật
                    </h5>
                    @forelse ($featured_products ?? [] as $featured)
                        <a href="{{ $product->type() ? url($product->type()->menuType->menu->alias, [$featured->alias]) : '#'}}">
                            <div class="card border-0 mb-4">
                                <div class="row">
                                    <div class="col-5 pr-0">
                                        <div class="image d-flex align-items-center justify-content-center">
                                            <img href="/product" src="{{ asset($featured->avatar) }}" alt="Card image cap" 
                                            class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="px-2 pt-2">
                                            <div class="text-justify font-weight-bold">
                                                {{ $featured->product_name }}
                                            </div> 
                                        </div>
                                        <div class="font-weight-medium text-body p-2">
                                            {{ number_format($product->bill_price) }} đ
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    @empty
                        
                    @endforelse
                @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // function sum(obj) {
    //     return Object.keys(obj).reduce((sum,key)=>sum+parseFloat(obj[key]||0),0);
    // }

    // $(".btn-add-to-cart").on("click", function () {
    //     var id = $(this).attr("data-id")
    //     axios.post('{{ route('add-product') }}', {
    //         product_id: id,
    //     })
    //     .then(function (response) {
    //         console.log(response);
    //         var products = response.data.products.cart;
    //         if(sum(products) > 9)
    //             $(".notify-badge").text("9+");
    //         else if (sum(products) == 0)
    //             $(".notify-badge").addClass("d-none");
    //         else
    //             $(".notify-badge").removeClass("d-none").text(sum(products));
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // })
    
    // $("#addtocart").on("click", function () {
    //     var id = {{ $product->id }};
    //     var quantity = $(".count").val();
    //     axios.post('{{ route('add-product') }}', {
    //         product_id: id,
    //         quantity: quantity,
    //     })
    //     .then(function (response) {
    //         console.log(response);
    //         var products = response.data.products.cart;
    //         if(sum(products) > 9)
    //             $(".notify-badge").text("9+");
    //         else if (sum(products) == 0)
    //             $(".notify-badge").addClass("d-none");
    //         else
    //             $(".notify-badge").removeClass("d-none").text(sum(products));
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // })

    function add_cart_2(id) {
        var quantity = $(".count").val();
        axios.post('{{ route('add-product') }}', {
            product_id: id,
            quantity: quantity,
        })
        .then(function (response) {
            // console.log(response);
            var products = response.data.products.cart;
            if(sum(products) > 9)
                $(".notify-badge").text("9+");
            else if (sum(products) == 0)
                $(".notify-badge").addClass("d-none");
            else
                $(".notify-badge").removeClass("d-none").text(sum(products));
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    $(document).on('click','.btn-plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 ).change();
    });

    $('.btn-minus').on('click',function(){
        if ( $('.count').val() > 0)
        $('.count').val(parseInt($('.count').val()) - 1 ).change();
        // if ($('.count').val() == 0) {
        //     $('.count').val(1);
        // }
    });
</script>
@endpush