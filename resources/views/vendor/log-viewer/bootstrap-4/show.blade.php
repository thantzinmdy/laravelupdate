@extends('backend.layouts.app')

@push('after-styles')
    @include('log-viewer::_template.style')
    <style>
        /* Responsive styles for log viewer show page */
        .table-container {
            position: relative;
            overflow-x: auto;
        }
        
        @media (max-width: 992px) {
            /* Collapse sidebar on tablets and below */
            .col-md-2 {
                order: 2;
                margin-top: 1rem;
            }
            
            .col-md-10 {
                order: 1;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .page-header h5 {
                font-size: 1.1rem;
                word-break: break-all;
            }
            
            .card-header {
                font-size: 14px;
                padding: 0.5rem;
            }
            
            .card-header .float-right {
                float: none !important;
                margin-top: 0.5rem;
                text-align: center;
            }
            
            .btn-group-sm > .btn,
            .btn-sm {
                padding: 0.15rem 0.3rem;
                font-size: 0.75rem;
                margin: 0.1rem;
            }
            
            /* Log info list responsive */
            .list-group-item .row {
                flex-direction: column;
            }
            
            .list-group-item .col-sm-2,
            .list-group-item .col-sm-10,
            .list-group-item .col-sm-auto {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 0.25rem;
            }
            
            .list-group-item .col-sm-2 {
                font-weight: bold;
                margin-bottom: 0.1rem;
            }
            
            .list-group-item .col-sm-10 {
                word-break: break-all;
                font-size: 0.9rem;
            }
            
            /* Table responsive */
            .table {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 0.4rem 0.2rem;
                word-break: break-word;
            }
            
            /* Hide less important columns on mobile */
            .table th:nth-child(1),
            .table td:nth-child(1) {
                display: none;
            }
            
            .table th:nth-child(3),
            .table td:nth-child(3) {
                min-width: 60px;
                font-size: 10px;
            }
            
            .table th:nth-child(4),
            .table td:nth-child(4) {
                max-width: 150px;
                font-size: 11px;
            }
            
            .badge {
                font-size: 0.7em;
                padding: 0.2em 0.4em;
            }
            
            /* Pagination responsive */
            .card-header .row,
            .card-footer .row {
                flex-direction: column;
                text-align: center;
            }
            
            .card-header .col,
            .card-footer .col {
                margin-bottom: 0.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .card-header {
                text-align: center;
            }
            
            .table {
                font-size: 11px;
            }
            
            .table th,
            .table td {
                padding: 0.25rem 0.1rem;
            }
            
            /* Show only most important columns on very small screens */
            .table th:nth-child(2),
            .table td:nth-child(2) {
                min-width: 50px;
            }
            
            .table th:nth-child(4),
            .table td:nth-child(4) {
                max-width: 120px;
                font-size: 10px;
            }
            
            .table th:nth-child(5),
            .table td:nth-child(5) {
                min-width: 40px;
            }
            
            /* Stack content responsive */
            .stack-content td {
                padding: 0.5rem;
                font-size: 10px;
                word-break: break-all;
            }
            
            .stack {
                max-height: 200px;
                overflow-y: auto;
                background-color: #f8f9fa;
                border-radius: 0.25rem;
                padding: 0.5rem;
            }
            
            /* Info badges responsive */
            .list-group-item .badge {
                display: block;
                margin: 0.2rem 0;
                word-break: break-all;
            }
        }
        
        /* Modal responsive */
        @media (max-width: 576px) {
            .modal-dialog {
                margin: 0.5rem;
            }
            
            .modal-title {
                font-size: 1.1rem;
            }
            
            .modal-body {
                padding: 1rem;
                text-align: center;
            }
            
            .modal-body .badge {
                display: inline-block;
                margin: 0.1rem;
            }
            
            .modal-footer {
                flex-direction: column;
                align-items: stretch;
            }
            
            .modal-footer .btn {
                margin: 0.2rem 0;
                font-size: 0.9rem;
            }
        }
        
        /* Sidebar menu responsive */
        @media (max-width: 992px) {
            .sidebar-menu {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.5rem;
            }
            
            .sidebar-menu .nav-link {
                font-size: 0.9rem;
                padding: 0.5rem 1rem;
            }
        }
        
        /* Additional improvements for expandable stack content */
        @media (max-width: 768px) {
            .stack-toggle-btn {
                font-size: 0.7rem;
                padding: 0.1rem 0.3rem;
            }
            
            .collapse.show .stack {
                animation: slideDown 0.3s ease-in-out;
            }
            
            /* Entry details toggle button */
            .expand-details-btn {
                background: none;
                border: none;
                color: #007bff;
                font-size: 12px;
                cursor: pointer;
                padding: 2px 5px;
                float: right;
                margin-top: -20px;
            }
            
            .expand-details-btn:hover {
                color: #0056b3;
            }
            
            .header-cell {
                position: relative;
            }
            
            .header-content {
                padding-right: 25px;
            }
            
            /* Entry details content */
            .entry-details-content {
                background-color: #f8f9fa;
                padding: 0.75rem;
                border-radius: 0.25rem;
                margin: 0.5rem 0;
            }
            
            .entry-details.show {
                display: table-row;
            }
            
            /* Stack wrapper improvements */
            .stack-wrapper {
                max-height: 300px;
                overflow-y: auto;
                background-color: #f8f9fa;
                border-radius: 0.25rem;
                padding: 0.5rem;
                font-family: 'Courier New', monospace;
                font-size: 11px;
                white-space: pre-wrap;
                word-break: break-all;
            }
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                max-height: 0;
            }
            to {
                opacity: 1;
                max-height: 200px;
            }
        }
    </style>
@endpush

@section('content-header')
@section('page-header')
    <h5 class="mb-4">Log [{{ $log->date }}]</h5>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('log-viewer::_partials.menu')
        </div>
        <div class="col-md-10">
            {{-- Log Details --}}
            <div class="card">
                <div class="card-header">
                    Log info :
                    <div class="float-right">
                        <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> DOWNLOAD
                        </a>
                        <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false">
                            <i class="fa fa-trash"></i> DELETE
                        </a>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-2">
                                File path:
                            </div>
                            <div class="col-sm-10">
                                {{ $log->getPath() }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-auto">
                                Log entries: <span class="badge badge-primary">{{ $entries->total() }}</span>
                            </div>
                            <div class="col-sm-auto">
                                Size: <span class="badge badge-primary">{{ $log->size() }}</span>
                            </div>
                            <div class="col-sm-auto">
                                Created at: <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                            </div>
                            <div class="col-sm-auto">
                                Updated at: <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Log Entries --}}
            <div class="card mt-4">
                @if($entries->hasPages())
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                {!! $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4') !!}
                            </div>
                            <div class="col text-right">
                                <span class="badge badge-info">
                                    Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table id="entries" class="table" style="word-break: break-word;">
                                <thead>
                                <tr>
                                    <th>ENV</th>
                                    <th>Level</th>
                                    <th>Time</th>
                                    <th>Header</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($entries as $key => $entry)
                                    <tr class="log-entry-row" data-entry-id="{{ $key }}">
                                        <td>
                                            <span class="badge badge-env">{{ $entry->env }}</span>
                                        </td>
                                        <td>
                                        <span class="badge level level-{{ $entry->level }}">
                                            {!! $entry->level() !!}
                                        </span>
                                        </td>
                                        <td>
                                        <span class="badge badge-default">
                                            {{ $entry->datetime->format('H:i:s') }}
                                        </span>
                                        </td>
                                        <td class="header-cell">
                                            <div class="header-content">
                                                {{ $entry->header }}
                                            </div>
                                            <button class="expand-details-btn d-md-none" onclick="toggleEntryDetails(this)" data-target="entry-details-{{ $key }}">
                                                <i class="fa fa-chevron-down"></i>
                                            </button>
                                        </td>
                                        <td class="text-right">
                                            @if($entry->hasStack())
                                                <a class="btn btn-sm btn-outline-info stack-toggle-btn" role="button" data-toggle="collapse" href="#log-stack-{{ $key }}" aria-expanded="false" aria-controls="log-stack-{{ $key }}">
                                                    <i class="fa fa-toggle-on"></i> <span class="d-none d-sm-inline">Stack</span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="entry-details d-md-none collapse" id="entry-details-{{ $key }}">
                                        <td colspan="5">
                                            <div class="entry-details-content">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">Environment:</small><br>
                                                        <span class="badge badge-env">{{ $entry->env }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">Level:</small><br>
                                                        <span class="badge level level-{{ $entry->level }}">
                                                            {!! $entry->level() !!}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <small class="text-muted">Full Time:</small><br>
                                                    <span class="badge badge-default">{{ $entry->datetime->format('Y-m-d H:i:s') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @if($entry->hasStack())
                                        <tr class="stack-content collapse" id="log-stack-{{ $key }}">
                                            <td colspan="5" class="stack">
                                                <div class="stack-wrapper">
                                                    {!! trim($entry->stack()) !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <span class="badge badge-default">{{ __('log-viewer::general.empty-logs') }}</span>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                    </div>
                </div><!--card-body-->
                @if($entries->hasPages())
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                {!! $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4') !!}
                            </div>
                            <div class="col text-right">
                            <span class="badge badge-info">
                                Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                            </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="{{ $log->date }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Log File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary">{{ $log->date }}</span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;"><i class="fa fa-trash"></i> DELETE FILE</button>
                        <button type="button" class="btn btn-sm btn-primary pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(function () {
            var deleteLogModal = $('#delete-log-modal'),
                deleteLogForm  = $('#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception!')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            @unless(empty(log_styler()->toHighlight()))
            @php
                $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0
                    ? join('|', log_styler()->toHighlight())
                    : join(log_styler()->toHighlight(), '|');
            @endphp
            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/({!! $htmlHighlight !!})/gm, '<strong>$1</strong>');
                @endunless
                $this.html(html);
            });
        });

        // Toggle entry details for mobile view
        function toggleEntryDetails(btn) {
            var targetId = $(btn).data('target');
            var detailsRow = $('#' + targetId);
            var icon = $(btn).find('i');
            
            if (detailsRow.hasClass('show')) {
                detailsRow.removeClass('show');
                icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            } else {
                // Close all other expanded details
                $('.entry-details.show').removeClass('show');
                $('.expand-details-btn i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                
                // Open this one
                detailsRow.addClass('show');
                icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            }
        }

        // Enhance stack toggle functionality for mobile
        $(document).ready(function() {
            $('.stack-toggle-btn').on('click', function() {
                var target = $(this).attr('href');
                var icon = $(this).find('i');
                
                setTimeout(function() {
                    if ($(target).hasClass('show')) {
                        icon.removeClass('fa-toggle-on').addClass('fa-toggle-off');
                    } else {
                        icon.removeClass('fa-toggle-off').addClass('fa-toggle-on');
                    }
                }, 100);
            });
        });
    </script>
@endpush
