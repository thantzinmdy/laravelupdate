@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')
    @include('frontend.includes.loginheader')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content pb-0">
        <div class="py-64pt bg-gradient-primary">
            <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                <img src="{{asset('assets/images/illustration/student/128/white.svg') }}" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                <div class="flex mb-32pt mb-md-0">
                    <h1 class="text-white mb-8pt">Sign Up</h1>
                    <p class="lead measure-lead text-white-50">Change your future today with over 1000 professional courses from the top industry leading teachers and professionals.</p>
                </div>
                <a href="javascript:;" class="btn btn-outline-white flex-column">
                    Questions?
                    <span class="btn__secondary-text">Visit our Help Center</span>
                </a>
            </div>
        </div>

       
        <div class="bg-white py-32pt py-lg-64pt">
            <div class="container page__container">
                 @include('includes.partials.messages')
                <div class="col-lg-10 p-0 mx-auto">
                    <div class="row">
                        <div class="col-md-6 mb-24pt mb-md-0">
                            {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191)
                                        ->required()}}
                                </div>
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                                <div class="form-group mb-24pt">
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div>
                                <div class="form-group mb-24pt">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div>
                                <button class="btn btn-lg btn-accent">Create account</button>
                            {{ html()->form()->close() }}
                        </div>
             
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.includes.footer')
    </div>
    <!-- // END Header Layout Content -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
