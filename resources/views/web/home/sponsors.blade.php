<div class="container">
    <div class="sponsors bg-light">
            @if(count($sponsors) > 0)
            {{-- <div class="carousel slide modal-flick" data-type="multi" data-interval="3000" data-flickity='{
                "cellAlign": "center",
                "pageDots": false,
                "wrapAround": {{ (count($sponsors) > 5) ? "true" : "false" }},
                "cellAlign": "{{ (count($sponsors) > 5) ? "left" : "center" }}",
                "contain": true,
                "initialIndex": "{{ (count($sponsors) > 5) ? "0" : "1" }}",
                "prevNextButtons": {{ (count($sponsors) > 5) ? "true" : "false" }},
                "draggable": ">2",
                "freeScroll": false,
                "friction": 0.8,
                "selectedAttraction": 0.2} '> --}}
                <div class="row d-flex justify-content-center">
                    @foreach ($sponsors as $sponsor)
                    {{-- col-12 col-sm-4 col-lg-2  --}}
                    <div class="col-4 col-md-2">
                        <div class="img-slide d-flex align-items-center justify-content-center px-2 w-100">
                            <a href="//{{ $sponsor->url }}" target="{{ $sponsor->target }}">
                                <img src="{{ asset($sponsor->avatar)}}" class="w-100">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            {{-- </div> --}}
            @endif
            {{-- <div class="carousel slide modal-flick"data-type="multi" data-interval="3000" data-flickity='{
                "cellAlign": "center",
                "pageDots": false,
                "wrapAround": "true",
                "cellAlign": "center",
                "contain": true,
                "initialIndex": 1,
                "prevNextButtons": false,
                "draggable": ">2",
                "autoPlay": true,
                "freeScroll": false,
                "friction": 0.8,
                "selectedAttraction": 0.2} '>
                @for ($i = 1; $i < 7; $i++)
                    <div class="img-slide bg-white d-flex align-items-center justify-content-center mx-2 py-3 px-4">
                        <a href="#" target="#">
                            <img src="{{ asset('img/sponsors/'.(($i%5)+1).'.png')}}" class="w-100">
                        </a>
                    </div>
                @endfor
            </div> --}}
    </div>
</div>