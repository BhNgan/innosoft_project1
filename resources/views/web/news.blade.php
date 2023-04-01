@extends('layouts.web')
@section('content')

<div class="news">
    <div class="container">
        <div class="bg-center bg-cover" style="background-image: url( {{ asset('img/news.png') }} )">
            <div class="bg-overlay text-center header">
                <h2 class="centered text-uppercase text-white font-weight-bold">{{ $category->category_name ?? "" }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-10 mx-auto">
                @forelse ($contents ?? [] as $content)
                    <div class="card border-0 mt-4 mb-3">
                        <a href="{{ url($menu->alias, [$content->alias]) }}">
                            <div class="row d-flex justify-content-center">
                                <div class="col-5 pr-0 pr-lg-2">
                                    <div class="image d-flex align-items-center justify-content-center">
                                        <img src="{{ $content->avatar }}" class="w-100">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card-body py-3 pl-0">
                                        <h5 class="card-title text-body font-weight-bold">
                                            {{ $content->title }}
                                        </h5>
                                        <div class="card-text">
                                            <div class="d-flex flex-wrap text-muted my-3">
                                                <div>Ngày đăng: {{ date('d-m-Y', strtotime($content->created_at)) }}</div>
                                            </div>
                                            <div class="text-body d-none d-lg-block mt-2">
                                                {{ $content->summary }}
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse
                <div class="row my-4 pb-2">
                    {{ $contents->links('web.paginate') }}
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <h4 class="border-bottom text-uppercase font-weight-bold mt-4 pb-2">tin nổi bật</h4>
                <div class="row">
                    @forelse ($featured_contents ?? [] as $content)
                        <div class="col-lg-3">
                            <div class="number font-weight-bold">
                                {{ $loop->index < 10 ? 0 : "" }}{{ $loop->index +1 }}
                            </div>
                        </div>
                        <div class="col-lg-9 mb-2">
                            <a href="{{ url($menu->alias, [$content->alias]) }}">
                                <div class="card border-0 mt-lg-3 mb-3 mb-lg-0 w-100">
                                    <div class="row">
                                        <div class="col-5 col-lg-12 pr-0 pr-lg-3">
                                            <img src="{{ asset($content->avatar) }}" class="w-100">
                                        </div>
                                        <div class="col-7 col-lg-12">
                                            <div class="card-body p-2">
                                                <h5 class="card-title text-body font-weight-bold mb-0">
                                                    {{ $content->title }}
                                                </h5>
                                                <div class="card-text text-muted my-1">
                                                    {{ \Carbon\Carbon::parse($content->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
                <hr class="line my-4 d-block d-md-none">
            </div> --}}
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="text-uppercase font-weight-bold border-dark my-4">tin nổi bật</h4>
                <div class="row">
                    @forelse ($featured_contents ?? [] as $content)
                    <div class="col-lg-4 mb-3">
                        <a href="{{ url($menu->alias, [$content->alias]) }}">
                            <div class="card border-0 mt-lg-3 mb-3 mb-lg-0 w-100">
                                <div class="row">
                                    <div class="col-5 col-lg-12 pr-0 pr-lg-3">
                                        <img src="{{ asset($content->avatar)}}" class="w-100">
                                    </div>
                                    <div class="col-7 col-lg-12">
                                        <div class="card-body p-2">
                                            <div class="card-title text-body font-weight-bold mb-0">
                                                {{ $content->title }}
                                            </div>
                                            <div class="card-text text-muted my-1">
                                                {{ \Carbon\Carbon::parse($content->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection