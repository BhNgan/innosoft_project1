@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route("$route.store") }}" role="form">
@method('POST')
@csrf
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __("admin/$route.detail") }}</div>
        <div class="mr-auto">
            <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
        </div>
        <button type="submit" class="btn btn-success">{{ __('admin/table.save') }}</button>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lang">{{ __("admin/$route.lang") }} (*)</label>
                    <input type="text" class="form-control" name="lang" id="lang" required placeholder="{{ __("admin/$route.lang") }}" maxlength="191" value="{{ old('lang') }}">
                </div>
                <div class="form-group">
                    <label for="language">{{ __("admin/$route.language") }} (*)</label>
                    <input type="text" class="form-control" name="language" id="language" required placeholder="{{ __("admin/$route.language") }}" maxlength="191" value="{{ old('language') }}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_default', 1) == 1) checked @endif class="custom-control-input" name="show" id="show" onclick="$('#is_default').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="show">{{ __("admin/$route.is_default") }}</label>
                    <input hidden type="text" name="is_default" id="is_default" value="{{ old('is_default', 1) }}">
                </div>
                <div class="form-group">
                    <label for="note">{{ __("admin/$route.note") }}</label>
                    <textarea class="form-control" id="note" name="note" rows="3">{{ old('note') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
@endpush