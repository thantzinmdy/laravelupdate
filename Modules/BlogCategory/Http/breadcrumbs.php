<?php

Breadcrumbs::for('admin.blogcategory.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('blogcategory::labels.backend.blogcategory.management'), route('admin.blogcategory.index'));
});

Breadcrumbs::for('admin.blogcategory.create', function ($trail) {
    $trail->parent('admin.blogcategory.index');
    $trail->push(__('blogcategory::labels.backend.blogcategory.create'), route('admin.blogcategory.create'));
});

Breadcrumbs::for('admin.blogcategory.show', function ($trail, $id) {
    $trail->parent('admin.blogcategory.index');
    $trail->push(__('blogcategory::labels.backend.blogcategory.show'), route('admin.blogcategory.show', $id));
});

Breadcrumbs::for('admin.blogcategory.edit', function ($trail, $id) {
    $trail->parent('admin.blogcategory.index');
    $trail->push(__('blogcategory::labels.backend.blogcategory.edit'), route('admin.blogcategory.edit', $id));
});
