@component('mail::message')
<div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
box-sizing: border-box;font-size: 22px;font-weight: bold;margin-bottom:20px;text-align: center;color:#ED832E;">
    Quý khách đã đặt hàng thành công !
</div>
<div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
box-sizing: border-box;font-size: 19px;font-weight: bold;margin-top: 0;margin-bottom: 8px;text-align: left;color:#ED832E;">
    Thông tin thanh toán:
</div>
<div style="color:#74787e;">
    Họ tên khách hàng: {{ $ordermail->first_name }} {{ $ordermail->last_name }}
</div>
<div style="color:#74787e;">
    Số điện thoại: {{ $ordermail->phone }}
</div>
<div style="color:#74787e;">
    Email: {{ $ordermail->email }}
</div>
<div style="color:#74787e;margin-bottom:20px;">
    Nội dung: {{ $ordermail->content }}
</div>
<div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
box-sizing: border-box;font-size: 19px;font-weight: bold;margin-top: 0;margin-bottom: 8px;text-align: left;color:#ED832E;">
    Địa chỉ giao hàng:
</div>
<div style="color:#74787e;margin-bottom:20px;">
    {{ $ordermail->address }}
</div>
<div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
box-sizing: border-box;font-size: 19px;font-weight: bold;margin-top: 0;text-align: left;color:#ED832E;">
    Chi tiết đơn hàng:
</div>
<hr style="margin:10px 0px;">
<table style="width:100%;">
    <table style="border-collapse:collapse;width: 100%;">
        <tr>
            {{-- <th>Hình ảnh</th> --}}
            <th style="background-color:#ED832E;color:black;border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                Tên sản phẩm
            </th>
            <th style="background-color:#ED832E;color:black;border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                Đơn giá
            </th>
            <th style="background-color:#ED832E;color:black;border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                Số lượng
            </th>
            <th style="background-color:#ED832E;color:black;border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                Thành tiền
            </th>
        </tr>
        @if ($ordermail->products->count()==0)
        @else
            @foreach ($ordermail->products as $product)
            {{-- {{ dd($ordermail->sumProductPrices()) }} --}}
            <tr>
                {{-- <td><img src="{{ asset($product->avatar) }}"></td> --}}
                <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
                    {{ $product->product_name }}
                </td>
                <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                    {{ number_format($product->bill_price) }} đ
                </td>
                <td style="border: 1px solid #dddddd;text-align: center;padding: 8px;white-space:nowrap;">
                    {{ $product->pivot->quantity }}
                </td>
                <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;white-space:nowrap;">
                    {{ number_format($product->pivot->quantity * $product->bill_price) }} đ
                </td>
            </tr>
            @endforeach
        @endif
        <tr>
            <td style="border-top: 1px solid #dddddd;border-bottom:1px solid #dddddd;border-left: 1px solid #dddddd;text-align: left;padding:10px 8px;font-weight:bold;white-space:nowrap;">
                Tổng thanh toán
            </td>
            <td style="border-top: 1px solid #dddddd;border-bottom:1px solid #dddddd;text-align: left;padding:10px 8px;"></td>
            <td style="border-top: 1px solid #dddddd;border-bottom:1px solid #dddddd;border-right: 1px solid #dddddd;text-align: left;padding:10px 8px;"></td>
            <td style="border: 1px solid #dddddd;text-align: left;padding:10px 8px;font-weight:bold;white-space:nowrap;">
                {{ number_format($ordermail->sumProductPrices()) }} đ
            </td>
        </tr>
    </table>
</table>
<div style="color:#ED832E;margin-top:30px;margin-bottom:20px;font-weight:bold;font-size: 19px;">
    Thơ Phong Cách Mới cảm ơn quý khách.
</div>
{{-- <div style="color:#1150A0;margin-top:30px;margin-bottom:20px;font-weight:bold;font-size: 19px;">
    {{ config('app.name') }} cảm ơn quý khách.
</div> --}}
@endcomponent