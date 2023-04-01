<div class="home-types">
    <div class="container">
        <div class="d-flex">
            <h2 class="title text-uppercase font-weight-bold d-inline-block mx-auto mt-5 pb-4 pt-5">
                dịch vụ của chúng tôi
                <div class="main-line mt-3">
                    <hr class="line">
                    <div class="cut">
                        <i class="fas fa-cut"></i>
                    </div>
                </div>
            </h2>
        </div>
    </div>
    @foreach ($types as $index => $type)
        @if(count($type->products) > 0)
            <div class="service container pb-5" style="{{ $loop->even ? 'background-color: #253E41' : '' }}" >
                <div class="d-flex pt-4">
                    <div class="title-box d-inline-block mx-auto">
                        <h2 class="title bg-dark text-white text-uppercase p-3">
                            {{ $type->type_name }}
                        </h2>
                        <hr class="line">
                    </div>
                </div>
                <div class="row py-3 px-2 mt-5">
                    @foreach ($type->products as $product)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            @include('web.card.product')
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-light border border-dark text-uppercase" onclick="location.href = '{{ url($type->menuType->menu->alias ?? '#') }}';">Xem Thêm</button>
                </div>
            </div>
        @else
        @endif
    @endforeach
    {{-- <div class="types bg-light my-5">
        <div class="row">
            @if (count($types) > 0)
                <div class="col-md-4 d-none d-md-inline-block">
                    <div class="d-flex justify-content-md-center align-items-md-center text-center px-2 h-100 w-100">
                        <h4 class="text-uppercase font-weight-bold text-dark">
                            Chúng tôi cung cấp
                        </h4>
                    </div>
                </div>
            @foreach ($types as $type)
                @if ($loop->first)
                <div class="col-md-8">
                    <a href="{{ $type->menu() ? url( $type->menu()->alias) : "#" }}" class="types-overlay d-flex justify-content-md-center align-items-md-center w-100">
                        <img src="{{ asset($type->avatar)}}" class="w-100">
                        <div class="bg-overlay h-100 w-100">
                            <h2 class="bottom-left text-white">{{ $type->type_name }}</h2>
                        </div>
                    </a>
                </div>
                @else
                @endif
            @endforeach
            @endif
        </div>
        <div class="row">
            @foreach ($types as $type)
            @if (!$loop->first)
                <div class="col-md-4 mt-4">
                    <a href="{{ $type->menu() ? url( $type->menu()->alias) : "#" }}" class="types-overlay d-flex justify-content-md-center align-items-md-center h-100 w-100">
                        <img src="{{ asset($type->avatar)}}" class="h-100 w-100">
                        <div class="bg-overlay h-100 w-100">
                            <h2 class="bottom-left text-white">{{ $type->type_name }}</h2>
                        </div>
                    </a>
                </div>
            @else
            @endif
            @endforeach
        </div>
    </div> --}}
</div>