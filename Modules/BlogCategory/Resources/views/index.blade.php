@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('blogcategory::labels.backend.blogcategory.management'))

@section('breadcrumb-links')
    @include('blogcategory::includes.breadcrumb-links')
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
                    {{ __('blogcategory::labels.backend.blogcategory.management') }} <small class="text-muted">{{ __('blogcategory::labels.backend.blogcategory.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('blogcategory::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="blogcategory-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('blogcategory::labels.backend.blogcategory.table.id') }}</th>
                            <th>{{ __('blogcategory::labels.backend.blogcategory.table.name') }}</th>
                            <th>{{ __('blogcategory::labels.backend.blogcategory.table.last_updated') }}</th>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#blogcategory-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.blogcategory.get") !!}',
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
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    load_plugins();
                }
            });
        });
    </script>
@endpush