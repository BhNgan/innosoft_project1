<div class="home-products py-3 py-lg-5">
    <div class="container">
        {{-- <h2 class="text-center text-uppercase font-weight-bold my-5">
            loại sản phẩm
        </h2> --}}
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-0">
                @if(count($types->first()->products) > 0)
                <div class="carousel type mb-3 slide" data-type="multi" data-interval="3000" data-flickity='{ "groupCells": "100%",
                            "pageDots": true,
                            "cellAlign": "left",
                            {{-- "cellAlign": {{ (count($products) > 4) ? "left" : "center" }}, --}}
                            "wrapAround": true,
                            {{-- "wrapAround": {{ (count($products) > 4) ? "true" : "false" }}, --}}
                            {{-- "contain": true, --}}
                            {{-- "initialIndex": "0", --}}
                            "prevNextButtons": true,
                            "draggable": true,
                            {{-- "draggable": true, --}}
                            "autoPlay": false,
                            "freeScroll": true,
                            "friction": 0.8,
                            "selectedAttraction": 0.2} '>
                        @forelse ($types->first()->shownProducts ?? [] as $product)
                            <div class="carousel-cell col-9 col-md-6 col-lg-4 mx-3 mx-md-0 py-2">
                                @include('web.card.product-carousel')
                            </div>
                        @empty
                        @endforelse
                </div>
                @endif
            </div>
            <div class="col-lg-3 order-0 order-lg-1 mt-2 mb-4 mb-lg-0">
                <div class="bg-light border shadow rounded p-3">
                    <h4 class="text-uppercase font-weight-bold border-bottom pl-2 pb-2 ml-1 my-3">
                        loại sản phẩm
                    </h4>
                    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                        @forelse ($types as $type)
                            {{-- {{ dd($type) }} --}}
                            @if ($type->products->count() != 0)
                                <li class="nav-item type mb-3" data-type="{{ $type->id }}">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{$type->type_name}}</a>
                                </li>
                            @else
                            @endif
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    // // Ajax Carousel
    // var carousel = $(".carousel.type");
    // $(".nav-item.type").click(function() {
    //     axios.post("{{ route('axios.type') }}", {
    //         type: $(this).data("type"),
    //     })
    //     .then(function (response) {
    //         // $(".carousel.type").html(response.data);
    //         var old_cells = carousel.flickity('getCellElements')
    //         var new_cells = $(response.data)
    //         carousel.flickity("remove", old_cells );
    //         carousel.flickity("append", new_cells );
    //         $(".carousel.type").flickity();
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // });
    
    // // Add to Cart

    // function sum(obj) {
    //     return Object.keys(obj).reduce((sum,key)=>sum+parseFloat(obj[key]||0),0);
    // }

    // function add_cart(id) {
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