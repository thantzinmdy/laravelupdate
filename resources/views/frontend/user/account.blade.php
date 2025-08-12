@extends('frontend.layouts.app')

@section('content')
    <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">
            @include('frontend.includes.student-subheader')
            <div class="container page__container">
                <!-- <form action="student-edit-account.html"> -->
                {{ html()->modelForm($logged_in_user, 'POST', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-9">
                            @include('includes.partials.messages')
                            <div class="page-section">
                                <h4>Basic Information</h4>
                                <div class="list-group list-group-form">
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('student::labels.backend.student.table.name') }}<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" value="{{$logged_in_user->student->name}}" placeholder="Your first name ..." required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('labels.backend.access.users.table.email') }}<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" value="{{$logged_in_user->email}}" placeholder="Your email address ..." disabled="disabled">
                                                <small class="form-text text-muted">Note that if you want to change your email, please contact us.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('student::labels.backend.student.table.mobile') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobile" class="form-control" value="{{$logged_in_user->student->mobile}}" placeholder="Your mobile number ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('student::labels.backend.student.table.gender') }}</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="gender">
                                                    <option value="">Choose</option>
                                                    <option value="male" @if($logged_in_user->student->gender =='male') selected @endif>Male</option>
                                                    <option value="female" @if($logged_in_user->student->gender =='female') selected @endif>Female</option>
                                                    <option value="other" @if($logged_in_user->student->gender =='other') selected @endif>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('student::labels.backend.student.table.address') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control" value="{{$logged_in_user->student->address}}" placeholder="Your address ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">{{ __('student::labels.backend.student.table.city') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="city" class="form-control" value="{{$logged_in_user->student->city}}" placeholder="Your city ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-3">Your photo</label>
                                            <div class="col-sm-9 media align-items-center">
                                                <a href="javascript:;" class="media-left mr-16pt">
                                                    @if($logged_in_user->student->image)
                                                    <img src="{{asset('uploads/'.$logged_in_user->student->image) }}" alt="people" width="56" class="rounded-circle" />
                                                    @endif
                                                </a>
                                                <div class="media-body">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 page-nav">
                            <div class="page-section pt-lg-112pt">
                                <nav class="nav page-nav__menu">
                                    <a class="nav-link active" href="{{ route('frontend.user.account') }}">Basic Information</a>
                                    <a class="nav-link" href="{{ route('frontend.user.account-password') }}">Change Password</a>
                                </nav>
                                <div class="page-nav__content">
                                    <button type="submit" class="btn btn-accent">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {{ html()->closeModelForm() }}
            </div>
            @include('frontend.includes.footer')
        </div>
        <!-- // END Header Layout Content -->
@endsection
