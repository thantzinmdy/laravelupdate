@extends ('backend.layouts.app')

@section ('title', __('blog::labels.backend.blog.management') . ' | ' . __('blog::labels.backend.blog.edit'))

@section('breadcrumb-links')
    @include('blog::includes.breadcrumb-links')
@endsection

@push('after-styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
{{ html()->modelForm($blog, 'PATCH', route('admin.blog.update', $blog->id))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('blog::labels.backend.blog.management') }}
                        <small class="text-muted">{{ __('blog::labels.backend.blog.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('blog::labels.backend.blog.table.blog_category').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('blog_category') }}

                        <div class="col-md-10">
                            <select name="blog_category_id" id="blog_category_id" class="form-control select2">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($blog->blog_category_id == $category->id) selected @endif>{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('blog::labels.backend.blog.table.author_name'))->class('col-md-2 form-control-label')->for('author_name') }}

                        <div class="col-md-10">
                            {{ html()->text('author_name')
                                ->class('form-control')
                                ->placeholder(__('blog::labels.backend.blog.table.author_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('blog::labels.backend.blog.table.title'))->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('blog::labels.backend.blog.table.title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('blog::labels.backend.blog.table.content').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control editor')
                                ->placeholder(__('blog::labels.backend.blog.table.content'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('blog::labels.backend.blog.table.image'))->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            @if($blog->image)
                                <img src="{{asset('uploads/'.$blog->image) }}" alt="" class="img-thumbnail" width="200px">
                            @endif
                            {{ html()->file('image')
                                ->class('form-control')
                                }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group row">
                    {{ html()->label(__('blog::labels.backend.blog.table.priority'))->class('col-md-2 form-control-label')->for('priority') }}

                        <div class="col-md-10">
                            {{ html()->number('priority')
                                ->class('form-control')
                                ->placeholder(__('blog::labels.backend.blog.table.priority'))
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->



                    <div class="form-group row">
                        {{ html()->label(__('blog::labels.backend.blog.table.active'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                @if($blog->is_active == 1)
                                    {{ html()->checkbox('is_active', true)->class('switch-input') }}
                                @else
                                    {{ html()->checkbox('is_active', false)->class('switch-input') }}
                                @endif
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.blog.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
       $('.editor').summernote({
          height: 400,
        });
    });


</script>
@endpush