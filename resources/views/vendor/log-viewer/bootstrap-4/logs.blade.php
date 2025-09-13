@extends('backend.layouts.app')

@push('after-styles')
    @include('log-viewer::_template.style')
    <style>
        /* Responsive styles for log viewer */
        .table-container {
            position: relative;
            overflow-x: auto;
        }
        
        @media (max-width: 768px) {
            .card-header {
                font-size: 14px;
                padding: 0.5rem;
            }
            
            .table {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 0.4rem;
                word-break: break-word;
            }
            
            .btn-group-sm > .btn,
            .btn-sm {
                padding: 0.15rem 0.3rem;
                font-size: 0.75rem;
            }
            
            .badge {
                font-size: 0.7em;
            }
            
            /* Hide less important columns on mobile */
            .table th:nth-child(n+3):nth-child(-n+7),
            .table td:nth-child(n+3):nth-child(-n+7) {
                display: none;
            }
            
            /* Make date column smaller */
            .table th:first-child,
            .table td:first-child {
                min-width: 80px;
                font-size: 11px;
            }
            
            /* Actions column responsive */
            .table th:last-child,
            .table td:last-child {
                min-width: 90px;
            }
        }
        
        @media (max-width: 576px) {
            .page-header h5 {
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            
            .table {
                font-size: 11px;
            }
            
            .table th,
            .table td {
                padding: 0.25rem;
            }
            
            /* Show only date, emergency/error counts, and actions on very small screens */
            .table th:nth-child(n+2):nth-child(-n+7),
            .table td:nth-child(n+2):nth-child(-n+7) {
                display: none;
            }
            
            /* Show emergency and error columns */
            .table th:nth-child(2),
            .table td:nth-child(2),
            .table th:nth-child(3),
            .table td:nth-child(3) {
                display: table-cell;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .btn-group .btn {
                margin-bottom: 2px;
                border-radius: 0.2rem !important;
            }
        }
        
        /* Expandable details for hidden columns */
        @media (max-width: 768px) {
            .log-details {
                display: none;
                background-color: #f8f9fa;
                padding: 10px;
                border-top: 1px solid #dee2e6;
            }
            
            .log-details.show {
                display: block;
            }
            
            .expand-btn {
                background: none;
                border: none;
                color: #007bff;
                font-size: 12px;
                cursor: pointer;
                padding: 2px 5px;
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
        
        /* Pagination responsive */
        @media (max-width: 576px) {
            .pagination {
                font-size: 0.8rem;
            }
            
            .pagination .page-link {
                padding: 0.25rem 0.5rem;
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
            }
            
            .modal-footer .btn {
                font-size: 0.8rem;
                padding: 0.375rem 0.75rem;
            }
        }
    </style>
@endpush

@section('page-header')
    <h5 class="mb-4">Log Viewer
        <small class="text-muted">By <a href="https://github.com/ARCANEDEV/LogViewer" target="_blank">ARCANEDEV</a></small>
    </h5>
@endsection

@section('content')
    {!! $rows->render('log-viewer::_pagination.bootstrap-4') !!}

    <div class="card">
        <div class="card-header">
            {{ __('menus.backend.log-viewer.logs') }}
        </div><!-- box-header -->

        <div class="card-body">
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            @foreach($headers as $key => $header)
                                <th class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                    @if($key == 'date')
                                        <span class="badge badge-info level">{{ $header }}</span>
                                    @else
                                        <span class="badge level level-{{ $key }}">
                                        {!! log_styler()->icon($key) . ' ' . $header !!}
                                    </span>
                                    @endif
                                </th>
                            @endforeach
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($rows->count() > 0)
                            @foreach($rows as $date => $row)
                                <tr class="log-row" data-date="{{ $date }}">
                                    @foreach($row as $key => $value)
                                        <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                            @if($key == 'date')
                                                <a href="{{ route('log-viewer::logs.show', [$value]) }}" class="btn btn-sm btn-primary">
                                                    {{ $value }}
                                                </a>
                                                <button class="expand-btn d-md-none collapsed" onclick="toggleLogDetails(this)"></button>
                                            @elseif($value == 0)
                                                <span class="badge level level-empty">{{ $value }}</span>
                                            @else
                                                <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                                    <span class="badge level level-{{ $key }}">{{ $value }}</span>
                                                </a>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Log Viewer Actions">
                                            <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-download"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false" data-target="#delete-log-modal" data-log-date="{{ $date }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="log-details d-md-none" id="details-{{ $loop->index }}">
                                    <td colspan="11">
                                        <div class="row">
                                            @foreach($row as $key => $value)
                                                @if($key != 'date')
                                                    <div class="col-4 col-sm-3 mb-2">
                                                        <small class="text-muted">{{ ucfirst($key) }}:</small><br>
                                                        @if($value == 0)
                                                            <span class="badge level level-empty">{{ $value }}</span>
                                                        @else
                                                            <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                                                <span class="badge level level-{{ $key }}">{{ $value }}</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">
                                    <span class="badge badge-default">{{ __('log-viewer::general.empty-logs') }}</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div><!--table-responsive-->
            </div>
        </div>
    </div>

    {!! $rows->render('log-viewer::_pagination.bootstrap-4') !!}

    <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-log-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Log File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p></p>
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

            deleteLogModal.on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var logdate = button.data('log-date'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('.modal-body p').html(
                    'Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary">' + logdate + '</span> ?'
                );
                deleteLogForm.find('input[name=date]').val(logdate)
            });

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
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
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

            deleteLogModal.on('hidden.bs.modal', function() {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });

        // Toggle log details for mobile view
        function toggleLogDetails(btn) {
            var row = $(btn).closest('tr');
            var detailsRow = row.next('.log-details');
            
            if (detailsRow.hasClass('show')) {
                detailsRow.removeClass('show');
                $(btn).removeClass('expanded').addClass('collapsed');
            } else {
                // Close all other expanded details
                $('.log-details.show').removeClass('show');
                $('.expand-btn').removeClass('expanded').addClass('collapsed');
                
                // Open this one
                detailsRow.addClass('show');
                $(btn).removeClass('collapsed').addClass('expanded');
            }
        }
    </script>
@endpush
