@extends ('backend.layouts.app')

@section ('title', __('agent::labels.backend.agent.management'))

@section('breadcrumb-links')
    @include('agent::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('agent::labels.backend.agent.management') }}
                    <small class="text-muted">{{ __('agent::labels.backend.agent.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    <label class="col-md-2 form-control-label">{{ __('agent::labels.backend.agent.table.name') }}:</label>
                    <div class="col-md-10">
                        <p class="form-control-plaintext">{{ $agent->name }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label">{{ __('agent::labels.backend.agent.table.description') }}:</label>
                    <div class="col-md-10">
                        <p class="form-control-plaintext">{{ $agent->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('agent::labels.backend.agent.table.created') }}:</strong> {{ $agent->updated_at->timezone(get_user_timezone()) }} ({{ $agent->created_at->diffForHumans() }}),
                    <strong>{{ __('agent::labels.backend.agent.table.last_updated') }}:</strong> {{ $agent->created_at->timezone(get_user_timezone()) }} ({{ $agent->updated_at->diffForHumans() }})
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