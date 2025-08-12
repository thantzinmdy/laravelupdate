@can('create blog')
<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.blog.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="{{ __('blog::menus.backend.blog.create') }}"><i class="fas fa-plus-circle"></i></a>
</div>
<!--btn-toolbar-->
@endcan