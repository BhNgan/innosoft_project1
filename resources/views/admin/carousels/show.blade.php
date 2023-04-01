@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<nav class="navbar navbar-light bg-white shadow">
    <div class="navbar-brand">{{ __("admin/$route.detail") }}</div>
    <div class="mr-auto">
        <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
    </div>
</nav>
<div class="bg-white div-content my-3 p-3 shadow">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="field_name">{{ __("admin/$route.field_name") }} (*)</label>
                <input type="text" class="form-control" name="field_name" id="field_name" required placeholder="{{ __("admin/$route.field_name") }}" maxlength="191" value="{{ $data->field_name }}">
            </div>
        </div>
    </div>
</div>
@endsection

