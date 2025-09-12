@extends ('backend.layouts.app')

@section ('title', __('client::labels.backend.client.management'))

@section('breadcrumb-links')
    @include('client::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('client::labels.backend.client.management') }}
                    <small class="text-muted">{{ __('client::labels.backend.client.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Main Code:</th>
                            <td>{{ $client->main_code }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sub Code:</th>
                            <td>{{ $client->sub_code }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Filling Date:</th>
                            <td>{{ $client->filling_date ? $client->filling_date->format('Y-m-d') : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Trademark Name:</th>
                            <td>{{ $client->trademark_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Owner Name:</th>
                            <td>{{ $client->owner_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">TM Types:</th>
                            <td>{{ $client->tm_types_label }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Class:</th>
                            <td>{{ $client->class }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Application Number:</th>
                            <td>{{ $client->application_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Owner Address:</th>
                            <td>{{ $client->owner_address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Owner Phone:</th>
                            <td>{{ $client->owner_phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Agent Name:</th>
                            <td>{{ $client->agent_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Local Mark:</th>
                            <td>{{ $client->local_mark }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Foreign Mark:</th>
                            <td>{{ $client->foreign_mark }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Remark:</th>
                            <td>{{ $client->remark }}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('client::labels.backend.client.table.created') }}:</strong> {{ $client->updated_at->timezone(get_user_timezone()) }} ({{ $client->created_at->diffForHumans() }}),
                    <strong>{{ __('client::labels.backend.client.table.last_updated') }}:</strong> {{ $client->created_at->timezone(get_user_timezone()) }} ({{ $client->updated_at->diffForHumans() }})
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