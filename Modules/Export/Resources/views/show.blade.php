@extends ('backend.layouts.app')

@section ('title', __('export::labels.backend.export.management'))

@section('breadcrumb-links')
    @include('export::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('export::labels.backend.export.management') }}
                    <small class="text-muted">{{ __('export::labels.backend.export.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('export::labels.backend.export.table.created') }}:</strong> {{ $export->updated_at->timezone(get_user_timezone()) }} ({{ $export->created_at->diffForHumans() }}),
                    <strong>{{ __('export::labels.backend.export.table.last_updated') }}:</strong> {{ $export->created_at->timezone(get_user_timezone()) }} ({{ $export->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush