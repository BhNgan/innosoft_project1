@extends('layouts.web')
@section('content')

<!-- Slideshow -->
@include('web.home.slideshow')

<!-- About -->
@include('web.home.about')

<!-- Benefit -->
{{-- @include('web.home.benefit') --}}

<!-- Types -->
@include('web.home.types')

<!-- News -->
@include('web.home.news')

<!-- Products -->
{{-- @include('web.home.products') --}}

<!-- Featured -->
{{-- @include('web.home.featured') --}}

<!-- Succeed -->
{{-- @include('web.home.succeed') --}}

<!-- Sponsors -->
{{-- @include('web.home.sponsors') --}}

@endsection

@push('js')
    <script>
        // if (screen.width >= 992) {
        //     new WOW().init();
        // }
    </script>
@endpush
