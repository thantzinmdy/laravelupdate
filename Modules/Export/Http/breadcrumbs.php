<?php

Breadcrumbs::for('admin.export.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('export::labels.backend.export.management'), route('admin.export.index'));
});

Breadcrumbs::for('admin.export.create', function ($trail) {
    $trail->parent('admin.export.index');
    $trail->push(__('export::labels.backend.export.create'), route('admin.export.create'));
});

Breadcrumbs::for('admin.export.show', function ($trail, $id) {
    $trail->parent('admin.export.index');
    $trail->push(__('export::labels.backend.export.show'), route('admin.export.show', $id));
});

Breadcrumbs::for('admin.export.edit', function ($trail, $id) {
    $trail->parent('admin.export.index');
    $trail->push(__('export::labels.backend.export.edit'), route('admin.export.edit', $id));
});
