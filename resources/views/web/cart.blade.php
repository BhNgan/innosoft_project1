@extends('layouts.web')
@section('content')
    {{-- {{ dd(count($data)) }} --}}
    @if (isset(Session::get('products')['cart']))
    <div class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <div class="bg-white">
                        <a href="/">
                            <h5 class="text-uppercase text-warning font-weight-bold my-4">
                                <i class="fas fa-long-arrow-alt-left text-warning mr-2"></i>Quay Lại
                                {{-- giỏ hàng (<span id="inCart">{{ Session::get('products')['cart'] ? array_sum(Session::get('products')['cart']) : 0 }}</span>) --}}
                            </h5>
                        </a>
                        <div class="table-responsive">
                            <table class="table" id="tblProducts">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase align-top border-top-0 pl-0">Hình Ảnh</th>
                                        <th class="text-uppercase align-top border-top-0">Tên Sản Phẩm</th>
                                        <th class="text-uppercase align-top border-top-0">số lượng</th>
                                        <th class="text-uppercase align-top border-top-0">đơn giá</th>
                                        <th class="text-uppercase align-top border-top-0">thành tiền</th>
                                        <th class="text-uppercase align-top border-top-0">xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @for($i=1; $i<5; $i++)
                                        <tr data-id="{{ $i }}">
                                            <th class="pl-0">
                                                <div class="image d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('img/test/'.(($i%5)+1).'.png') }}" alt="Card image cap" 
                                                    class="card-img-top">
                                                </div>
                                            </th>
                                            <td class="font-weight-bold align-middle w-25">
                                                {{$i}}
                                            </td>
                                            <td class="align-middle"> 
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-dark btn-minus btn-sm" type="button"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                    <input type="text" class="form-control text-center border-secondary border-right-0 qty" value="{{ $i+500 }}" name="qty"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-dark btn-plus btn-sm" type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="price" data-value="50000">50000</div>
                                            </td>
                                            <td class="font-weight-bold align-middle">
                                                <div class="subtot"></div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn border-0 text-body" id="removeBtn">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor --}}
                                    {{-- != null --}}
                                    @if ( count($products) > 0)

                                    @foreach ($products as $product)
                                    <tr data-id="{{ $product[0]->id }}">
                                        <th>
                                            <div class="image d-flex align-items-center justify-content-center">
                                                <img src="{{ asset($product[0]->avatar)}}" alt="Card image cap" 
                                                class="card-img-top">
                                            </div>
                                        </th>
                                        <td class="font-weight-bold align-middle w-25">
                                            <a class=" text-warning " href="{{ $product[0]->type() ? url($product[0]->type()->menuType->menu->alias, [$product[0]->alias]) : '#' }}">
                                                {{ $product[0]->product_name }}
                                            </a>
                                        </td>
                                        <td class="align-middle"> 
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-dark btn-minus btn-sm border-secondary" type="button"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <input type="text" class="form-control text-center border-secondary border-right-0 qty" value="{{ $product[1] }}" name="qty"/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-dark btn-plus btn-sm border-secondary" type="button"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="price" data-value="{{ $product[0]->bill_price }}">{{ number_format($product[0]->bill_price) }}</div>
                                        </td>
                                        <td class="font-weight-bold align-middle">
                                            <div class="subtot"></div>
                                        </td>
                                        <td class="align-middle">
                                            {{-- <button class="btn border-0 text-body">
                                                <i class="fas fa-times"></i>
                                            </button> --}}
                                            <button type="button" class="btn btn-danger del-prod" data-toggle="modal" data-target="#myModal">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr><td colspan="10" class="font-weight-bold align-middle"> Giỏ hàng rỗng </td></tr>  
                                    @endif
                                </tbody>
                            </table>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold">Thông Báo</h5>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div>
                                                <div class="font-weight-bold my-4">
                                                    Bạn có muốn loại bỏ sản phẩm này ra khỏi giỏ hàng không ?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                {{-- id="removeBtn" --}}
                                            <button type="button" id="YES" class="btn btn-primary mr-3 ml-auto px-4" onclick="removeRow()" data-dismiss="modal">Có</button>
                                            <button type="button" class="btn btn-danger ml-3 mr-auto px-4" data-dismiss="modal">Không</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex my-5">
                            <div class="ml-auto">
                                <div class="text-right text-uppercase font-weight-bold">Tổng Cộng</div>
                                <div class="text-right font-weight-bold text-warning">
                                    <div class="grdtot d-inline-block mr-1"></div><span>VNĐ</span>
                                </div>
                                <a href="{{ url('thanh-toan') }}">
                                    <button class="btn btn-warning text-uppercase font-weight-bold px-3 mt-4">
                                        Thanh Toán
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <div class="bg-white">
                        <a href="/">
                            <h5 class="text-uppercase font-weight-bold my-4">
                                Quay Lại
                                {{-- giỏ hàng (<span id="inCart">{{ Session::get('products')['cart'] ? array_sum(Session::get('products')['cart']) : 0 }}</span>) --}}
                            </h5>
                        </a>
                        <div class="table-responsive">
                            <table class="table" id="tblProducts">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase align-top border-top-0 pl-0">Hình Ảnh</th>
                                        <th class="text-uppercase align-top border-top-0">Tên Sản Phẩm</th>
                                        <th class="text-uppercase align-top border-top-0">số lượng</th>
                                        <th class="text-uppercase align-top border-top-0">đơn giá</th>
                                        <th class="text-uppercase align-top border-top-0">thành tiền</th>
                                        <th class="text-uppercase align-top border-top-0">xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="10" class="font-weight-bold align-middle"> Giỏ hàng rỗng </td></tr>  
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex my-5">
                            <div class="ml-auto">
                                <div class="text-right text-uppercase font-weight-bold">Tổng Cộng</div>
                                <div class="text-right font-weight-bold text-warning">
                                    <div class="grdtot d-inline-block mr-1"></div><span>0 VNĐ</span>
                                </div>
                                <a href="{{ url('thanh-toan') }}">
                                    <button class="btn btn-warning text-uppercase font-weight-bold px-3 mt-4">
                                        Thanh Toán
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('js')
<script>
    function sum(obj) {
        return Object.keys(obj).reduce((sum,key)=>sum+parseFloat(obj[key]||0),0);
    }
        
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    
    // Button Number
    $(".btn-minus").on("click", function(){
        var row = $(this).closest("tr");
        oldVal = row.find("input.qty").val();
        row.find("input.qty").val( Number(oldVal)-1 ).change();
        var new_qty = row.find("input.qty").val();
        if(new_qty < 1)
        $(this).closest("tr").remove();
    })

    $(".btn-plus").on("click", function(){
        var row = $(this).closest("tr");
        oldVal = row.find("input.qty").val();
        row.find("input.qty").val( Number(oldVal)+1 ).change();
    })
    
    // Remove Button
    var delrow;

    $(".del-prod").on("click", function(){
        delrow = $(this).closest("tr");
        // console.log(delrow.html());
    });

    function removeRow() {
        // console.log(delrow.html());
        delrow.find(".qty").val(0).change();
        delrow.remove();
        updateTotal();
    }

    // function delrow(row) {
    //     row = $(".table tbody");
    //     $(row).closest("tr").find(".qty").val(0).change();
    //     $(row).closest("tr").remove();
    //     updateTotal();
    // }

    // $(".table tbody").on("click", ".removeBtn", function(){
    //     $(this).closest("tr").find(".qty").val(0).change();
    //     $(this).closest("tr").remove();
    //     updateTotal();
    // });

    // -------- //
    $(".qty").on("change", function () {
        var row = $(this).closest('tr');
        var quantity = $(this).val();
        axios.post('{{ route('add-product') }}', {
            product_id: row.attr("data-id"),
            quantity: quantity,
        })
        .then(function (response) {
            console.log(response);
            var products = response.data.products.cart;
            if(sum(products) > 9)
                $(".notify-badge").text("9+");
            else if(sum(products) == 0){
                $(".notify-badge").addClass("d-none");
                $("#inCart").text(sum(products));
            }
            else
                $(".notify-badge, #inCart").removeClass("d-none").text(sum(products));
        })
        .catch(function (error) {
            console.log(error);
        });
    })

    // Sub Total
    $(function () {
        $(".price, .subtot, .grdtot").prop("readonly", true);
        var $tblrows = $("#tblProducts tbody tr");

        $tblrows.each(function (index) {
            var $tblrow = $(this);

            $tblrow.find(".qty").on("change keyup", function () {

                var qty = $tblrow.find("[name=qty]").val();
                var price = Number($tblrow.find(".price").attr("data-value"));
                var subTotal = parseInt(qty, 10) * parseFloat(price);

                if (!isNaN(subTotal)) {

                    $tblrow.find(".subtot").text(formatNumber(subTotal));
                    $tblrow.find(".subtot").attr("data-value", subTotal);
                    var grandTotal = 0;
                    
                    $(".subtot").each(function () {
                        var stval = parseFloat($(this).attr("data-value"));
                        grandTotal += isNaN(stval) ? 0 : stval;
                    });

                    $(".grdtot").text(formatNumber(grandTotal));
                }
            });
        });
    });

    // Update Total
    function updateTotal()
    {   
        $(".price, .subtot, .grdtot").prop("readonly", true);

        var $tblrows = $("#tblProducts tbody tr");
        var grandTotal = 0;

        $tblrows.each(function (index) {
            var $tblrow = $(this);

            var qty = $tblrow.find("[name=qty]").val();
            var price = Number($tblrow.find(".price").attr("data-value"));
            var subTotal = parseInt(qty, 10) * parseFloat(price);
            subTotal = isNaN(subTotal) ? 0 : subTotal;
            grandTotal += subTotal;
        });
        $(".grdtot").text(formatNumber(grandTotal));
    }

</script>
@endpush
@push('ready')
    $(".qty").change();
@endpush