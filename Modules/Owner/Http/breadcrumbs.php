<?php

Breadcrumbs::for('admin.owner.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('owner::labels.backend.owner.management'), route('admin.owner.index'));
});

Breadcrumbs::for('admin.owner.create', function ($trail) {
    $trail->parent('admin.owner.index');
    $trail->push(__('owner::labels.backend.owner.create'), route('admin.owner.create'));
});

Breadcrumbs::for('admin.owner.show', function ($trail, $id) {
    $trail->parent('admin.owner.index');
    $trail->push(__('owner::labels.backend.owner.show'), route('admin.owner.show', $id));
});

Breadcrumbs::for('admin.owner.edit', function ($trail, $id) {
    $trail->parent('admin.owner.index');
    $trail->push(__('owner::labels.backend.owner.edit'), route('admin.owner.edit', $id));
});
