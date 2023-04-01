<div class="home-about bg-info py-5" id="homeAbout">
    <div class="container">
        {{-- <h2 class="text-center text-uppercase font-weight-bold my-3 my-lg-5">
            giới thiệu
        </h2> --}}
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 order-0 order-lg-1 mb-4 mb-lg-0">
                <div class="w-100">
                    <img src="{{ $about->avatar }}" class="w-100">
                </div>
                {{-- <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/{{ $about->embed }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> --}}
            </div>
            <div class="col-lg-6 order-1 order-lg-0 text-center text-lg-left">
                {{-- <div class="fs-25 text-white font-weight-medium text-uppercase mb-4">{{ $about->title }}</div> --}}
                <div class="title d-inline-block text-white mb-3">
                    <div class="fs-25 font-weight-bold text-uppercase">{{ $about->title }}</div>
                    <div class="main-line d-flex mt-2">
                        <hr class="line w-100">
                        <div class="cut fs-25 ml-2">
                            <i class="fas fa-cut"></i>
                        </div>
                    </div>
                </div>
                <div class="text-white mb-4 mb-lg-0">
                    {{ $about->summary }}
                </div>
            </div>
        </div>
    </div>
</div>