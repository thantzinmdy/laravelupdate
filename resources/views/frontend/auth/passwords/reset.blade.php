@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')

    @include('frontend.includes.loginheader')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content pb-0">

        <div class="bg-gradient-primary py-32pt">
            <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
                <div class="flex">
                    <h1 class="text-white flex mb-0">Change Password</h1>
                    <p class="text-white-50 lead">Account Management</p>
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
                @include('includes.partials.messages')
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {{ html()->form('POST', route('frontend.auth.password.reset'))->class('col-sm-5 mx-auto')->open() }}
                    {{ html()->hidden('token', $token) }}
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
                    </div>
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                        {{ html()->password('password_confirmation')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                            ->required() }}

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-accent btn-lg">{{__('labels.frontend.passwords.reset_password_button')}}</button>
                    </div>
                </form>
            </div>
        </div>

        @include('frontend.includes.footer')

    </div>
    <!-- // END Header Layout Content -->
@endsection
