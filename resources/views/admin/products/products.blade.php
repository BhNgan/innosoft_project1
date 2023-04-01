<table class="table justify-content-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('admin\products.product_code') }}</th>
            <th scope="col">{{ __('admin\products.product_name') }}</th>
            <th scope="col">{{ __('admin\products.stock') }}</th>
            <th scope="col">{{ __('admin\products.bill_price') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr data-id="{{ $product->id }}" data-price="{{ $product->bill_price }}" data-product-name="{{ $product->product_name }}" data-stock="{{ $product->stock }}">
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->stock }}</td>
            <td class="bill-price">{{ number_format($product->bill_price) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links('admin.products.paginate') }}