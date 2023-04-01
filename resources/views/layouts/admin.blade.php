<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'INNOSOFT') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body>
        <div id="app">
            @include('shared.header')

            <main class="container-fluid">
                <div class="row">
                    <div class="col-0 col-md-0 col-lg-3 col-xl-2 p-0">
                        @include('shared.sidebar')
                    </div>
                    <div class="col-12 col-md-12 col-lg-9 col-xl-10 px-3 pt-3 main-content">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('js')
        <script type="text/javascript">
            $(document).ready(function() {
                @if (session('toastr'))
                toastr["{{ session('toastr')['status'] }}"]("{{ session('toastr')['message'] }}");
                @endif
                @stack('ready')
            });
        </script>
    </body>
</html>
