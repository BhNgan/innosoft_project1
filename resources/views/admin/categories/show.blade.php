@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <a class="btn btn-default navbar-btn" href="{{ url('admin/'.$route) }}">{{ trans('action.back') }}</a>
    </div>
</nav>
<div class="col-md-6">
    <h2 class="text-uppercase">{{ trans('table.information') }}</h2>
    <div class="form-group">
        <label for="table" class="control-label">{{ trans($route . '.table') }} (*)</label>
        <input type="text" class="form-control" name="table" id="table" required placeholder="Bảng" maxlength="50" value="{{ $row->table }}">
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="note">{{ trans($route . '.note') }}</label>
        <textarea class="form-control" name="note" id="note" rows="5" value="{{ $row->note }}"></textarea>
    </div>
</div>
@endsection

