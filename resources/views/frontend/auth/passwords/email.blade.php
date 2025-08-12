@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')
    @include('frontend.includes.loginheader')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content pb-0">

        <div class="bg-gradient-primary py-32pt">
            <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
                <div class="flex">
                    <h1 class="text-white flex mb-0">Reset Password</h1>
                    <p class="lead text-white-50">Account Management</p>
                </div>
                <p class="d-sm-none"></p>
                <a href="javascript:;" class="btn btn-outline-white flex-column">
                    Need Help?
                    <span class="btn__secondary-text">Contact us</span>
                </a>
            </div>
        </div>
       
        <div class="page-section bg-white">
            <div class="container page__container">
                <div class="col-sm-6 mx-auto">
                    
                    <div class="alert alert-light border-1 border-left-3 border-left-accent d-flex mb-24pt" role="alert">
                        <i class="material-icons text-accent mr-3">check_circle</i>
                        <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
                    </div>
                    @include('includes.partials.messages')
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <form action="change-password.html"> -->
                    {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}

                        <div class="form-group">
                            <!-- <label>Email:</label> -->
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}
                            <!-- <input type="text" class="form-control" placeholder="Your email address ..."> -->
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                            <small class="form-text text-muted">We will email you with info on how to reset your password.</small>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-accent btn-lg">Reset</button>
                        </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>

        @include('frontend.includes.footer')

    </div>
    <!-- // END Header Layout Content -->
@endsection
