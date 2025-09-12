<?php

Breadcrumbs::for('admin.agent.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('agent::labels.backend.agent.management'), route('admin.agent.index'));
});

Breadcrumbs::for('admin.agent.create', function ($trail) {
    $trail->parent('admin.agent.index');
    $trail->push(__('agent::labels.backend.agent.create'), route('admin.agent.create'));
});

Breadcrumbs::for('admin.agent.show', function ($trail, $id) {
    $trail->parent('admin.agent.index');
    $trail->push(__('agent::labels.backend.agent.show'), route('admin.agent.show', $id));
});

Breadcrumbs::for('admin.agent.edit', function ($trail, $id) {
    $trail->parent('admin.agent.index');
    $trail->push(__('agent::labels.backend.agent.edit'), route('admin.agent.edit', $id));
});
