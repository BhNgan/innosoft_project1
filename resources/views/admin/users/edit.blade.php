@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route($route . '.update', ['user' => $data]) }}" role="form">
@method('PUT')
@csrf
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __('admin/users.detail') }}</div>
        <div class="mr-auto">
            <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
        </div>
        <button type="submit" class="btn btn-success">{{ __('admin/table.save') }}</button>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('admin/users.name') }} (*)</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="{{ __('admin/users.name') }}" maxlength="191" value="{{ old('name', $data->name) }}">
                </div>
                <div class="form-group">
                    <label for="username">{{ __('admin/users.username') }} (*)</label>
                    <input type="text" class="form-control" name="username" id="username" required placeholder="{{ __('admin/users.username') }}" maxlength="191" value="{{ old('username', $data->username) }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('admin/users.password')  }}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('admin/users.password') }}" maxlength="191">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('admin/users.password_confirmation') }}</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{ __('admin/users.password_confirmation') }}" maxlength="191">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('admin/users.email') }}</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('admin/users.email') }}" maxlength="191" value="{{ old('email', $data->email) }}">
                </div>
                <div class="form-group">
                    <label for="mobile">{{ __('admin/users.mobile') }}</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="{{ __('admin/users.mobile') }}" maxlength="191" value="{{ old('mobile', $data->mobile) }}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('active', $data->active) == 1) checked @endif class="custom-control-input" name="activate" id="activate" onclick="$('#active').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="activate">{{ __('admin/users.activated') }}</label>
                    <input hidden type="text" name="active" id="active" value="{{ old('active', $data->active) }}">
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