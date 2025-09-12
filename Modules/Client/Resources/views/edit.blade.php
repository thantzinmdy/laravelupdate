@extends ('backend.layouts.app')

@section ('title', __('client::labels.backend.client.management') . ' | ' . __('client::labels.backend.client.edit'))

@section('breadcrumb-links')
    @include('client::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
{{ html()->modelForm($client, 'PATCH', route('admin.client.update', $client->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('client::labels.backend.client.management') }}
                        <small class="text-muted">{{ __('client::labels.backend.client.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label('Main Code')->class('col-md-2 form-control-label')->for('main_code') }}
                        <div class="col-md-10">
                            {{ html()->text('main_code')->class('form-control')->placeholder('Main Code') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Sub Code')->class('col-md-2 form-control-label')->for('sub_code') }}
                        <div class="col-md-10">
                            {{ html()->text('sub_code')->class('form-control')->placeholder('Sub Code') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Filling Date *')->class('col-md-2 form-control-label')->for('filling_date') }}
                        <div class="col-md-10">
                            {{ html()->date('filling_date')->class('form-control')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Trademark Name')->class('col-md-2 form-control-label')->for('trademark_name') }}
                        <div class="col-md-10">
                            {{ html()->text('trademark_name')->class('form-control')->placeholder('Trademark Name') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Owner Name *')->class('col-md-2 form-control-label')->for('owner_name') }}
                        <div class="col-md-10">
                            {{ html()->text('owner_name')->class('form-control')->placeholder('Owner Name')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('TM Types')->class('col-md-2 form-control-label')->for('tm_types') }}
                        <div class="col-md-10">
                            {{ html()->select('tm_types', ['' => 'Select TM Type'] + \Modules\Client\Enums\TMTypes::getAll())->class('form-control') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Class')->class('col-md-2 form-control-label')->for('class') }}
                        <div class="col-md-10">
                            {{ html()->text('class')->class('form-control')->placeholder('Class') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Application Number *')->class('col-md-2 form-control-label')->for('application_number') }}
                        <div class="col-md-10">
                            {{ html()->text('application_number')->class('form-control')->placeholder('Application Number')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Owner Address')->class('col-md-2 form-control-label')->for('owner_address') }}
                        <div class="col-md-10">
                            {{ html()->textarea('owner_address')->class('form-control')->placeholder('Owner Address') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Owner Phone')->class('col-md-2 form-control-label')->for('owner_phone') }}
                        <div class="col-md-10">
                            {{ html()->text('owner_phone')->class('form-control')->placeholder('Owner Phone') }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Agent Name *')->class('col-md-2 form-control-label')->for('agent_name') }}
                        <div class="col-md-10">
                            {{ html()->text('agent_name')->class('form-control')->placeholder('Agent Name')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Local Mark *')->class('col-md-2 form-control-label')->for('local_mark') }}
                        <div class="col-md-10">
                            {{ html()->select('local_mark', ['' => 'Select Option', 'Yes' => 'Yes', 'No' => 'No'])->class('form-control')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Foreign Mark *')->class('col-md-2 form-control-label')->for('foreign_mark') }}
                        <div class="col-md-10">
                            {{ html()->select('foreign_mark', ['' => 'Select Option', 'Yes' => 'Yes', 'No' => 'No'])->class('form-control')->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label('Remark')->class('col-md-2 form-control-label')->for('remark') }}
                        <div class="col-md-10">
                            {{ html()->textarea('remark')->class('form-control')->placeholder('Remark') }}
                        </div>
                    </div>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.client.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')

<script>


</script>
@endpush