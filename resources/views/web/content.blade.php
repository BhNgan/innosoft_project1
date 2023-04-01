@extends('layouts.web')
@section('content')

<div class="content">
    {{-- <div class="container">
        <div class="row mx-0">
            <div class="col-12 px-0">
                <img src="{{ asset($content->avatar)}}" class="w-100">
            </div>
        </div>
    </div> --}}
    <div class="container py-3">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color:unset">
                    <li class="breadcrumb-item">
                        <a href="{{ url($menu->alias) }}"><i class="fas fa-long-arrow-alt-left mr-2"></i>Quay lại</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row mx-0 mb-3">
                    <div class="col-12 px-0">
                        <img src="{{ asset($content->avatar)}}" class="w-100">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="font-weight-bold">{{ $content->title }}</h2>
                        <h4 class="text-secondary my-3 py-2">{{ \Carbon\Carbon::parse($content->created_at)->diffForHumans() }}</h4>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="text-justify text-body">
                            {!! $content->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h4 class="border-bottom text-uppercase font-weight-bold mt-4 mt-lg-0 pb-2">tin tức liên quan</h4>
                <div class="row mt-3">
                    @foreach ($contents as $content)
                    <div class="col-12 mb-3">
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
                    {{-- @forelse ($featured_contents ?? [] as $content)
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
                        
                    @endforelse --}}
                </div>
                {{-- <hr class="line my-4 d-block d-md-none"> --}}
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <h4 class="text-uppercase font-weight-bold border-dark my-4">tin tức liên quan</h4>
                <div class="row">
                    @foreach ($contents as $content)
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
        </div> --}}
    </div>
</div>

@endsection