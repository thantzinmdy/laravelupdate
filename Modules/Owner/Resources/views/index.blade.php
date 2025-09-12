@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('owner::labels.backend.owner.management'))

@section('breadcrumb-links')
    @include('owner::includes.breadcrumb-links')
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
                    {{ __('owner::labels.backend.owner.management') }} <small class="text-muted">{{ __('owner::labels.backend.owner.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('owner::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
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
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js") }}
    {{ script("js/plugin/datatables/dataTables-extend.js") }}

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
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // Initialize tooltips
                    $('[data-toggle="tooltip"]').tooltip();
                    
                    // Initialize delete buttons for newly loaded DataTable content
                    initializeDeleteButtons();
                    
                    load_plugins();
                }
            });
        });
    </script>
@endpush