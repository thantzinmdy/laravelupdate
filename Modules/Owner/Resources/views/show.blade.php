@extends ('backend.layouts.app')

@section ('title', __('owner::labels.backend.owner.management'))

@section('breadcrumb-links')
    @include('owner::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('owner::labels.backend.owner.management') }}
                    <small class="text-muted">{{ __('owner::labels.backend.owner.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    <label class="col-md-2 form-control-label">{{ __('owner::labels.backend.owner.table.name') }}:</label>
                    <div class="col-md-10">
                        <p class="form-control-plaintext">{{ $owner->name }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label">{{ __('owner::labels.backend.owner.table.description') }}:</label>
                    <div class="col-md-10">
                        <p class="form-control-plaintext">{{ $owner->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('owner::labels.backend.owner.table.created') }}:</strong> {{ $owner->updated_at->timezone(get_user_timezone()) }} ({{ $owner->created_at->diffForHumans() }}),
                    <strong>{{ __('owner::labels.backend.owner.table.last_updated') }}:</strong> {{ $owner->created_at->timezone(get_user_timezone()) }} ({{ $owner->updated_at->diffForHumans() }})
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