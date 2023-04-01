@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<nav class="navbar navbar-light bg-white shadow">
    <div class="navbar-brand">{{ __("admin/$route.lists") }}</div>
    <div class="mr-auto">
        @if (Route::has("$route.create"))
        <a class="btn btn-success" href="{{ route("$route.create") }}">
            {{ __('admin/table.create') }}
        </a>
        @endif
    </div>
</nav>
<div class="bg-white div-content my-3 p-3 table-responsive shadow">
    <table id="table-data" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __("admin/$route.lang") }}</th>
                <th scope="col">{{ __("admin/$route.language") }}</th>
                <th scope="col">{{ __("admin/$route.is_default") }}</th>
                <th scope="col">{{ __("admin/$route.note") }}</th>
                @if (Route::has("$route.show"))
                <th scope="col" style="width: 3rem;"></th>
                @endif
                @if (Route::has("$route.edit"))
                <th scope="col" style="width: 3rem;"></th>
                @endif
                @if (Route::has("$route.destroy"))
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
                <td>{{ $data->lang }}</td>
                <td>{{ $data->language }}</td>
                <td>{{ $data->is_show == 1 ? "Có" : "Không " }}</td>
                <td>{{ $data->note }}</td>
                @if (Route::has("$route.show"))
                <td class="px-1">
                    <a href="{{ route($route . '.show', ['language' => $data]) }}" class="btn btn-info" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                @endif
                @if (Route::has("$route.edit"))
                <td class="px-1">
                    <a href="{{ route($route . '.edit', ['language' => $data]) }}" class="btn btn-primary" title="{{ __('admin/table.update') }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                @endif
                @if (Route::has("$route.destroy"))
                <td class="px-1">
                    <div data-toggle="modal" data-target="#cfmDel" onclick="$('#formDelete').attr('action', '{{ route('$route.destroy', ['language' => $data]) }}');" class="btn btn-danger" title="{{ __('admin/table.delete') }}">
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
@if (Route::has("$route.destroy"))
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
@endif
@endsection

@push('ready')
@if (session('success'))
toastr["success"]("{{ __('message.' . session('success')) }}");
@endif
@if (session('error'))
toastr["error"]("{{ __('message.' . session('error')) }}");
@endif
@endpush