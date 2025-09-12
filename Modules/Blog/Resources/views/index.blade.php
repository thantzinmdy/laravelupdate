@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('blog::labels.backend.blog.management'))

@section('breadcrumb-links')
    @include('blog::includes.breadcrumb-links')
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
                    {{ __('blog::labels.backend.blog.management') }} <small class="text-muted">{{ __('blog::labels.backend.blog.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('blog::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="blog-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('blog::labels.backend.blog.table.id') }}</th>
                            <th>{{ __('blog::labels.backend.blog.table.author_name') }}</th>
                            <th>{{ __('blog::labels.backend.blog.table.title') }}</th>
                            <th>{{ __('blog::labels.backend.blog.table.status') }}</th>
                            <th>{{ __('blog::labels.backend.blog.table.last_updated') }}</th>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#blog-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.blog.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'author_name', name: 'author_name'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // Initialize tooltips and other plugins
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });
    </script>
@endpush