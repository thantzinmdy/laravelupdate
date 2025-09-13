@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@push('after-styles')
    <style>
        /* Responsive styles for user index page */
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
            
            /* Hide less important columns on mobile */
            .table th:nth-child(4),
            .table td:nth-child(4),
            .table th:nth-child(6),
            .table td:nth-child(6),
            .table th:nth-child(7),
            .table td:nth-child(7),
            .table th:nth-child(8),
            .table td:nth-child(8) {
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
            
            /* Show only essential columns on very small screens */
            .table th:nth-child(1),
            .table td:nth-child(1) {
                min-width: 80px;
            }
            
            .table th:nth-child(3),
            .table td:nth-child(3) {
                max-width: 120px;
                font-size: 10px;
            }
            
            .table th:nth-child(5),
            .table td:nth-child(5) {
                max-width: 100px;
                font-size: 10px;
            }
            
            .btn-td .btn {
                display: block;
                margin: 0.1rem 0;
                width: 100%;
            }
        }
        
        /* Expandable details for hidden columns */
        @media (max-width: 768px) {
            .user-details {
                display: none;
                background-color: #f8f9fa;
                padding: 10px;
                border-top: 1px solid #dee2e6;
            }
            
            .user-details.show {
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
        }
    </style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }} <small class="text-muted">{{ __('labels.backend.access.users.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.user.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.access.users.table.last_name')</th>
                                <th>@lang('labels.backend.access.users.table.first_name')</th>
                                <th>@lang('labels.backend.access.users.table.email')</th>
                                <th>@lang('labels.backend.access.users.table.confirmed')</th>
                                <th>@lang('labels.backend.access.users.table.roles')</th>
                                <th>@lang('labels.backend.access.users.table.other_permissions')</th>
                                <th>@lang('labels.backend.access.users.table.social')</th>
                                <th>@lang('labels.backend.access.users.table.last_updated')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="user-row" data-user-id="{{ $user->id }}">
                                    <td>
                                        {{ $user->last_name }}
                                        <button class="expand-btn d-md-none collapsed" onclick="toggleUserDetails(this)" data-target="user-details-{{ $user->id }}"></button>
                                    </td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@include('backend.auth.user.includes.confirm', ['user' => $user])</td>
                                    <td>{{ $user->roles_label }}</td>
                                    <td>{{ $user->permissions_label }}</td>
                                    <td>@include('backend.auth.user.includes.social-buttons', ['user' => $user])</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td class="btn-td">@include('backend.auth.user.includes.actions', ['user' => $user])</td>
                                </tr>
                                <tr class="user-details d-md-none" id="user-details-{{ $user->id }}">
                                    <td colspan="9">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <small class="text-muted">Confirmed:</small><br>
                                                @include('backend.auth.user.includes.confirm', ['user' => $user])
                                            </div>
                                            <div class="col-6 mb-2">
                                                <small class="text-muted">Permissions:</small><br>
                                                <span class="badge badge-secondary">{{ $user->permissions_label ?: 'None' }}</span>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <small class="text-muted">Social:</small><br>
                                                @include('backend.auth.user.includes.social-buttons', ['user' => $user])
                                            </div>
                                            <div class="col-6 mb-2">
                                                <small class="text-muted">Last Updated:</small><br>
                                                <span class="badge badge-info">{{ $user->updated_at->diffForHumans() }}</span>
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
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

@push('after-scripts')
    <script>
        // Toggle user details for mobile view
        function toggleUserDetails(btn) {
            var targetId = $(btn).data('target');
            var detailsRow = $('#' + targetId);
            
            if (detailsRow.hasClass('show')) {
                detailsRow.removeClass('show');
                $(btn).removeClass('expanded').addClass('collapsed');
            } else {
                // Close all other expanded details
                $('.user-details.show').removeClass('show');
                $('.expand-btn').removeClass('expanded').addClass('collapsed');
                
                // Open this one
                detailsRow.addClass('show');
                $(btn).removeClass('collapsed').addClass('expanded');
            }
        }
    </script>
@endpush
@endsection
