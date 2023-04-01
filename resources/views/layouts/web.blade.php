<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @stack('redirect')
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
        <title>{{ config('app.name','Thơ Phong Cách Mới') }}</title>
        {{-- Style --}}
        <link rel="stylesheet" href="{{ asset('css/web.css') }}?t={{ now() }}">
        @stack('css')
    </head>
    <body>
        <div id="web">
            {{-- Scroll Button --}}
            <button id="myBtn" class="btn text-body shadow" style="background-color:#ED832E;" title="Go to top"><i class="fas fa-angle-up"></i></button>
            
            @include('shared.navbar')

            @yield('content')

            @include('shared.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/web.js') }}"></script>
        @stack('js')
        
        <script>
            $(function() {
                var btn = $('#myBtn');

                $(window).scroll(function() {
                    if ($(window).scrollTop() < 300) {
                        btn.addClass('d-none');
                    } else {
                        btn.removeClass('d-none');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:0}, 600);
                });
            });

            // Flickity Card Height 
            Flickity.prototype._createResizeClass = function() {
                this.element.classList.add('flickity-resize');
            };

            Flickity.createMethods.push('_createResizeClass');

            var resize = Flickity.prototype.resize;
            Flickity.prototype.resize = function() {
                this.element.classList.remove('flickity-resize');
                resize.call( this );
                this.element.classList.add('flickity-resize');
            };

            // Ajax Carousel
            var carousel = $(".carousel.type");
            $(".nav-item.type").click(function() {
                axios.post("{{ route('axios.type') }}", {
                    type: $(this).data("type"),
                })
                .then(function (response) {
                    // $(".carousel.type").html(response.data);
                    var old_cells = carousel.flickity('getCellElements');
                    var new_cells = $(response.data.view);
                    // carousel.flickity({
                    //     // draggable: response.data.products > 4 ? true : false,
                    //     // prevNextButtons: response.data.products > 4 ? true : false,
                    //     // initialIndex: response.data.products > 4 ? "0" : "1",
                    //     cellAlign: response.data.products > 4 ? "left" : "center",
                    //     // wrapAround: response.data.products > 4 ? true : false,
                    // });
                    carousel.flickity("remove", old_cells );
                    carousel.flickity("append", new_cells );
                    $(".carousel.type").flickity();
                })
                .catch(function (error) {
                    console.log(error);
                });
            });
            
            // Add to Cart

            function sum(obj) {
                return Object.keys(obj).reduce((sum,key)=>sum+parseFloat(obj[key]||0),0);
            }

            function add_cart(id) {
                axios.post('{{ route('add-product') }}', {
                    product_id: id,
                })
                .then(function (response) {
                    // console.log(response);
                    var products = response.data.products.cart;
                    if(sum(products) > 9)
                        $(".notify-badge").text("9+");
                    else if (sum(products) == 0)
                        $(".notify-badge").addClass("d-none");
                    else
                        $(".notify-badge").removeClass("d-none").text(sum(products));
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            // if (screen.width >= 1200) {
            //     $(window).scroll(function() {
            //         if ($(window).scrollTop() < 150) {
            //             $(".navbar").removeClass("bg-white");
            //         } else {
            //             $(".navbar").addClass("bg-white");
            //         }
            //     });
            // }
            // if (screen.width >= 992) {
            //     var waypoint = new Waypoint({
            //         element: document.getElementById('sign'),
            //         handler: function(direction) {
            //             if (direction === "down") {
            //                 $(".navbar").removeClass("mt-lg-4");
            //             } else if (direction === "up") {
            //                 $(".navbar").addClass("mt-lg-4");
            //             }
            //         },
            //         offset: 'bottom-in-view'
            //     })
            // }
        </script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                @if (session('toastr'))
                toastr["{{ session('toastr')['status'] }}"]("{{ session('toastr')['message'] }}");
                @endif
                @if (session('status'))
                    $('#modal1').modal('show');
                @endif
                @stack('ready')
            });
        </script>
        <div class="modal" tabindex="-1" role="dialog" id="modal1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông Báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset("/img/check.png") }}" height="98">
                    <div>
                        <h3 class="text-primary text-uppercase my-3">Đặt hàng thành công!</h3>
                        <div class="my-4">Thông tin phản hồi về đơn hàng của quý khách sẽ được gửi về qua email. Xin cảm ơn. </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>