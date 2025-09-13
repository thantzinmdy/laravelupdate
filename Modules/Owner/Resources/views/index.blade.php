@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('owner::labels.backend.owner.management'))

@section('breadcrumb-links')
    @include('owner::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css") }}
    {{ style("https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css") }}
    <style>
        /* Responsive styles */
        .table-container {
            position: relative;
            overflow-x: auto;
        }
        
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
            
            #owner-table {
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
            
            #owner-table {
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
                    {{ __('owner::labels.backend.owner.management') }} <small class="text-muted">{{ __('owner::labels.backend.owner.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('owner::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="owner-table" class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('owner::labels.backend.owner.table.id') }}</th>
                                <th>{{ __('owner::labels.backend.owner.table.name') }}</th>
                                <th>{{ __('owner::labels.backend.owner.table.description') }}</th>
                                <th>{{ __('owner::labels.backend.owner.table.last_updated') }}</th>
                                <th>{{ __('owner::labels.backend.owner.table.created') }}</th>
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

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#owner-table').DataTable({
                serverSide: true,
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                ajax: {
                    url: '{!! route("admin.owner.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id', responsivePriority: 2},
                    {data: 'name', name: 'name', responsivePriority: 1},
                    {data: 'description', name: 'description', responsivePriority: 4},
                    {data: 'updated_at', name: 'updated_at', responsivePriority: 5},
                    {data: 'created_at', name: 'created_at', responsivePriority: 6},
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
        });
    </script>
@endpush