<div class="card card-product bg-dark shadow border-0 rounded-0 w-100">
    <a href="{{ $featured->type() ? url($featured->type()->menuType->menu->alias, [$featured->alias]) : '#'}}">
        <div class="card-product-main h-100">
            <div class="image d-flex align-items-center justify-content-center w-100 mb-3">
                <img class="w-100" src="{{ asset($featured->avatar) }}">
            </div>
            <div class="card-body text-center text-body pt-0">
                <h5 class="card-title text-white font-weight-bold">{{ $featured->featured_name }}</h5>
                <div class="text-center text-white">{{ ($featured->note)}}</div>
                {{-- <div class="font-weight-medium text-danger">{{ number_format($product->bill_price) }} đ</div> --}}
            </div>
            {{-- <div class="bg-overlay-2">
                <div class="p-3 text-white">
                    {{ ($product->note)}}
                </div>
            </div> --}}
        </div>
    </a>
    <div class="row d-flex mt-auto">
        {{-- <div class="col-12 col-md-6 mb-3 mb-md-0 pr-3 pr-md-0">
            <a href="{{ $product->type() ? url($product->type()->menuType->menu->alias, [$product->alias]) : '#'}}">
                <div class="btn btn-primary btn-block font-weight-medium rounded-0 px-0">Chi tiết</div>
            </a>
        </div> --}}
        <div class="col-7 mx-auto pb-3">
            <div class="btn btn-outline-light btn-block btn-cart font-weight-medium rounded-0 px-0" onclick="add_cart({{ $featured->id }})" style="cursor:pointer">
                <i class="fas fa-shopping-basket"></i> 
            </div>
        </div>
    </div>
</div>
{{-- <div class="card card-product bg-light shadow border-0 rounded-0 w-100">
    <div class="card-product-main h-100">
        <div class="image d-flex align-items-center justify-content-center w-100 p-3">
            <img class="card-img-top" src="{{ asset($featured->avatar) }}">
        </div>
        <div class="card-body text-center text-body pt-0">
            <h5 class="card-title font-weight-bold"> {{ $featured->product_name }}</h5>
            <div class="font-weight-medium text-danger">{{ number_format($featured->bill_price) }} đ</div>
        </div>
        <div class="bg-overlay-2">
            <div class="p-3 text-white">
                {{ $featured->note }}
            </div>
        </div>
    </div>
    <div class="row d-flex mt-auto">
        <div class="col-12 col-md-6 mb-0 pr-3 pr-md-0">
            <a href="{{ $featured->type() ? url($featured->type()->menuType->menu->alias, [$featured->alias]) : '#'}}">
                <div class="btn btn-primary btn-block font-weight-medium rounded-0 px-0">Chi tiết</div>
            </a>
        </div>
        <div class="col-12 col-md-6 pl-md-0">
            <div class="btn btn-danger btn-block btn-cart font-weight-medium rounded-0 px-0 ml-auto" onclick="add_cart({{ $featured->id }})" style="cursor:pointer">
                <i class="fas fa-shopping-cart text-white"></i> 
            </div>
        </div>
    </div>
</div> --}}