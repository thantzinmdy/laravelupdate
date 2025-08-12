@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('blog::labels.backend.blog.management'))

@push('after-styles')
    {{ style('/js/plugin/dropzone/basic.min.css') }}
    {{ style('/js/plugin/dropzone/dropzone.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('blog::labels.backend.blog.management') }} <small class="text-muted">{{ __('blog::labels.backend.blog.list') }}</small>
                </h4>
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">

                {{ html()->form('POST', route('admin.blog.image_upload_file', $blog))
                         ->attribute('enctype', 'multipart/form-data')
                         ->class('dropzone dropzone-file-area')
                         ->attribute('id','my-awesome-dropzone')
                         ->attribute('role','form')
                         ->open() }}

                <h3 class="sbold">Drop files here or click to upload photo(850px,500px)</h3>
                {{ html()->closeModelForm() }}

            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {!! script('/js/plugin/dropzone/dropzone.min.js') !!}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

       Dropzone.options.myAwesomeDropzone = {
            init: function () {
                thisDropzone = this;
                $.get('{{ route('admin.blog.image_upload_file' , $blog->id ) }}', function(data) {

                    $.each(data, function (key, value) {

                        var mockFile = {name: value.name , size : value.size , id : value.id };

                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.file );
                        thisDropzone.emit("complete", mockFile);
                    });
                });

            },
            dictRemoveFileConfirmation: 'Are you sure!',

            addRemoveLinks: true,

            removedfile : function (file) {
                var id = file.id;
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url("admin/blog-image-file") }}/'+id,
                    data: {
                        'id': id
                    },
                    dataType: 'json'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        }
    </script>
@endpush