@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('client::labels.backend.client.management'))

@section('breadcrumb-links')
    @include('client::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css") }}
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

        <div class="row mt-4">
            <div class="col">
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
                            <th>Local Mark</th>
                            <th>Foreign Mark</th>
                            <th>Filling Date</th>
                            <th>Last Updated</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js") }}

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
            $('#client-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.client.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'main_code', name: 'main_code'},
                    {data: 'sub_code', name: 'sub_code'},
                    {data: 'trademark_name', name: 'trademark_name'},
                    {data: 'owner_name', name: 'owner_name'},
                    {data: 'tm_types_label', name: 'tm_types', orderable: true},
                    {data: 'application_number', name: 'application_number'},
                    {data: 'local_mark', name: 'local_mark'},
                    {data: 'foreign_mark', name: 'foreign_mark'},
                    {data: 'filling_date_formatted', name: 'filling_date', orderable: true},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // Initialize tooltips
                    $('[data-toggle="tooltip"]').tooltip();
                    
                    // Initialize delete buttons for newly loaded DataTable content
                    initializeDeleteButtons();
                }
            });
            
            // Initialize delete buttons on page load
            initializeDeleteButtons();
        });
    </script>
@endpush