@extends('layouts.admin')

@section('title', 'INNOSOFT')

@section('content')
<form method="POST" action="{{ route($route . '.store') }}" role="form" enctype="multipart/form-data">
@method('POST')
@csrf
    <nav class="navbar navbar-light bg-white shadow">
        <div class="navbar-brand">{{ __('admin/products.detail') }}</div>
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
                    <label for="upload">{{ __('admin/products.avatar') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload" name="upload" value="{{ old('upload') }}">
                        <label class="custom-file-label" for="upload">Chọn ảnh tải lên</label>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="product_code">{{ __('admin/products.product_code') }} (*)</label>
                    <input type="text" class="form-control" name="product_code" id="product_code" placeholder="{{ __('admin/products.product_code') }}" maxlength="191" value="{{ old('product_code') }}" required>
                </div> --}}
                <div class="form-group">
                    <label for="product_name">{{ __('admin/products.product_name') }} (*)</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="{{ __('admin/products.product_name') }}" maxlength="191" value="{{ old('product_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="alias">{{ __('admin/products.alias') }} (*)</label>
                    <input type="text" class="form-control" name="alias" id="alias" placeholder="{{ __('admin/products.alias') }}" maxlength="191" value="{{ old('alias') }}">
                </div>
                <div class="form-group types">
                    <label for="type_id">{{ __('admin/products.type_id') }}</label>
                    <select name="type_ids[]" id="type_id" class="type-id form-control" multiple="multiple">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label for="origin">{{ __('admin/products.origin') }}</label>
                    <input type="text" class="form-control" name="origin" id="origin" placeholder="{{ __('admin/products.origin') }}" maxlength="191" value="{{ old('origin') }}">
                </div> --}}
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_show', 1) == 1) checked @endif class="custom-control-input" name="showing" id="showing" onclick="$('#is_show').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="showing">{{ __('admin/types.is_show') }}</label>
                    <input hidden type="text" name="is_show" id="is_show" value="{{ old('is_show', 1) }}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_featured', 0) == 1) checked @endif class="custom-control-input" name="featured" id="featured" onclick="$('#is_featured').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="featured">{{ __("admin/types.is_featured") }}</label>
                    <input hidden type="text" name="is_featured" id="is_featured" value="{{ old('is_featured', 0) }}">
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="form-group">
                    <label for="receipt_price">{{ __('admin/products.receipt_price') }}</label>
                    <input type="number" class="form-control" name="receipt_price" id="receipt_price" required placeholder="{{ __('admin/products.receipt_price') }}" maxlength="191" value="{{ old('receipt_price', 0) }}">
                </div> --}}
                <div class="form-group">
                    <label for="bill_price">{{ __('admin/products.bill_price') }}</label>
                    <input type="number" class="form-control" name="bill_price" id="bill_price" placeholder="{{ __('admin/products.bill_price') }}" maxlength="191" value="{{ old('bill_price', 0) }}">
                </div>
                <div hidden class="form-group">
                    <label for="stock">{{ __('admin/products.stock') }}</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="{{ __('admin/products.stock') }}" maxlength="191" value="{{ old('stock', 0) }}" min="0">
                </div>
                <div class="form-group">
                    <label for="description">{{ __('admin/products.description') }}</label>
                    <textarea class="form-control" name="description" id="description" placeholder="{{ __('admin/products.description') }}" value="{{ old('description') }}" rows="5"></textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="warranty">{{ __('admin/products.warranty') }}</label>
                    <input type="text" class="form-control" name="warranty" id="warranty" placeholder="{{ __('admin/products.warranty') }}" maxlength="191" value="{{ old('warranty') }}">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="unit">{{ __('admin/products.unit') }}</label>
                    <input type="text" class="form-control" name="unit" id="unit" placeholder="{{ __('admin/products.unit') }}" maxlength="191" value="{{ old('unit') }}">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="detail">{{ __('admin/products.detail') }}</label>
                    <input type="text" class="form-control" name="detail" id="detail" placeholder="{{ __('admin/products.detail') }}" maxlength="191" value="{{ old('detail') }}">
                </div> --}}
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    <label for="description">{{ __('admin/products.description') }}</label>
                    <textarea class="form-control" name="description" id="description" placeholder="{{ __('admin/products.description') }}" value="{{ old('description') }}" rows="5"></textarea>
                </div>
            </div> --}}
            <div class="col-md-12 mt-4">
                <div class="form-group">
                    <label for="note">{{ __('admin/products.note') }}</label>
                    <textarea class="form-control" name="note" id="note" placeholder="{{ __('admin/products.note') }}" maxlength="191" value="{{ old('note') }}" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
    <script type="text/javascript">
        function str_to_alias(id, idResult) {
            var title, slug;
            title = $('#' + id).val();
            slug = title.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            $('#' + idResult).val(slug);
        }

        $("#product_name").keyup(function () {
            str_to_alias("product_name", "alias");
        });
        
        $(".types").on("click",".add-type", function () {
            $(this).closest(".type").clone().appendTo($(this).closest(".type").parent());
        })
        
    </script>
@endpush

@push('ready')
    @if (session('success'))
    toastr["success"]("{{ __('message.' . session('success')) }}");
    @endif
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
    bsCustomFileInput.init();
    $(".type-id").select2();
@endpush