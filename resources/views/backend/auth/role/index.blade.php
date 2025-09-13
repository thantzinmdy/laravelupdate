@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@push('after-styles')
    <style>
        /* Responsive styles for role index page */
        .table-container {
            position: relative;
            overflow-x: auto;
        }
        
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.1rem;
                text-align: center;
            }
            
            .col-sm-5, .col-sm-7 {
                text-align: center;
                margin-bottom: 10px;
            }
            
            .table {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 0.4rem 0.2rem;
                word-break: break-word;
            }
            
            /* Hide permissions column on mobile */
            .table th:nth-child(2),
            .table td:nth-child(2) {
                display: none;
            }
            
            .btn-group-sm > .btn,
            .btn-sm {
                padding: 0.15rem 0.3rem;
                font-size: 0.75rem;
                margin: 0.1rem;
            }
            
            /* Pagination responsive */
            .float-left,
            .float-right {
                float: none !important;
                text-align: center;
                display: block;
                margin: 0.5rem 0;
            }
            
            .col-7, .col-5 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .table {
                font-size: 11px;
            }
            
            .table th,
            .table td {
                padding: 0.25rem 0.1rem;
            }
            
            /* Show only role name, user count, and actions on very small screens */
            .table th:nth-child(1),
            .table td:nth-child(1) {
                min-width: 100px;
            }
            
            .table th:nth-child(3),
            .table td:nth-child(3) {
                text-align: center;
                min-width: 60px;
            }
            
            .table th:nth-child(4),
            .table td:nth-child(4) {
                min-width: 80px;
            }
        }
        
        /* Expandable details for hidden columns */
        @media (max-width: 768px) {
            .role-details {
                display: none;
                background-color: #f8f9fa;
                padding: 10px;
                border-top: 1px solid #dee2e6;
            }
            
            .role-details.show {
                display: block;
            }
            
            .expand-btn {
                background: none;
                border: none;
                color: #007bff;
                font-size: 12px;
                cursor: pointer;
                padding: 2px 5px;
                float: right;
            }
            
            .expand-btn:hover {
                color: #0056b3;
            }
            
            .expand-btn::after {
                content: ' ▼';
                font-size: 10px;
            }
            
            .expand-btn.collapsed::after {
                content: ' ▶';
            }
            
            .permissions-list {
                max-height: 200px;
                overflow-y: auto;
                background-color: #ffffff;
                border: 1px solid #dee2e6;
                border-radius: 0.25rem;
                padding: 0.5rem;
                margin-top: 0.5rem;
            }
            
            .permission-badge {
                display: inline-block;
                background-color: #007bff;
                color: white;
                padding: 0.2rem 0.5rem;
                border-radius: 0.25rem;
                font-size: 0.7rem;
                margin: 0.1rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.roles.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.auth.role.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.access.roles.table.role')</th>
                                <th>@lang('labels.backend.access.roles.table.permissions')</th>
                                <th>@lang('labels.backend.access.roles.table.number_of_users')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr class="role-row" data-role-id="{{ $role->id }}">
                                        <td>
                                            {{ ucwords($role->name) }}
                                            <button class="expand-btn d-md-none collapsed" onclick="toggleRoleDetails(this)" data-target="role-details-{{ $role->id }}"></button>
                                        </td>
                                        <td>
                                            @if($role->id === 1)
                                                @lang('labels.general.all')
                                            @else
                                                @if($role->permissions->count())
                                                    @foreach($role->permissions as $permission)
                                                        {{ ucwords($permission->name) }}@if(!$loop->last), @endif
                                                    @endforeach
                                                @else
                                                    @lang('labels.general.none')
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $role->users->count() }}</td>
                                        <td>@include('backend.auth.role.includes.actions', ['role' => $role])</td>
                                    </tr>
                                    <tr class="role-details d-md-none" id="role-details-{{ $role->id }}">
                                        <td colspan="4">
                                            <div class="permissions-section">
                                                <strong class="text-muted">Permissions:</strong>
                                                <div class="permissions-list">
                                                    @if($role->id === 1)
                                                        <span class="permission-badge">@lang('labels.general.all')</span>
                                                    @else
                                                        @if($role->permissions->count())
                                                            @foreach($role->permissions as $permission)
                                                                <span class="permission-badge">{{ ucwords($permission->name) }}</span>
                                                            @endforeach
                                                        @else
                                                            <span class="permission-badge">@lang('labels.general.none')</span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $roles->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

@push('after-scripts')
    <script>
        // Toggle role details for mobile view
        function toggleRoleDetails(btn) {
            var targetId = $(btn).data('target');
            var detailsRow = $('#' + targetId);
            
            if (detailsRow.hasClass('show')) {
                detailsRow.removeClass('show');
                $(btn).removeClass('expanded').addClass('collapsed');
            } else {
                // Close all other expanded details
                $('.role-details.show').removeClass('show');
                $('.expand-btn').removeClass('expanded').addClass('collapsed');
                
                // Open this one
                detailsRow.addClass('show');
                $(btn).removeClass('collapsed').addClass('expanded');
            }
        }
    </script>
@endpush
@endsection
