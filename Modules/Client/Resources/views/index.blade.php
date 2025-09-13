@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('client::labels.backend.client.management'))

@section('breadcrumb-links')
    @include('client::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css") }}
    {{ style("https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css") }}
    <style>
        /* Loading overlay styles */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1050;
        }
        
        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .table-container {
            position: relative;
            overflow-x: auto;
        }
        
        .btn-loading {
            position: relative;
        }
        
        .btn-loading .btn-text {
            opacity: 0;
        }
        
        .btn-loading::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                float: none;
                text-align: center;
                margin-bottom: 10px;
            }
            
            .dataTables_wrapper .dataTables_info,
            .dataTables_wrapper .dataTables_paginate {
                float: none;
                text-align: center;
                margin-top: 10px;
            }
            
            .table-responsive {
                border: none;
            }
            
            #client-table {
                font-size: 12px;
            }
            
            .btn-group-sm > .btn, .btn-sm {
                padding: 0.15rem 0.3rem;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 576px) {
            .card-title {
                font-size: 1rem;
            }
            
            #client-table {
                font-size: 11px;
            }
            
            .col-sm-5, .col-sm-7 {
                text-align: center;
                margin-bottom: 10px;
            }
        }
        
        /* DataTable responsive child row styles */
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
            cursor: default !important;
        }
        
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th.child:before {
            display: none !important;
        }
        
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child,
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }
        
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child:before {
            top: 50%;
            left: 5px;
            height: 14px;
            width: 14px;
            margin-top: -7px;
            display: block;
            position: absolute;
            color: white;
            border: 2px solid white;
            border-radius: 14px;
            box-shadow: 0 0 3px #444;
            box-sizing: content-box;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            line-height: 14px;
            content: '+';
            background-color: #007bff;
        }
        
        table.dataTable.dtr-inline.collapsed > tbody > tr.parent > td:first-child:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr.parent > th:first-child:before {
            content: '-';
            background-color: #d33;
        }
        
        /* Responsive priority for columns */
        @media (max-width: 1200px) {
            .dtr-control {
                background-color: #f8f9fa;
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
                    {{ __('client::menus.backend.client.management') }} <small class="text-muted">{{ __('client::menus.backend.client.all') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('client::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#searchFilters" aria-expanded="false" aria-controls="searchFilters">
                                <i class="fas fa-search"></i> Advanced Search & Filters
                            </button>
                        </h5>
                    </div>
                    <div id="searchFilters" class="collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="start_date">Filling Date From:</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="end_date">Filling Date To:</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="trademark_name">Trademark Name:</label>
                                        <input type="text" class="form-control" id="trademark_name" name="trademark_name" placeholder="Search trademark name...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="owner_id">Owner Name:</label>
                                        <select class="form-control" id="owner_id" name="owner_id">
                                            <option value="">All Owners</option>
                                            @foreach(\Modules\Owner\Entities\Owner::orderBy('name')->get() as $owner)
                                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_id">Agent Name:</label>
                                        <select class="form-control" id="agent_id" name="agent_id">
                                            <option value="">All Agents</option>
                                            @foreach(\Modules\Agent\Entities\Agent::orderBy('name')->get() as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br>
                                        <button type="button" class="btn btn-primary" id="search-btn">
                                            <span class="btn-text">
                                                <i class="fas fa-search"></i> Search
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-secondary ml-2" id="clear-btn">
                                            <i class="fas fa-times"></i> Clear Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-container">
                    <div class="loading-overlay" id="table-loading">
                        <div class="loading-spinner"></div>
                    </div>
                    <div class="table-responsive">
                        <table id="client-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Main Code</th>
                            <th>Sub Code</th>
                            <th>Trademark Name</th>
                            <th>Owner Name</th>
                            <th>TM Types</th>
                            <th>Application Number</th>
                            <th>Agent Name</th>
                            <th>Local Mark</th>
                            <th>Foreign Mark</th>
                            <th>Filling Date</th>
                            <th>Last Updated</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js") }}
    {{ script("https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js") }}

    <script>
        function initializeDeleteButtons() {
            // Process data-method delete buttons
            $('[data-method="delete"]').each(function() {
                var $this = $(this);
                
                // Skip if already processed
                if ($this.data('delete-initialized')) {
                    return;
                }
                
                // Mark as processed
                $this.data('delete-initialized', true);
                
                // Handle click event for delete confirmation
                $this.on('click', function(e) {
                    e.preventDefault();
                    
                    var url = $(this).attr('href');
                    var cancelText = $(this).attr('data-trans-button-cancel') || 'Cancel';
                    var confirmText = $(this).attr('data-trans-button-confirm') || 'Delete';
                    var titleText = $(this).attr('data-trans-title') || 'Are you sure?';
                    
                    Swal.fire({
                        title: titleText,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: confirmText,
                        cancelButtonText: cancelText
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Create and submit form
                            var form = $('<form>', {
                                'method': 'POST',
                                'action': url
                            });
                            
                            form.append($('<input>', {
                                'type': 'hidden',
                                'name': '_method',
                                'value': 'DELETE'
                            }));
                            
                            form.append($('<input>', {
                                'type': 'hidden',
                                'name': '_token',
                                'value': $('meta[name="csrf-token"]').attr('content')
                            }));
                            
                            $('body').append(form);
                            form.submit();
                        }
                    });
                });
            });
        }

        // Initialize DataTable variable
        var clientTable;

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            clientTable = $('#client-table').DataTable({
                serverSide: true,
                processing: true,
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                ajax: {
                    url: '{!! route("admin.client.get") !!}',
                    type: 'post',
                    data: function(d) {
                        // Add search parameters to the request
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                        d.trademark_name = $('#trademark_name').val();
                        d.owner_id = $('#owner_id').val();
                        d.agent_id = $('#agent_id').val();
                    },
                    beforeSend: function() {
                        // Show loading overlay
                        $('#table-loading').show();
                        // Add loading state to search button if it was clicked
                        if ($('#search-btn').hasClass('btn-loading')) {
                            $('#search-btn').prop('disabled', true);
                        }
                    },
                    complete: function() {
                        // Hide loading overlay
                        $('#table-loading').hide();
                        // Remove loading state from search button
                        $('#search-btn').removeClass('btn-loading').prop('disabled', false);
                    },
                    error: function (xhr, err) {
                        $('#table-loading').hide();
                        $('#search-btn').removeClass('btn-loading').prop('disabled', false);
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id', responsivePriority: 2},
                    {data: 'main_code', name: 'main_code', responsivePriority: 10003},
                    {data: 'sub_code', name: 'sub_code', responsivePriority: 10004},
                    {data: 'trademark_name', name: 'trademark_name', responsivePriority: 1},
                    {data: 'owner_name', name: 'owner_name', responsivePriority: 3},
                    {data: 'tm_types_label', name: 'tm_types', orderable: true, responsivePriority: 10005},
                    {data: 'application_number', name: 'application_number', responsivePriority: 4},
                    {data: 'agent_name', name: 'agent_name', responsivePriority: 10006},
                    {data: 'local_mark', name: 'local_mark', responsivePriority: 10007},
                    {data: 'foreign_mark', name: 'foreign_mark', responsivePriority: 10008},
                    {data: 'filling_date_formatted', name: 'filling_date', orderable: true, responsivePriority: 5},
                    {data: 'updated_at', name: 'updated_at', responsivePriority: 10009},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, responsivePriority: 1}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                autoWidth: false,
                scrollX: false,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // Initialize tooltips
                    $('[data-toggle="tooltip"]').tooltip();
                    
                    // Initialize delete buttons for newly loaded DataTable content
                    initializeDeleteButtons();
                }
            });
            
            // Initialize delete buttons on page load
            initializeDeleteButtons();

            // Search button functionality
            $('#search-btn').on('click', function() {
                // Add loading state to button
                $(this).addClass('btn-loading');
                
                // Reload the DataTable
                clientTable.ajax.reload();
            });

            // Clear filters functionality
            $('#clear-btn').on('click', function() {
                // Clear all form fields
                $('#start_date').val('');
                $('#end_date').val('');
                $('#trademark_name').val('');
                $('#owner_id').val('');
                $('#agent_id').val('');
                
                // Show loading state
                $('#search-btn').addClass('btn-loading');
                
                // Reload the DataTable
                clientTable.ajax.reload();
            });

            // Allow Enter key to trigger search in text inputs
            $('#trademark_name').on('keypress', function(e) {
                if (e.which == 13) {
                    // Add loading state and trigger search
                    $('#search-btn').addClass('btn-loading');
                    clientTable.ajax.reload();
                }
            });
        });
    </script>
@endpush