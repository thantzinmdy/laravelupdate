<?php

Breadcrumbs::for('admin.blog.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('blog::labels.backend.blog.management'), route('admin.blog.index'));
});

Breadcrumbs::for('admin.blog.create', function ($trail) {
    $trail->parent('admin.blog.index');
    $trail->push(__('blog::labels.backend.blog.create'), route('admin.blog.create'));
});

Breadcrumbs::for('admin.blog.show', function ($trail, $id) {
    $trail->parent('admin.blog.index');
    $trail->push(__('blog::labels.backend.blog.show'), route('admin.blog.show', $id));
});

Breadcrumbs::for('admin.blog.edit', function ($trail, $id) {
    $trail->parent('admin.blog.index');
    $trail->push(__('blog::labels.backend.blog.edit'), route('admin.blog.edit', $id));
});

Breadcrumbs::for('admin.blog.image_upload', function ($trail, $id) {
    $trail->parent('admin.blog.index');
    $trail->push(__('blog::labels.backend.blog.show'), route('admin.blog.image_upload', $id));
});
