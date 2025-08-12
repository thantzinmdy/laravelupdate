@extends ('backend.layouts.app')

@section ('title', __('blog::labels.backend.blog.management'))

@section('breadcrumb-links')
    @include('blog::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('blog::labels.backend.blog.management') }}
                    <small class="text-muted">{{ __('blog::labels.backend.blog.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.blog_category') }}</th>         
                            <td>{{ $blog->category->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.author_name') }}</th>
                            <td>{{ $blog->author_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.title') }}</th>
                            <td>{{ $blog->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.content') }}</th>
                            <td>{!! $blog->content !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.image') }}</th>
                            <td><img src="{{asset('uploads/'.$blog->image) }}" alt="" class="img-thumbnail" width="200px"></td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.priority') }}</th>
                            <td>{{ $blog->priority }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.view_count') }}</th>
                            <td>{{ $blog->view_count }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.status') }}</th>
                            <td>
                                {!! $blog->status_label !!}
                              
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('blog::labels.backe nd.blog.table.created') }}:</strong> {{ $blog->updated_at->timezone(get_user_timezone()) }} ({{ $blog->created_at->diffForHumans() }}),
                    <strong>{{ __('blog::labels.backend.blog.table.last_updated') }}:</strong> {{ $blog->created_at->timezone(get_user_timezone()) }} ({{ $blog->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush