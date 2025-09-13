@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@push('after-styles')
    <style>
        /* Responsive styles for user edit page */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.1rem;
                text-align: center;
                margin-bottom: 1rem;
            }
            
            .form-group.row {
                margin-bottom: 1rem;
            }
            
            .col-md-2.form-control-label {
                text-align: left !important;
                margin-bottom: 0.5rem;
                font-weight: bold;
            }
            
            .col-md-10,
            .col-md-2 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            /* Table responsive improvements */
            .table-responsive {
                border: none;
                padding: 0;
            }
            
            .table {
                font-size: 12px;
                margin-bottom: 0;
            }
            
            .table td {
                padding: 0.5rem;
                border: none;
            }
            
            /* Role and permission cards */
            .card {
                margin-bottom: 0.5rem;
            }
            
            .card-header {
                padding: 0.5rem;
                font-size: 0.9rem;
            }
            
            .card-body {
                padding: 0.5rem;
                font-size: 0.8rem;
            }
            
            /* Switch improvements */
            .switch {
                margin-right: 0.5rem !important;
            }
            
            .checkbox {
                margin-bottom: 0.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .form-control {
                font-size: 14px;
            }
            
            /* Stack roles and permissions vertically */
            .table td {
                display: block;
                width: 100%;
                border-bottom: 1px solid #dee2e6;
                padding: 1rem;
            }
            
            .table td:first-child {
                border-top: 1px solid #dee2e6;
            }
            
            .table thead {
                display: none;
            }
            
            .table td:before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 0.5rem;
                color: #6c757d;
                font-size: 0.8rem;
                text-transform: uppercase;
            }
            
            /* Card improvements for mobile */
            .card {
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            
            .card-header {
                background-color: #f8f9fa;
                border-bottom: 1px solid #dee2e6;
            }
            
            /* Button improvements */
            .card-footer .col {
                flex: 0 0 100%;
                max-width: 100%;
                text-align: center;
                margin-bottom: 0.5rem;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
        
        /* Collapsible sections for mobile */
        @media (max-width: 768px) {
            .abilities-section {
                position: relative;
            }
            
            .collapse-toggle {
                background: none;
                border: none;
                color: #007bff;
                font-size: 1.5rem;
                cursor: pointer;
                float: right;
                margin-top: -1.5rem;
                margin-left: 0.5rem;
            }
            
            .collapse-toggle:hover {
                color: #0056b3;
            }
            
            .collapse-toggle::after {
                content: ' ▼';
                font-size: 0.8rem;
            }
            
            .collapse-toggle.collapsed::after {
                content: ' ▶';
            }
            
            .abilities-content {
                margin-top: 1rem;
            }
            
            .abilities-content.collapse:not(.show) {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
{{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.users.management')
                        <small class="text-muted">@lang('labels.backend.access.users.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row abilities-section">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}
                        <button type="button" class="collapse-toggle d-md-none collapsed" onclick="toggleAbilities(this)"></button>

                        <div class="table-responsive col-md-10 abilities-content collapse d-md-block">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('labels.backend.access.users.table.roles')</th>
                                        <th>@lang('labels.backend.access.users.table.permissions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="@lang('labels.backend.access.users.table.roles')">
                                            @if($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox d-flex align-items-center">
                                                                {{ html()->label(
                                                                        html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                                ->class('switch-input')
                                                                                ->id('role-'.$role->id)
                                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                    ->for('role-'.$role->id) }}
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            @if($role->id != 1)
                                                                @if($role->permissions->count())
                                                                    @foreach($role->permissions as $permission)
                                                                        <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}<br>
                                                                    @endforeach
                                                                @else
                                                                    @lang('labels.general.none')
                                                                @endif
                                                            @else
                                                                @lang('labels.backend.access.users.all_permissions')
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                        <td data-label="@lang('labels.backend.access.users.table.permissions')">
                                            @if($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox d-flex align-items-center">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                        ->class('switch-input')
                                                                        ->id('permission-'.$permission->id)
                                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script>
        // Toggle abilities section for mobile view
        function toggleAbilities(btn) {
            var content = $('.abilities-content');
            
            if (content.hasClass('show')) {
                content.removeClass('show');
                $(btn).addClass('collapsed');
            } else {
                content.addClass('show');
                $(btn).removeClass('collapsed');
            }
        }
    </script>
@endpush
@endsection
