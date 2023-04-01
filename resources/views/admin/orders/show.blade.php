@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __("admin/$route.detail") }} (ID: #{{ $data->id }})</div>
        <div class="mr-auto">
            <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
        </div>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-lg-5 mt-3">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">{{ __("admin/$route.first_name") }}</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" disabled placeholder="{{ __("admin/$route.first_name") }}" maxlength="191" value="{{  $data->first_name }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">{{ __("admin/$route.last_name") }}</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" disabled placeholder="{{ __("admin/$route.last_name") }}" maxlength="191" value="{{ $data->last_name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">{{ __("admin/$route.email") }}</label>
                    <input type="text" class="form-control" name="email" id="email" disabled placeholder="{{ __("admin/$route.email") }}" maxlength="191" value="{{ $data->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">{{ __("admin/$route.phone") }}</label>
                    <input type="text" class="form-control" name="phone" id="phone" disabled placeholder="{{ __("admin/$route.phone") }}" maxlength="191" value="{{ $data->phone }}">
                </div>
                <div class="form-group">
                    <label for="address">{{ __("admin/$route.address") }}</label>
                    <input type="text" class="form-control" name="address" id="address" disabled placeholder="{{ __("admin/$route.address") }}" maxlength="191" value="{{ $data->address }}">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="created_at">{{ __("admin/$route.created_at_date") }}</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" disabled maxlength="191" value="{{ $data->created_at->format('d.m.Y') }}"></input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="created_at">{{ __("admin/$route.created_at_time") }}</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" disabled maxlength="191" value="{{ $data->created_at->format('H:i:s') }}"></input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">{{ __("admin/$route.content") }}</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ $data->content }}</textarea>
                </div>
            </div>
            <div class="col-lg-7">
                <h5 class="text-uppercase font-weight-bold pb-3 px-2">
                    Thông tin giỏ hàng
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col" class="text-nowrap">Thành Tiền</th>
                                <th scope="col" class="text-nowrap">Số Lượng</th>
                                <th scope="col" class="text-nowrap">Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ( count($data->products) > 0)
                            @foreach ($data->products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                {{-- {{ dd($product->pivot) }} --}}
                                <td>{{ number_format($product->pivot->bill_price) }} đ</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td class="text-nowrap">{{ number_format($product->pivot->quantity * $product->pivot->bill_price) }} đ</td>
                            </tr>
                            @endforeach
                            @else
                            @endif
                            <tr>
                                <th scope="col" class="borderless-right">Tổng thanh toán</th>
                                <th scope="col" class="borderless-left borderless-right"></th>
                                <th scope="col" class="borderless-left"></th>
                                <th scope="col" class="text-nowrap">{{ number_format($data->sum) }} đ</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
@endpush