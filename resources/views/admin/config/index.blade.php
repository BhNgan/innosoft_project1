@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route("config.change") }}" role="form">
@csrf
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __("admin/$route.detail") }}</div>
        <div class="mr-auto">
            <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
        </div>
        <input hidden type="text" name="previous" id="previous" value="{{ old('previous', url()->previous() == url()->current() ? route($route . '.index') : url()->previous()) }}">
        <button type="submit" class="btn btn-success">{{ __('admin/table.save') }}</button>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-uppercase font-weight-bold pb-3">
                    Thông tin cá nhân Website
                </h5>
                <div class="form-group col-md-11 pl-0">
                    <label for="address">{{ __("admin/$route.address") }}</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="{{ __("admin/$route.address") }}" maxlength="191" value="{{ old('lang', $data['address'] ?? '') }}">
                </div>
                <div class="form-group col-md-11 pl-0">
                    <label for="phone">{{ __("admin/$route.phone") }}</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __("admin/$route.phone") }}" maxlength="191" value="{{ old('lang', $data['phone'] ?? '') }}">
                </div>
                <div class="form-group col-md-11 pl-0">
                    <label for="email">{{ __("admin/$route.email") }}</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __("admin/$route.email") }}" maxlength="191" value="{{ old('lang', $data['email'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="text-uppercase font-weight-bold pb-3">
                    Tài khoản mạng xã hội
                </h5>
                <div class="form-group col-md-11 pl-0">
                    <label for="facebook">{{ __("admin/$route.facebook") }}</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="{{ __("admin/$route.facebook") }}" maxlength="191" value="{{ old('lang', $data['facebook'] ?? '') }}">
                </div>
                <div class="form-group col-md-11 pl-0">
                    <label for="youtube">{{ __("admin/$route.youtube") }}</label>
                    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="{{ __("admin/$route.youtube") }}" maxlength="191" value="{{ old('lang', $data['youtube'] ?? '') }}">
                </div>
                <div class="form-group col-md-11 pl-0">
                    <label for="instagram">{{ __("admin/$route.instagram") }}</label>
                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="{{ __("admin/$route.instagram") }}" maxlength="191" value="{{ old('lang', $data['instagram'] ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
    <script type="text/javascript">
    </script>
@endpush

@push('ready')
@if (session('success'))
toastr["success"]("{{ __('message.' . session('success')) }}");
@endif

@if (count($errors) > 0)
toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
@endif
@endpush
