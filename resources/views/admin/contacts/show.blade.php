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
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="customer_name">{{ __("admin/$route.customer_name") }}</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" disabled placeholder="{{ __("admin/$route.customer_name") }}" maxlength="191" value="{{ $data->customer_name }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id">{{ __("admin/$route.id") }}</label>
                            <input type="text" class="form-control" name="id" id="id" disabled placeholder="{{ __("admin/$route.id") }}" maxlength="191" value="{{ $data->id }}">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">{{ __("admin/$route.email") }}</label>
                    <input type="text" class="form-control" name="email" id="email" disabled placeholder="{{ __("admin/$route.email") }}" maxlength="191" value="{{ $data->email }}">
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
        </div>
    </div>
@endsection

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
@endpush