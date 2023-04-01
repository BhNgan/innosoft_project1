@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<nav class="navbar navbar-light bg-white shadow">
    <div class="navbar-brand">{{ __('admin/categories.lists') }}</div>
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
                <th scope="col">{{ __('admin/categories.avatar') }}</th>
                <th scope="col">{{ __('admin/categories.category_name') }}</th>
                <th scope="col">{{ __('admin/categories.parent_id') }}</th>
                <th scope="col">{{ __('admin/categories.is_show') }}</th>
                <th scope="col">{{ __('admin/categories.note') }}</th>
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
                <td>
                    <img src="{{ $data->avatar ? asset($data->avatar) : "" }}" height="40">
                </td>
                <td>{{ $data->category_name }}</td>
                <td>{{ $data->parent->category_name ?? "" }}</td>
                <td>{{ $data->is_show ? __('admin/categories.show') : __('admin/categories.no_show') }}</td>
                <td>{{ $data->note }}</td>
                @if (Route::has($route . '.show'))
                <td class="px-1">
                    <a href="{{ route($route . '.show', ['category' => $data]) }}" class="btn btn-info" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                @endif
                @if (Route::has($route . '.edit'))
                <td class="px-1">
                    <a href="{{ route($route . '.edit', ['category' => $data]) }}" class="btn btn-primary" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                @endif
                @if (Route::has($route . '.destroy'))
                <td class="px-1">
                    <div data-toggle="modal" data-target="#cfmDel" onclick="$('#formDelete').attr('action', '{{ route($route . '.destroy', ['category' => $data]) }}');" class="btn btn-danger" title="{{ __('admin/table.delete') }}">
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