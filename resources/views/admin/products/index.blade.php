@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<nav class="navbar navbar-light bg-white shadow">
    <div class="navbar-brand">{{ __('admin/products.lists') }}</div>
    <div class="mr-auto">
        @if (Route::has("$route.create"))
        <a class="btn btn-success" href="{{ route($route . '.create') }}">
            {{ __('admin/table.create') }}
        </a>
        @endif
    </div>
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route("$route.index") }}" role="form">
        <input type="search" class="form-control mr-sm-2" id="search" name="search" required placeholder="{{ __('admin/table.search') }}" aria-label="{{ __('admin/table.search') }}" value="{{ $request->search ?? '' }}">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</nav>
<div class="bg-white div-content my-3 p-3 table-responsive shadow">
    <table id="table-data" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('admin/products.avatar') }}</th>
                {{-- <th scope="col" style="white-space:nowrap;">{{ __('admin/products.product_code') }}</th> --}}
                <th scope="col">{{ __('admin/products.product_name') }}</th>
                {{-- <th scope="col" style="white-space:nowrap;">{{ __('admin/products.unit') }}</th> --}}
                {{-- <th scope="col" style="white-space:nowrap;">{{ __('admin/products.receipt_price') }}</th> --}}
                <th scope="col" style="white-space:nowrap;">{{ __('admin/products.bill_price') }}</th>
                {{-- <th scope="col" style="white-space:nowrap;">{{ __('admin/products.stock') }}</th> --}}
                <th scope="col" style="white-space:nowrap;">{{ __('admin/products.is_show') }}</th>
                <th scope="col" style="white-space:nowrap;">{{ __("admin/products.is_featured") }}</th>
                @if (Route::has($route . '.show'))
                <th scope="col" style="width: 3rem;"></th>
                @endif
                @if (Route::has($route . '.edit'))
                <th scope="col" style="width: 3rem;"></th>
                @endif
                @if (Route::has($route . '.destroy'))
                <th scope="col" style="width: 3rem;"></th>
                @endif
            </tr>
        </thead>
        <tbody id="data">
            @if ($data_table->total() == 0)
            <tr>
                <td colspan="20"><center>{{ __('admin/table.no_data') }}</center></td>
            </tr>
            @endif
            @foreach ($data_table as $index => $data)
            <tr>
                <th scope="row">{{ $data->id }}</th>
                <td><img src="{{ asset($data->avatar ?? 'img/file-image.svg') }}" class="rounded" height="40"></td>
                {{-- <td>{{ $data->product_code }}</td> --}}
                <td>{{ $data->product_name }}</td>
                {{-- <td>{{ $data->unit }}</td> --}}
                {{-- <td>{{ number_format($data->receipt_price) }}</td> --}}
                <td>{{ number_format($data->bill_price) }}</td>
                {{-- <td>{{ $data->stock }}</td> --}}
                <td>{{ $data->is_show ? __('admin/products.show') : __('admin/products.no_show') }}</td>
                <td>
                    @if ($data->is_featured == 1)
                    <i class="fas fa-sun fa-2x text-warning"></i>
                    @endif
                </td>
                @if (Route::has($route . '.show'))
                <td class="px-1">
                    <a href="{{ route($route . '.show', ['product' => $data]) }}" class="btn btn-info" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                @endif
                @if (Route::has($route . '.edit'))
                <td class="px-1">
                    <a href="{{ route($route . '.edit', ['product' => $data]) }}" class="btn btn-primary" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                @endif
                @if (Route::has($route . '.destroy'))
                <td class="px-1">
                    <div data-toggle="modal" data-target="#cfmDel" onclick="$('#formDelete').attr('action', '{{ route($route . '.destroy', ['product' => $data]) }}');" class="btn btn-danger" title="{{ __('admin/table.delete') }}">
                        <i class="fas fa-trash"></i>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        {{ $data_table->links() }}
    </div>
</div>
<!--cfmDel-->
<div class="modal" id="cfmDel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="cfmDel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="" role="form" id="formDelete">
                    @method('DELETE')
                    @csrf
                    <h3>{{ __('admin/table.question_delete') }}</h3><br>
                    <button type="submit" class="btn btn-danger">{{ __('admin/table.delete') }}</button>
                    <button class="btn btn-default" data-dismiss="modal">{{ __('admin/table.cancel') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        $("#search").on("search", function() {
            ($(this).val() == "") ? location.href = "{{ route("$route.index") }}" : $("#frmSearch").submit();
        });
    </script>
@endpush

@push('ready')
@if (session('success'))
toastr["success"]("{{ __('message.' . session('success')) }}");
@endif
@if (session('error'))
toastr["error"]("{{ __('message.' . session('error')) }}");
@endif
@endpush