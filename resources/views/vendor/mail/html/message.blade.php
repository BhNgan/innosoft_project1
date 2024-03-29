@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{-- {{ config('app.name') }} --}}
            Thơ Phong Cách Mới
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <p style="color:black;">
                © {{ date('Y') }} Thơ Phong Cách Mới. @lang('All rights reserved.')
                {{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
            </p>
        @endcomponent
    @endslot
@endcomponent
