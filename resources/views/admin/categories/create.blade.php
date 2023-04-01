@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route($route . '.store') }}" role="form" enctype="multipart/form-data">
@method('POST')
@csrf
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __('admin/categories.detail') }}</div>
        <div class="mr-auto">
            <a class="btn btn-outline-dark my-0" href="{{ url()->previous() == url()->current() ? route($route . '.index') : url()->previous() }}">{{ __('admin/table.back') }}</a>
        </div>
        <button type="submit" class="btn btn-success">{{ __('admin/table.save') }}</button>
        <button type="submit" name="continue" value="1" class="btn btn-success ml-3">{{ __('admin/table.save-continue') }}</button>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_id">{{ __("admin/$route.parent_id") }} (*)</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">{{ __("admin/$route.parent_id") }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_name">{{ __("admin/$route.category_name") }} (*)</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" required placeholder="{{ __("admin/$route.category_name") }}" maxlength="191" value="{{ old('category_name') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="upload">{{ __("admin/$route.avatar") }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload" name="upload" value="{{ old('upload') }}">
                        <label class="custom-file-label" for="upload">{{ __("admin/$route.avatar") }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sort">{{ __("admin/$route.sort") }} (*)</label>
                    <input type="number" class="form-control" name="sort" id="sort" required placeholder="{{ __("admin/$route.sort") }}" maxlength="191" value="{{ old('sort', 0) }}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_show', 1) == 1) checked @endif class="custom-control-input" name="show" id="show" onclick="$('#is_show').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="show">{{ __("admin/$route.is_show") }}</label>
                    <input hidden type="text" name="is_show" id="is_show" value="{{ old('is_show', 1) }}">
                </div>
                {{-- <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_recruit', 0) == 1) checked @endif class="custom-control-input" name="recruit" id="recruit" onclick="$('#is_recruit').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="recruit">{{ __("admin/$route.is_recruit") }}</label>
                    <input hidden type="text" name="is_recruit" id="is_recruit" value="{{ old('is_recruit', 0) }}">
                </div> --}}
                {{-- <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_tech', 0) == 1) checked @endif class="custom-control-input" name="recruit" id="recruit" onclick="$('#is_tech').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="recruit">{{ __("admin/$route.is_tech") }}</label>
                    <input hidden type="text" name="is_tech" id="is_tech" value="{{ old('is_tech', 0) }}">
                </div> --}}
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">{{ __('admin/categories.description') }}</label>
                    <textarea class="form-control" name="description" id="description" placeholder="{{ __('admin/categories.description') }}" value="{{ old('description') }}" rows="5"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="note">{{ __('admin/categories.note') }}</label>
                    <textarea class="form-control" name="note" id="note" placeholder="{{ __('admin/categories.note') }}" maxlength="191" value="{{ old('note') }}" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('ready')
    @if (session('success'))
    toastr["success"]("{{ __('message.' . session('success')) }}");
    @endif
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
    bsCustomFileInput.init();
    $("#parent_id").val({{ old('parent_id', 0) }});
@endpush