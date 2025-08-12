@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
    @include('frontend.includes.loginheader')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content pb-0">
        <div class="bg-gradient-primary py-32pt">
            <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                <img src="assets/images/illustration/student/128/white.svg" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                <div class="flex mb-32pt mb-md-0">
                    <h1 class="text-white mb-0">Sign In</h1>
                    <p class="lead measure-lead text-white-50">Account Management</p>
                </div>
                <a href="{{route('frontend.auth.register')}}" class="btn btn-outline-white flex-column">
                    Don't have an account?
                    <span class="btn__secondary-text">Sign up Today!</span>
                </a>
            </div>
        </div>
        
        <div class="bg-white pt-32pt pt-sm-64pt pb-32pt">
            <div class="container page__container"> 
                <div class="col-sm-6 mx-auto">
                    @include('includes.partials.messages')
                </div>
                {{ html()->form('POST', route('frontend.auth.login.post'))->class('col-md-5 p-0 mx-auto')->open() }}
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}
                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div>
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}
                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password'))
                            ->required() }}
                        <p class="text-right"><a href="{{ route('frontend.auth.password.reset') }}" class="small">Forgot your password?</a></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-accent">Login</button>
                    </div>
                {{ html()->form()->close() }}
            </div>
        </div>

        @include('frontend.includes.footer')
    </div>
    <!-- // END Header Layout Content -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
