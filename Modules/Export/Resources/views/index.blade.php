@extends ('backend.layouts.app')

@section ('title', app_name() . ' | Export Data')

@section('breadcrumb-links')
    @include('export::includes.breadcrumb-links')
@endsection

@push('after-styles')
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
        
        .form-container {
            position: relative;
        }
        
        .preview-section {
            display: none;
            margin-top: 2rem;
        }
        
        .export-summary {
            background-color: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        
        .preview-table {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
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

        /* Responsive styles for export page */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.1rem;
                text-align: center;
            }
            
            .col-md-3, .col-md-4, .col-md-6 {
                margin-bottom: 1rem;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            .export-summary {
                font-size: 0.9rem;
                text-align: center;
            }
            
            .preview-table {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 0.4rem 0.2rem;
                font-size: 11px;
            }
        }
        
        @media (max-width: 576px) {
            .form-group label {
                font-size: 0.9rem;
            }
            
            .form-control {
                font-size: 14px;
            }
            
            .card-body {
                padding: 1rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="card-title mb-4 text-center">
                    <i class="fas fa-file-export"></i> Export Client Data
                    <small class="text-muted d-block">Export trademark data to Excel format</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="form-container">
            <div class="loading-overlay" id="form-loading">
                <div class="loading-spinner"></div>
            </div>

            <form id="export-form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Filling Date From:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">Filling Date To:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trademark_name">Trademark Name:</label>
                            <input type="text" class="form-control" id="trademark_name" name="trademark_name" placeholder="Search trademark name...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="owner_id">Owner Name:</label>
                            <select class="form-control" id="owner_id" name="owner_id">
                                <option value="">All Owners</option>
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agent_id">Agent Name:</label>
                            <select class="form-control" id="agent_id" name="agent_id">
                                <option value="">All Agents</option>
                                @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" id="preview-btn">
                            <span class="btn-text">
                                <i class="fas fa-eye"></i> Preview Data
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <button type="button" class="btn btn-success" id="export-btn" disabled>
                            <span class="btn-text">
                                <i class="fas fa-download"></i> Export to Excel
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Preview Section -->
            <div class="preview-section" id="preview-section">
                <div class="export-summary" id="export-summary">
                    <!-- Summary will be populated by JavaScript -->
                </div>
                
                <div class="preview-table">
                    <table class="table table-sm table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Main Code</th>
                                <th>Sub Code</th>
                                <th>Filling Date</th>
                                <th>Trademark Name</th>
                                <th>Owner Name</th>
                                <th>TM Types</th>
                                <th>Class</th>
                                <th>Application Number</th>
                                <th>Owner Address</th>
                                <th>Owner Phone</th>
                                <th>Agent Name</th>
                                <th>Local Mark</th>
                                <th>Foreign Mark</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody id="preview-table-body">
                            <!-- Preview data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Preview button click
            $('#preview-btn').on('click', function() {
                var $btn = $(this);
                $btn.addClass('btn-loading').prop('disabled', true);
                $('#form-loading').show();
                
                $.ajax({
                    url: '{{ route("admin.export.preview") }}',
                    type: 'POST',
                    data: $('#export-form').serialize(),
                    success: function(response) {
                        // Update summary
                        $('#export-summary').html(`
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><i class="fas fa-chart-bar"></i> Export Summary</h6>
                                    <p class="mb-0">Total Records: <strong>${response.total_records}</strong></p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <p class="mb-0 text-muted">Showing preview of first 10 records</p>
                                </div>
                            </div>
                        `);
                        
                        // Update preview table
                        var tableBody = $('#preview-table-body');
                        tableBody.empty();
                        
                        if (response.preview_data.length === 0) {
                            tableBody.append('<tr><td colspan="15" class="text-center text-muted">No data found with current filters</td></tr>');
                            $('#export-btn').prop('disabled', true);
                        } else {
                            response.preview_data.forEach(function(row) {
                                tableBody.append(`
                                    <tr>
                                        <td>${row.no}</td>
                                        <td>${row.main_code}</td>
                                        <td>${row.sub_code}</td>
                                        <td>${row.filling_date}</td>
                                        <td>${row.trademark_name}</td>
                                        <td>${row.owner_name}</td>
                                        <td>${row.tm_types}</td>
                                        <td>${row.class}</td>
                                        <td>${row.application_number}</td>
                                        <td>${row.owner_address}</td>
                                        <td>${row.owner_phone}</td>
                                        <td>${row.agent_name}</td>
                                        <td>${row.local_mark}</td>
                                        <td>${row.foreign_mark}</td>
                                        <td>${row.remark}</td>
                                    </tr>
                                `);
                            });
                            $('#export-btn').prop('disabled', false);
                        }
                        
                        $('#preview-section').show();
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message || 'An error occurred while previewing data.';
                        Swal.fire('Error', errorMessage, 'error');
                    },
                    complete: function() {
                        $btn.removeClass('btn-loading').prop('disabled', false);
                        $('#form-loading').hide();
                    }
                });
            });

            // Export button click
            $('#export-btn').on('click', function() {
                var $btn = $(this);
                $btn.addClass('btn-loading').prop('disabled', true);
                
                // Create a temporary form for file download
                var form = $('<form>', {
                    method: 'POST',
                    action: '{{ route("admin.export.download") }}',
                    style: 'display: none;'
                });
                
                // Add CSRF token
                form.append($('<input>', {
                    type: 'hidden',
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                }));
                
                // Add form data
                $('#export-form').serializeArray().forEach(function(field) {
                    if (field.name !== '_token') {
                        form.append($('<input>', {
                            type: 'hidden',
                            name: field.name,
                            value: field.value
                        }));
                    }
                });
                
                $('body').append(form);
                form.submit();
                form.remove();
                
                setTimeout(function() {
                    $btn.removeClass('btn-loading').prop('disabled', false);
                }, 2000);
            });

            // Form field change event
            $('#export-form input, #export-form select').on('change', function() {
                $('#preview-section').hide();
                $('#export-btn').prop('disabled', true);
            });
        });
    </script>
@endpush