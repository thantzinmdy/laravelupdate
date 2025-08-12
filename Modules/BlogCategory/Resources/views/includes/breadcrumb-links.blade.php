<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('blogcategory::menus.backend.blogcategory.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.blogcategory.index') }}">{{ __('blogcategory::menus.backend.blogcategory.all') }}</a>
                @can('create blogcategory')
                <a class="dropdown-item" href="{{ route('admin.blogcategory.create') }}">{{ __('blogcategory::menus.backend.blogcategory.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>