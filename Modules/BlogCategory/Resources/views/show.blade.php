@extends ('backend.layouts.app')

@section ('title', __('blogcategory::labels.backend.blogcategory.management'))

@section('breadcrumb-links')
    @include('blogcategory::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('blogcategory::labels.backend.blogcategory.management') }}
                    <small class="text-muted">{{ __('blogcategory::labels.backend.blogcategory.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.name') }}</th>         
                            <td>{{ $blogCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.description') }}</th>
                            <td>{{ $blogCategory->description }}</td>
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
                    <strong>{{ __('blogcategory::labels.backend.blogcategory.table.created') }}:</strong> {{ $blogCategory->updated_at->timezone(get_user_timezone()) }} ({{ $blogCategory->created_at->diffForHumans() }}),
                    <strong>{{ __('blogcategory::labels.backend.blogcategory.table.last_updated') }}:</strong> {{ $blogCategory->created_at->timezone(get_user_timezone()) }} ({{ $blogCategory->updated_at->diffForHumans() }})
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