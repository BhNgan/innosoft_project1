@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route("$route.store") }}" role="form" enctype="multipart/form-data">
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
                    <label for="avatar">{{ __("admin/$route.avatar") }} (*)</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload" name="upload" value="{{ old('upload', $data->avatar ?? "") }}">
                        <label class="custom-file-label" for="upload">{{ old('upload', __("admin/$route.avatar")) }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sponsor_name">{{ __("admin/$route.sponsor_name") }} (*)</label>
                    <input type="text" class="form-control" name="sponsor_name" id="sponsor_name" required placeholder="{{ __("admin/$route.sponsor_name") }}" maxlength="191" value="{{ old('sponsor_name') }}">
                </div>
                <div class="form-group">
                    <label for="url">{{ __("admin/$route.url") }}</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="{{ __("admin/$route.url") }}" maxlength="191" value="{{ old('url') }}">
                </div>
                <div class="form-group">
                    <label for="sort">{{ __("admin/$route.sort") }} (*)</label>
                    <input type="number" class="form-control" name="sort" id="sort" required placeholder="{{ __("admin/$route.sort") }}" maxlength="191" value="{{ old('sort', 0) }}">
                </div>
                <div class="form-group">
                    <label for="target">{{ __("admin/$route.target") }} (*)</label>
                    <select class="form-control" id="target" name="target">
                        <option value="">{{ __("admin/$route.normal") }}</option>
                        <option value="_blank">{{ __("admin/$route.blank") }}</option>
                    </select>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_show', 1) == 1) checked @endif class="custom-control-input" name="show" id="show" onclick="$('#is_show').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="show">{{ __("admin/$route.is_show") }}</label>
                    <input hidden type="text" name="is_show" id="is_show" value="{{ old('is_show', 1) }}">
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

@push('js')
    <script type="text/javascript">
    </script>
@endpush

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
    bsCustomFileInput.init();
    $("#target").val("{{ old('target', $data->target ?? "") }}");
@endpush