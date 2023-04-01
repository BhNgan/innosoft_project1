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
        <button type="submit" class="btn btn-primary mr-3" onclick="saveDraft();">{{ __("admin/$route.save_draft") }}</button>
        <button type="submit" class="btn btn-success" onclick="save();">{{ __('admin/table.save') }}</button>
    </nav>
    <div class="bg-white div-content my-3 p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories">{{ __("admin/$route.categories") }} (*)</label>
                    <select class="form-control custom-select" multiple id="categories" name="categories[]">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">{{ __("admin/$route.title") }} (*)</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="{{ __("admin/$route.title") }}" maxlength="191" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="alias">{{ __("admin/$route.alias") }} (*)</label>
                    <input type="text" class="form-control" name="alias" id="alias" required placeholder="{{ __("admin/$route.alias") }}" maxlength="191" value="{{ old('alias') }}">
                </div>
                <div class="form-group">
                    <label for="sort">{{ __("admin/$route.sort") }} (*)</label>
                    <input type="number" class="form-control" name="sort" id="sort" required placeholder="{{ __("admin/$route.sort") }}" maxlength="191" value="{{ old('sort', 0) }}">
                </div>
                <div class="form-group">
                    <label for="views">{{ __("admin/$route.views") }} (*)</label>
                    <input type="number" class="form-control" name="views" id="views" required placeholder="{{ __("admin/$route.views") }}" maxlength="191" value="{{ old('views', 0) }}">
                </div>
                <div class="form-group">
                    <label for="description">{{ __("admin/$route.description") }}</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="{{ __("admin/$route.description") }}" maxlength="191" value="{{ old('description') }}">
                </div>
                <div class="form-group">
                    <label for="note">{{ __("admin/$route.note") }}</label>
                    <textarea class="form-control" id="note" name="note" rows="3">{{ old('note') }}</textarea>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_show', 1) == 1) checked @endif class="custom-control-input" name="show" id="show" onclick="$('#is_show').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="show">{{ __("admin/$route.is_show") }}</label>
                    <input hidden type="text" name="is_show" id="is_show" value="{{ old('is_show', 1) }}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" @if (old('is_featured', 0) == 1) checked @endif class="custom-control-input" name="featured" id="featured" onclick="$('#is_featured').val($(this).prop('checked') ? '1' : '0');">
                    <label class="custom-control-label" for="featured">{{ __("admin/$route.is_featured") }}</label>
                    <input hidden type="text" name="is_featured" id="is_featured" value="{{ old('is_featured', 0) }}">
                </div>
                <input hidden type="text" name="is_draft" id="is_draft" value="{{ old('is_draft', 0) }}">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="upload">{{ __("admin/$route.avatar") }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload" name="upload" value="{{ old('upload', '') }}">
                        <label class="custom-file-label" for="upload">{{ old('upload', __("admin/$route.avatar")) }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="video">{{ __('admin/products.video') }}</label>
                    <input type="text" class="form-control" name="video" id="video" placeholder="{{ __('admin/products.video') }}" value="{{ old('video', $data->video ?? "") }}" maxlength="191">
                    <pre id="preview" class="my-3"></pre>
                    <textarea name="embed" hidden id="embed" rows="3">{{ old('embed', $data->embed ?? "") }}</textarea>
                </div>
                <div class="form-group">
                    <label for="summary">{{ __("admin/$route.summary") }}</label>
                    <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">{{ __("admin/$route.content") }}</label>
                    <textarea id="content" name="content" rows="3">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
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

        function save() {
            $("#is_draft").val(0);
        }

        function saveDraft() {
            $("#is_draft").val(1);
        }

        $("#title").keyup(function () {
            str_to_alias("title", "alias");
        });

        //------------ TYpe multi pick Utube generator
        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
        
            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }
        
        $("#video").on("keyup", function () {
            if($(this).val()) {
                var embed = getId($(this).val());
                $("#preview").html('<iframe width="360" height="240" src="//www.youtube.com/embed/' + embed + '" frameborder="0" allowfullscreen></iframe>');
                $("#embed").val(embed);
            }
        })
    </script>
@endpush

@push('ready')
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
    bsCustomFileInput.init();
    CKEDITOR.replace('content', {
        language: 'vi',
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
@endpush