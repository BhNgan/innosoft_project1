@extends('layouts.web')
@section('content')
<div class="product-categories">
    <div class="container">
        <div class="bg-center bg-cover" style="background-image: url( {{ asset('img/slider1.jpg') }} )">
            <div class="bg-overlay text-center header">
                <h2 class="centered text-uppercase text-white font-weight-bold">{{ $type->type_name ?? "" }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        @if (count($featured_products) == 0)
        @else
        <h2 class="text-center text-uppercase font-weight-bold my-5">
            sản phẩm nổi bật
        </h2>
        <div class="carousel type mb-5 slide" data-type="multi" data-interval="3000" data-flickity='{ "groupCells": "100%",
                    "pageDots": true,
                    "cellAlign": "left",
                    "wrapAround": true,
                    "prevNextButtons": true,
                    "draggable": true,
                    "autoPlay": false,
                    "freeScroll": true,
                    "friction": 0.8,
                    "selectedAttraction": 0.2} '>
                @forelse ($featured_products ?? [] as $featured)
                    <div class="carousel-cell col-9 col-md-6 col-lg-4 col-xl-3 mx-3 mx-md-0 py-2">
                        @include('web.card.product-featured')
                    </div>
                @empty
                @endforelse
        </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-0 my-5">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-6 col-xl-4 mb-3">
                            @include('web.card.product')
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $products->links('web.paginate') }}
                </div>
            </div>
            <div class="col-lg-3 order-0 order-lg-1 mb-5 mt-lg-5">
                <div class="bg-light border rounded p-3">
                    <h5 class="text-uppercase font-weight-bold">
                        danh mục dịch vụ
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
                <div>
                    <h5 class="text-uppercase font-weight-bold my-4">
                        sản phẩm nổi bật
                    </h5>
                    @forelse ($featured_products ?? [] as $featured)
                        <a href="{{ $featured->type() ? url($featured->type()->menuType->menu->alias, [$featured->alias]) : '#'}}">
                            <div class="card border-0 mb-4">
                                <div class="row">
                                    <div class="col-5 pr-0">
                                        <div class="image d-flex align-items-center justify-content-center">
                                            <img href="#" src="{{ asset($featured->avatar) }}" alt="Card image cap" 
                                            class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="p-2">
                                            <div class="text-justify font-weight-bold">
                                                {{ $featured->product_name }}
                                            </div> 
                                        </div>
                                        <div class="font-weight-medium text-body px-2 pb-2">
                                            {{ number_format($featured->bill_price) }} đ
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    @empty
                    @endforelse
                </div>
                @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // // Add to Cart

    // function sum(obj) {
    //     return Object.keys(obj).reduce((sum,key)=>sum+parseFloat(obj[key]||0),0);
    // }

    // $(".btn-cart").on("click", function () {
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
</script>
@endpush