<?php

Breadcrumbs::for('admin.client.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('client::labels.backend.client.management'), route('admin.client.index'));
});

Breadcrumbs::for('admin.client.create', function ($trail) {
    $trail->parent('admin.client.index');
    $trail->push(__('client::labels.backend.client.create'), route('admin.client.create'));
});

Breadcrumbs::for('admin.client.show', function ($trail, $id) {
    $trail->parent('admin.client.index');
    $trail->push(__('client::labels.backend.client.show'), route('admin.client.show', $id));
});

Breadcrumbs::for('admin.client.edit', function ($trail, $id) {
    $trail->parent('admin.client.index');
    $trail->push(__('client::labels.backend.client.edit'), route('admin.client.edit', $id));
});
