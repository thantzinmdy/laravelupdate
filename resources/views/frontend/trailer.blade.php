@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content pb-0">
            <div class="navbar navbar-submenu navbar-light border-0 navbar-expand">
                <div class="container">
                    <div class="media flex-nowrap">
                        <div class="media-left mr-16pt">
                            <a href="course.html"><img src="{{ asset('uploads/'.$courseDetail->image) }}" width="40" alt="Angular" class="rounded"></a>
                        </div>
                        <div class="media-body">
                            <a href="course.html" class="card-title text-body mb-0">{{ $courseDetail->title }}</a>
                            <p class="lh-1 d-flex align-items-center mb-0">
                                <span class="text-50 small font-weight-bold mr-8pt">{{ $courseDetail->instructor->name }}</span>
                                <span class="text-50 small">{{ $courseDetail->instructor->bio }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-primary pb-lg-64pt py-32pt">
                <div class="container">
                    <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
                        <div class="player embed-responsive-item">
                            <div class="player__content">
                                <div class="player__image" style="--player-image: url('{{ asset('uploads/'.$courseDetail->thumbnail_image) }}')"></div>
                                <a href="" class="player__play">
                                    <span class="material-icons">play_arrow</span>
                                </a>
                            </div>
                            <div class="player__embed d-none">
                                <iframe class="embed-responsive-item" src="{{ asset('uploads/'.$courseDetail->thumbnail_video) }}" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                        <a href="{{ $courseDetail->course_code ? route('frontend.course', ['course_code' => $courseDetail->course_code]) : '#' }}" class="btn btn-white">Back To Course</a>
                    </div>
                </div>
            </div>

            <div class="navbar navbar-expand-sm navbar-submenu navbar-light navbar-list p-0 m-0 align-items-center">
                <div class="container page__container">
                    <ul class="nav navbar-nav flex align-items-sm-center">
                        <li class="nav-item navbar-list__item">
                            <div class="media align-items-center">
                                <span class="media-left mr-16pt">
                                    <img src="{{ asset('uploads/'.$courseDetail->instructor->image) }}" width="40" alt="avatar" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <a class="card-title m-0" href="instructor-profile.html">{{ $courseDetail->instructor->name }}</a>
                                    <p class="text-50 lh-1 mb-0">Instructor</p>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item navbar-list__item">
                            <i class="material-icons text-muted icon--left">schedule</i>
                            2h 46m
                        </li>
                        <li class="nav-item navbar-list__item">
                            <i class="material-icons text-muted icon--left">assessment</i>
                            {{ $courseDetail->difficulty }}
                        </li>
                        <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                            <div class="rating rating-24">
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                            </div>
                            <p class="lh-1 mb-0"><small class="text-muted">20 ratings</small></p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="page-section bg-gradient-purple border-top-2">
                <div class="container page__container p-0-xs">
                    <div class="row col-lg-9 mx-auto">
                        <div class="col-sm-6 text-center d-flex flex-column justify-content-center">
                            <h4 class="text-white mb-8pt">Unlock Library</h4>
                            <p class="text-white-70 mb-24pt mb-sm-0">Get access to 1.000+ lessons taught by industry experts.</p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column align-items-center justify-content-center">
                            <a href="pricing.html" class="btn btn-outline-white mb-8pt">Watch all courses for $9/mo</a>
                            <p class="text-white-70 mb-0">Have an account? <a href="login.html" class="text-white text-underline">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- // END Header Layout Content -->

        
        @include('frontend.includes.footer')
    </div>
@endsection