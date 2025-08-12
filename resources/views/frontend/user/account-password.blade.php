@extends('frontend.layouts.app')

@section('content')
    <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">
            @include('frontend.includes.student-subheader')
            <div class="container page__container">
                {{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
                    <div class="row">
                        <div class="col-lg-9">
                            @include('includes.partials.messages')
                            <div class="page-section">
                                <h4>Change Password</h4>

                               <!--  <div class="alert alert-light border-1 border-left-3 border-left-accent d-flex mb-24pt" role="alert">
                                    <i class="material-icons text-accent mr-3">check_circle</i>
                                    <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
                                </div> -->

                                <div class="list-group list-group-form">
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{__('validation.attributes.frontend.old_password')}}<span class="text-danger">*</span></label> 
                                            <div class="col-sm-9">
                                                {{ html()->password('old_password')
                                                    ->class('form-control')
                                                    ->placeholder(__('validation.attributes.frontend.old_password'))
                                                    ->autofocus()
                                                    ->required() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{__('validation.attributes.frontend.password')}}<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                {{ html()->password('password')
                                                    ->class('form-control')
                                                    ->placeholder(__('validation.attributes.frontend.password'))
                                                    ->required() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{__('validation.attributes.frontend.password_confirmation')}}<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                {{ html()->password('password_confirmation')
                                                    ->class('form-control')
                                                    ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                                    ->required() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 page-nav">
                            <div class="page-section pt-lg-112pt">
                                <nav class="nav page-nav__menu">
                                    <a class="nav-link" href="{{ route('frontend.user.account') }}">Basic Information</a>
                                    <a class="nav-link active" href="student-edit-account-password.html">Change Password</a>
                                </nav>
                                <div class="page-nav__content">
                                    <button type="submit" class="btn btn-accent">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {{ html()->form()->close() }}
            </div>

            @include('frontend.includes.footer')
        </div>
        <!-- // END Header Layout Content -->
@endsection
