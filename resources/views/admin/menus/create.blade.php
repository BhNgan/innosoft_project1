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
                    <label for="parent_id">{{ __("admin/$route.parent_id") }} (*)</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">{{ __("admin/$route.parent") }}</option>
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu_name">{{ __("admin/$route.menu_name") }} (*)</label>
                    <input type="text" class="form-control" name="menu_name" id="menu_name" required placeholder="{{ __("admin/$route.menu_name") }}" maxlength="191" value="{{ old('menu_name') }}">
                </div>
                <div class="form-group">
                    <label for="alias">{{ __("admin/$route.alias") }} (*)</label>
                    <input type="text" class="form-control" name="alias" id="alias" required placeholder="{{ __("admin/$route.alias") }}" maxlength="191" value="{{ old('alias') }}">
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
                <div class="form-group">
                    <label for="note">{{ __("admin/$route.note") }}</label>
                    <textarea class="form-control" id="note" name="note" rows="3">{{ old('note') }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">{{ __("admin/$route.type") }} (*)</label>
                    <select class="form-control" id="type" name="type">
                        <option value="null">{{ __("admin/$route.null") }}</option>
                        <option value="url">{{ __("admin/$route.url") }}</option>
                        <option value="home">{{ __("admin/$route.home") }}</option>
                        <option value="about">{{ __("admin/$route.about") }}</option>
                        <option value="category">{{ __("admin/$route.category") }}</option>
                        <option value="content">{{ __("admin/$route.content") }}</option>
                        <option value="type">{{ __("admin/$route.home_type") }}</option>
                        <option value="product">{{ __("admin/$route.product") }}</option>
                        <option value="cart">{{ __("admin/$route.cart") }}</option>
                        <option value="payment">{{ __("admin/$route.payment") }}</option>
                        <option value="contact">{{ __("admin/$route.contact") }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="target">{{ __("admin/$route.target") }} (*)</label>
                    <select class="form-control" id="target" name="target">
                        <option value="">{{ __("admin/$route.normal") }}</option>
                        <option value="_blank">{{ __("admin/$route.blank") }}</option>
                    </select>
                </div>
                <div class="form-group type-group homeGroup categoryGroup">
                    <label for="category">{{ __("admin/$route.home_category") }} (*)</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group type-group homeGroup categoryGroup">
                    <label for="banner">{{ __("admin/$route.home_category") }} banner (*)</label>
                    <select class="form-control" id="banner" name="banner">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group type-group homeGroup">
                    <label for="carousel">{{ __("admin/$route.home_category") }} carousel (*)</label>
                    <select class="form-control" id="carousel" name="carousel">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group type-group aboutGroup contentGroup">
                    <label for="about">{{ __("admin/$route.about") }} (*)</label>
                    <select class="form-control" id="content" name="content_id">
                        @foreach ($contents as $content)
                        <option value="{{ $content->id }}">{{ $content->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group type-group typeGroup">
                    <label for="type_id">{{ __("admin/$route.home_type") }} (*)</label>
                    <select class="form-control" id="type_id" name="type_id">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group type-group productGroup">
                    <label for="product_id">{{ __("admin/$route.product") }} (*)</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
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

        $("#menu_name").keyup(function () {
            str_to_alias("menu_name", "alias");
        });

        $(".type-group").hide();

        $("#type").change(function () {
            $(".type-group").hide();
            $("." + $(this).val() + "Group").show();
        });
    </script>
@endpush

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
    $("#parent_id").val({{ old('parent_id', 0) }});
    $("#type").val("{{ old('type', 'null') }}");
    $("#type").trigger('change');
    $("#target").val("{{ old('target', 'normal') }}");
    $("#category").val("{{ old('category_id', $menu_category->category_id ?? '') }}");
    $("#content").val("{{ old('content_id', $menu_content->content_id ?? '') }}");
    $("#type_id").val("{{ old('type_id', $menu_type->type_id ?? '') }}");
    $("#product_id").val("{{ old('product_id', $menu_product->product_id ?? '') }}");
@endpush