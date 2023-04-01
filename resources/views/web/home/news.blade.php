<div class="home-news" style="background-color:#3A2624;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-4 text-center text-lg-left">
                <div class="title d-inline-block text-white mb-3">
                    <div class="fs-25 font-weight-bold text-uppercase">Tin Tức</div>
                    <div class="fs-14 d-block mt-2">Cập nhật tin tức mới nhất</div>
                    <div class="main-line d-flex mt-2">
                        <hr class="line w-100">
                        <div class="cut fs-25 ml-2">
                            <i class="fas fa-cut"></i>
                        </div>
                    </div>
                </div>
                <div class="text-white mb-3 mb-lg-0">
                    Cập nhật tin mới nhất trong ngày, tin về salon làm tóc, các tin liên quan về làm tóc.
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-outline-light text-uppercase mr-auto" onclick="location.href = '{{ url($type->menuType->menu->alias ?? '#') }}';">Xem Thêm</button>
                </div>
            </div>
            @foreach ($contents as $content)
            <div class="col-lg-4 mt-4 mt-lg-0">
                <a href="{{ url("$menu_category->alias/$content->alias") }}">
                    <div class="card news border-0 h-100">
                        <div class="img-vert d-flex align-items-center justify-content-center">
                            <img src="{{ asset($content->avatar)}}" class="img-news card-img-top rounded-0 h-100">
                        </div>
                        <div class="card-body vert p-3 mt-1">
                            <div class="card-title text-justify font-weight-bold text-warning mb-0">
                                {{ $content->title }}
                            </div> 
                            <div class="text-secondary text-justify">
                                <div class="my-1">
                                    <i class="far fa-clock mr-1"></i>
                                    <small class="font-italic">{{ date('d-m-Y', strtotime($content->created_at)) }}</small>
                                </div>
                                <div class="card-text font-weight-normal">
                                    {{ $content->summary }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{-- @foreach ($contents as $content)
                @if ($loop->first)
                <div class="col-lg-6 mb-3">
                    <a href="{{ url("$menu_category->alias/$content->alias") }}">
                        <div class="card news border-0 h-100">
                            <div class="img-vert d-flex align-items-center justify-content-center">
                                <img src="{{ asset($content->avatar)}}" class="img-news card-img-top rounded-0 h-100">
                            </div>
                            <div class="card-body vert p-0 mt-1">
                                <div class="card-title text-justify font-weight-bold mb-0">
                                    {{ $content->title }}
                                </div> 
                                <div class="text-secondary text-justify">
                                    <div class="my-1">
                                        <small class="font-italic">{{ date('d-m-Y', strtotime($content->created_at)) }}</small>
                                    </div>
                                    <div class="card-text font-weight-normal">
                                        {{ $content->summary }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                @endif
            @endforeach
            <div class="col-lg-6">
                <div class="row">
                    @forelse ($contents ?? [] as $content)
                        @if (!$loop->first)
                        <div class="col-12">
                            <a href="{{ url("$menu_category->alias/$content->alias") }}">
                                <div class="card border-0 mb-3" style="width:100%;">
                                    <div class="news d-flex mb-2">
                                        <div class="col-4 px-0">
                                            <div class="d-flex align-items-start justify-content-center h-100">
                                                <img src="{{ asset($content->avatar)}}" class="img-news w-100">
                                            </div>
                                        </div>
                                        <div class="col-8 pr-0">
                                            <div class="card-body p-0">
                                                <div class="card-title text-justify font-weight-bold mb-0">
                                                    {{ $content->title }}
                                                </div>
                                                <div class="text-secondary text-justify">
                                                    <small class="font-italic">{{ date('d-m-Y', strtotime($content->created_at)) }}</small>
                                                    <div class="card-text font-weight-normal">
                                                        {{ $content->summary }}
                                                    </div>
                                                </div>
                                            </div>   
                                        </div> 
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                    @empty
                        
                    @endforelse
                </div>
            </div> --}}
        </div>
    </div>
</div>