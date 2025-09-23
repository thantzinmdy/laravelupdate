@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('appsetting::labels.backend.appsetting.management'))

@section('breadcrumb-links')
    @include('appsetting::includes.breadcrumb-links')
@endsection

@push('after-styles')
{{ style('assets/plugins/select2/css/select2.min.css') }}
{{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('appsetting::labels.backend.appsetting.management') }}
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#basic_setting" role="tab" aria-controls="basic_setting" aria-selected="true">
                        <i class="icon-settings"></i>{{ __('appsetting::labels.backend.appsetting.basic.basic_setting') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#email_setting" role="tab" aria-controls="email_setting" aria-selected="true">
                        <i class="icon-envelope"></i>{{ __('appsetting::labels.backend.appsetting.basic.email') }}</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="basic_setting" role="tabpanel">
                        {{ html()->form('POST', route('admin.appsetting.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                            {!! html()->hidden('tab','basic') !!}

                            <div class="form-group row {{ $errors->has('main_logo') ? ' has-error' : '' }}">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.main_logo'))->class('col-md-3 form-control-label')->for('main_logo') }}
                             
                                <div class="col-md-9">
                                    <input type="file" value="{{ config('appsetting.basic.main_logo') }}" id="main_logo" name="main_logo" class="form-control"><br>
                                    @if(config('appsetting.basic.main_logo'))
                                        <img src="{{ config('appsetting.basic.main_logo') }}" class="thumbnail"  style="width: 200px; height: 150px;">
                                    @endif
                                </div>
                            </div><br><br>
                              
                        
                            <div class="form-group row {{ $errors->has('app_favicon') ? ' has-error' : '' }}">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.fav_icon'))->class('col-md-3 form-control-label')->for('fav_icon') }}
                                <div class="col-md-9">
                                    <input type="file" value="{{ config('appsetting.basic.favicon') }}" id="app_favicon" name="app_favicon" class="form-control"><br>
                                    @if(config('appsetting.basic.favicon'))
                                        <img src="{{ config('appsetting.basic.favicon') }}" class="thumbnail"  style="width: 200px; height: 150px;">
                                    @endif
                                </div>  
                            </div><br><br>


                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.appstore').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('appstore') }}
                                <div class="col-md-9">
                                    {{ html()->text('appstore')->value(config('appsetting.basic.appstore'))->class('form-control')->id('appstore') }}
                                </div>
                            </div>
                            
                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.playstore').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('playstore') }}
                                <div class="col-md-9">
                                    {{ html()->text('playstore')->value(config('appsetting.basic.playstore'))->class('form-control')->id('playstore') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.youtubedemo').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('youtubedemo') }}
                                <div class="col-md-9">
                                    {{ html()->text('youtubedemo')->value(config('appsetting.basic.youtubedemo'))->class('form-control')->id('youtubedemo') }}
                                </div>
                            </div>


                            <div class="form-group row form-md-line-input">
                            
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.app_name'))->class('col-md-3 form-control-label')->for('app_name') }}
                                <div class="col-md-9">
                                    {{-- <input type="text" value="{{ config('appsetting.basic.name') }}" id="app_name" name="app_name" class="form-control"><br> --}}
                                    {{ html()->text('app_name')->value(config('appsetting.basic.name'))->class('form-control')->id('app_name') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.facebook_link'))->class('col-md-3 form-control-label')->for('facebook_link') }}
                                <div class="col-md-9">
                                    {{ html()->text('facebook')->value(config('appsetting.basic.facebook'))->class('form-control')->id('facebook') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.app_email'))->class('col-md-3 form-control-label')->for('app_email') }}
                                <div class="col-md-9">
                                    {{ html()->text('app_email')->value(config('appsetting.basic.email'))->class('form-control')->id('app_email') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.phone_number'))->class('col-md-3 form-control-label')->for('phone_number') }}
                                <div class="col-md-9">
                                    {{ html()->text('app_phone')->value(config('appsetting.basic.phone'))->class('form-control')->id('app_phone') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.address'))->class('col-md-3 form-control-label')->for('address') }}
                                <div class="col-md-9">
                                    {{ html()->textarea('app_address')->value(config('appsetting.basic.address'))->class('form-control')->id('app_address') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.google_map_api').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('google_map_api') }}
                                <div class="col-md-9">
                                    {{ html()->text('google_map')->value(config('appsetting.basic.map_key'))->class('form-control')->id('google_map') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.meta_keywords').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('meta_keywords') }}
                                <div class="col-md-9">
                                    {{ html()->textarea('meta_keywords')->value(config('appsetting.basic.meta_keywords'))->class('form-control')->id('meta_keywords') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.meta_description').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('meta_description') }}
                                <div class="col-md-9">
                                    {{ html()->textarea('meta_description')->value(config('appsetting.basic.meta_description'))->class('form-control')->id('meta_description') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.date_format').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('date_format') }}
                                <div class="col-md-9">
                                  <select name="date_format" id="date_format" class="form-control select2">
                                      @foreach(config('appsetting.date_format_list') as $key => $value)
                                       <option value="{{ $key }}" {{ ($key == config('appsetting.basic.date_format'))?'selected':'' }}>{{ ucfirst($value) }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.time_format').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('time_format') }}
                                <div class="col-md-9">
                                  <select name="time_format" id="time_format" class="form-control select2">
                                      @foreach(config('appsetting.time_format_list') as $key => $value)
                                       <option value="{{ $key }}" {{ ($key == config('appsetting.basic.time_format'))?'selected':'' }}>{{ ucfirst($value) }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.datetime_format').'<span class="text-danger">*</span>')->class('col-md-3 form-control-label')->for('datetime_format') }}
                                <div class="col-md-9">
                                  <select name="datetime_format" id="datetime_format" class="form-control select2">
                                      @foreach(config('appsetting.datetime_format_list') as $key => $value)
                                       <option value="{{ $key }}" {{ ($key == config('appsetting.basic.datetime_format'))?'selected':'' }}>{{ ucfirst($value) }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col text-right">
                                        {{ form_submit(__('buttons.general.crud.update')) }}
                                    </div><!--row-->
                                </div><!--row-->
                            </div><!--card-footer-->

                        {{ html()->closeModelForm() }}
                    </div>

                    <div class="tab-pane show" id="email_setting" role="tabpanel">
                        {{ html()->form('POST', route('admin.appsetting.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                            {!! html()->hidden('tab','email') !!}
                            <div class="mb-5">
                                <div class="card card-accent-primary">
                                    @include('appsetting::includes.email')
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col text-right">
                                        {{ form_submit(__('buttons.general.crud.update')) }}
                                    </div><!--row-->
                                </div><!--row-->
                            </div><!--card-footer-->
                        {{ html()->closeModelForm() }}
                    </div>

                </div>

            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
{{ script('assets/plugins/select2/js/select2.full.min.js')}}
{{ script("assets/plugins/select2/component/components-select2.js") }}
<script type="text/javascript">
    $(".select2, .select2-multiple").select2({
        placeholder: 'Choose',
        width: '100%'
    });
</script>
@endpush