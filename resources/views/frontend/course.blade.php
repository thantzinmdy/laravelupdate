@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content pb-0">

            <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
                <div class="mdk-box__content">
                    <div class="hero py-64pt text-center text-sm-left">
                        <div class="container">
                            <h1 class="text-white">{{ $courseDetail->title }}</h1>
                            <p class="lead text-white-50 measure-hero-lead">{!! $courseDetail->description !!}</p>
                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                                <a href="{{ $courseDetail->course_code ? route('frontend.trailer', ['course_code' => $courseDetail->course_code]) : '#' }}" class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                            </div>
                        </div>
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
                            {{ $courseDetail->duration }} Month
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

            <div class="page-section border-bottom-2">
                <div class="container page__container">

                    <h4>Table of Contents</h4>
                    <div class="card-group card-group--lg-up mb-0">
                        <div class="card col-lg-7 p-0">


                            <ul class="accordion accordion--boxed js-accordion list-group-flush" id="course-toc">
                                @foreach($courseDetail->lessons as $index => $lesson)
                                <li class="accordion__item">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc" href="#course-toc-{{ $index }}">
                                        <span class="flex">{{ $lesson->title }}</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu">
                                        <ul class="list-unstyled collapse" id="course-toc-{{ $index }}">
                                            @foreach($lesson->materials as $material)
                                            <li class="accordion__menu-link active">
                                                @if($enrollment)
                                                    <span class="material-icons icon-16pt icon--left text-muted">
                                                    @if($material->type == 'video')
                                                    ondemand_video
                                                    @else
                                                    assignment
                                                    @endif
                                                    </span>
                                                    <a class="flex" href="{{ $courseDetail->course_code && $material->material_code ? route('frontend.lesson', ['course_code' => $courseDetail->course_code,'lesson_code'=>$lesson->lesson_code,'material_code' => $material->material_code,]) : '#' }}">{{ $material->title }}</a>
                                                @else
                                                    <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                    <a class="flex" href="javascript:;">{{ $material->title }}</a>
                                                @endif
                                                <span class="text-muted">{{ $material->video_duration }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                                <!-- <li class="accordion__item open">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc" href="#course-toc-100">
                                        <span class="flex">Course Overview</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu">
                                        <ul class="list-unstyled collapse show" id="course-toc-100">
                                            <li class="accordion__menu-link active">
                                                <span class="material-icons icon-16pt icon--left text-primary">play_circle_outline</span>
                                                <a class="flex" href="lesson.html">Watch Trailer</a>
                                                <span class="text-muted">1m 10s</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="accordion__item open">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc" href="#course-toc-2">
                                        <span class="flex">Getting Started with Angular</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu">
                                        <ul class="list-unstyled collapse show" id="course-toc-2">
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                <a class="flex" href="lesson.html">Introduction</a>
                                                <span class="text-muted">8m 42s</span>
                                            </li>
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                <a class="flex" href="lesson.html">Introduction to TypeScript</a>
                                                <span class="text-muted">50m 13s</span>
                                            </li>
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                <a class="flex" href="lesson.html">Comparing Angular to AngularJS</a>
                                                <span class="text-muted">12m 10s</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="accordion__item">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc" href="#course-toc-3">
                                        <span class="flex">Creating and Communicating Between Angular Components</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu">
                                        <ul class="list-unstyled collapse" id="course-toc-3">
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                <a class="flex" href="lesson.html">Angular Components</a>
                                                <span class="text-muted">04:23</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="accordion__item">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc" href="#course-toc-4">
                                        <span class="flex">Exploring the Angular Template Syntax</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu">
                                        <ul class="list-unstyled collapse" id="course-toc-4">
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                                <a class="flex" href="lesson.html">Template Syntax</a>
                                                <span class="text-muted">04:23</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li> -->
                            </ul>

                        </div>
                        <div class="card col-lg-5 p-0 mb-0 justify-content-center border-left-lg">
                            <div class="card-body flex-0 text-center">
                                <div>
                                    <i class="material-icons text-muted">timer</i>
                                </div>
                                <h4 class="my-8pt"><strong>Unlock All Videos</strong></h4>
                                <p class="text-70 mb-24pt">Get access to all videos in the library</p>
                                @if(!$enrollment)
                                <a href="javascript:;" class="btn btn-outline-primary mb-8pt" id="enrollmentRequest">Get started</a>
                                @endif
                                @if(!auth()->user())
                                <p>Have an account? <a href="{{route('frontend.auth.login')}}">Login</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white">


                <div class="page-separator-mask page-section pb-0 js-read-more">
                    <div class="container page__container">
                        <div class="row">
                            <div class="col-md-7">
                                <h4>About this course</h4>
                                <p class="text-70">{{ $courseDetail->prerequisites }}</p>
                            </div>
                            <div class="col-md-5">
                                <h4>What you’ll learn</h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Fundamentals of working with Angular</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Create complete Angular applications</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Working with the Angular CLI</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Understanding Dependency Injection</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Testing with Angular</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Testing with Angular</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Testing with Angular</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-separator-mask__content">
                        <div class="page-separator-mask__top"></div>
                        <div class="page-separator-mask__bottom"></div>
                        <div class="page-separator">
                            <a href="#" class="page-separator__text link-text">read more <i class="material-icons">keyboard_arrow_down</i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="page-section bg-white border-bottom-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mb-24pt mb-md-0">
                            <h4>About the author</h4>
                            <p class="text-70 mb-24pt">{{ $courseDetail->instructor->bio }}</p>
                            <!-- <p class="text-70 mb-24pt">Eddie Bryan is a software developer at LearnD*ash. With more than 20 years o*f software development experience, he has gained a passion for Agile software development -- especially Lean.</p> -->

                            <h4>More from the author</h4>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-0">
                                    <a href="" class="d-block mb-4pt">Angular Best Practices</a>
                                    <p class="lh-1 mb-0">
                                        <small class="text-muted mr-8pt">6h 40m</small>
                                        <small class="text-muted mr-8pt">13,876 Views</small>
                                        <small class="text-muted">13 May 2018</small>
                                    </p>
                                </div>
                                <div class="list-group-item px-0">
                                    <a href="" class="d-block mb-4pt">Unit Testing in Angular</a>
                                    <p class="lh-1 mb-0">
                                        <small class="text-muted mr-8pt">6h 40m</small>
                                        <small class="text-muted mr-8pt">13,876 Views</small>
                                        <small class="text-muted">13 May 2018</small>
                                    </p>
                                </div>
                                <div class="list-group-item px-0">
                                    <a href="" class="d-block mb-4pt">Migrating Applications from AngularJS to Angular</a>
                                    <p class="lh-1 mb-0">
                                        <small class="text-muted mr-8pt">6h 40m</small>
                                        <small class="text-muted mr-8pt">13,876 Views</small>
                                        <small class="text-muted">13 May 2018</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 border-left-md pt-sm-32pt pt-md-0 d-flex flex-column align-items-center justify-content-center">
                            <div class="text-center">
                                <p class="mb-16pt">
                                    <img src="{{ asset('uploads/'.$courseDetail->instructor->image) }}" onerror="this.onerror=null;this.src='/assets/images/paths/swift_430x168.png';" alt="guy-6" class="rounded-circle" width="64">
                                </p>
                                <h4 class="m-0">{{ $courseDetail->instructor->name }}</h4>
                                <p class="lh-1">
                                    <small class="text-muted">{{ $courseDetail->title }}t</small>
                                </p>
                                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                                    <a href="instructor-profile.html" class="btn btn-outline-primary mb-16pt mb-sm-0 mr-sm-16pt">Follow</a>
                                    <a href="instructor-profile.html" class="btn btn-outline-secondary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section border-bottom-2">
                <div class="container">
                    <div class="page-headline text-center">
                        <h2>Feedback</h2>
                        <p class="lead text-70 measure-lead mx-auto">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
                    </div>

                    <div class="position-relative carousel-card">
                        <div class="row d-block js-mdk-carousel" id="carousel-feedback">
                            <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="mdk-carousel__content">

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia distinctio reiciendis iusto id, doloribus optio soluta laborum nobis dolor tempore velit porro maiores eveniet voluptas officia ipsa magnam aliquam. Perferendis?</p>

                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="{{ asset('assets/images/people/110/guy-1.jpg') }}" width="40" alt="avatar" class="rounded-circle">
                                                </div>
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><a href="" class="text-body"><strong>Umberto Kass</strong></a></p>
                                                    <div class="rating">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia distinctio reiciendis iusto id, doloribus optio soluta laborum nobis dolor tempore velit porro maiores eveniet voluptas officia ipsa magnam aliquam. Perferendis?</p>

                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="{{ asset('assets/images/people/110/guy-2.jpg') }}" width="40" alt="avatar" class="rounded-circle">
                                                </div>
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><a href="" class="text-body"><strong>Umberto Kass</strong></a></p>
                                                    <div class="rating">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white">
                <div class="pt-32pt pt-lg-64pt pb-16pt pb-lg-32pt">
                    <div class="container page__container">
                        <h4>Student Feedback</h4>
                        <div class="row">
                            <div class="col-md-3 mb-32pt mb-md-0">
                                <div class="display-1">4.7</div>
                                <div class="rating rating-32">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                                <p class="text-muted mb-0">20 ratings</p>
                            </div>
                            <div class="col-md-9">

                                <div class="row align-items-center mb-8pt">
                                    <div class="col-md-9 col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating rating-24 mr-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                        </div>
                                        <span class="text-muted">75%</span>
                                        <span class="material-icons icon-16pt ml-8pt">close</span>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt">
                                    <div class="col-md-9 col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="16" style="width: 16%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating rating-24 mr-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-muted mb-0">16%</p>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt">
                                    <div class="col-md-9 col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="12" style="width: 12%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating rating-24 mr-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-muted mb-0">12%</p>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt">
                                    <div class="col-md-9 col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="9" style="width: 9%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating rating-24 mr-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-muted mb-0">9%</p>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt">
                                    <div class="col-md-9 col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating rating-24 mr-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-muted mb-0">0%</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-16pt pt-lg-32pt">
                    <div class="page-separator-mask js-read-more">
                        <div class="container page__container">




                            <div class="mb-16pt pb-16pt border-bottom row">
                                <div class="col-md-3 mb-16pt mb-md-0">
                                    <div class="d-flex">
                                        <a href="student-profile.html" class="avatar avatar-sm mr-16pt">
                                            <img src="{{ asset('assets/images/people/110/guy-1.jpg') }}" alt="avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <p class="text-muted m-0">2 days ago</p>
                                            <p class="mb-0"><a href="student-profile.html" class="text-body">Laza Bogdan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="rating mb-8pt">
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                    </div>
                                    <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn't be happier, so glad I made this purchase!</p>
                                </div>
                            </div>

                            <div class="mb-16pt pb-16pt border-bottom row page-separator-mask__item">
                                <div class="col-md-3 mb-16pt mb-md-0">
                                    <div class="d-flex">
                                        <a href="student-profile.html" class="avatar avatar-sm mr-16pt">
                                            <img src="{{ asset('assets/images/people/110/guy-1.jpg') }}" alt="avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <p class="text-muted m-0">2 days ago</p>
                                            <p class="mb-0"><a href="student-profile.html" class="text-body">Laza Bogdan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="rating mb-8pt">
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                    </div>
                                    <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn't be happier, so glad I made this purchase!</p>
                                </div>
                            </div>

                            <div class="mb-16pt pb-16pt border-bottom row">
                                <div class="col-md-3 mb-16pt mb-md-0">
                                    <div class="d-flex">
                                        <a href="student-profile.html" class="avatar avatar-sm mr-16pt">
                                            <img src="{{ asset('assets/images/people/110/guy-1.jpg') }}" alt="avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <p class="text-muted m-0">2 days ago</p>
                                            <p class="mb-0"><a href="student-profile.html" class="text-body">Laza Bogdan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="rating mb-8pt">
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                    </div>
                                    <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn't be happier, so glad I made this purchase!</p>
                                </div>
                            </div>


                        </div>
                        <div class="page-separator-mask__content">
                            <div class="page-separator-mask__top"></div>
                            <div class="page-separator-mask__bottom bg-body"></div>
                            <div class="page-separator">
                                <a href="#" class="page-separator__text link-text">read more <i class="material-icons">keyboard_arrow_down</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section">
                <div class="container page__container">
                    <div class="page-heading">
                        <h4>Top Development Courses</h4>
                        <a href="library-development.html" class="ml-sm-auto text-underline">See Development Courses</a>
                    </div>



                    <div class="position-relative carousel-card">
                        <div class="js-mdk-carousel row d-block" id="carousel-courses1">

                            <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-courses1" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>

                            <div class="mdk-carousel__content">
                            @php
                                $allCourses = collect($courseData)->flatMap(function($category) {
                                    return $category->courses;
                                });
                            @endphp
                                @foreach($allCourses as $all_course)
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                        <a href="{{ $all_course->course_code ? route('frontend.course', ['course_code' => $all_course->course_code]) : '#' }}" class="js-image" data-position="">
                                            <img src="{{ asset('uploads/'.$all_course->image) }}" onerror="this.onerror=null;this.src='/assets/images/paths/swift_430x168.png';" alt="course" width="430" height="168">
                                            <span class="overlay__content">
                                                <span class="overlay__action d-flex flex-column text-center">
                                                    <i class="material-icons">play_circle_outline</i>
                                                    <small>Preview course</small>
                                                </span>
                                            </span>
                                        </a>

                                        <span class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span>

                                        <div class="mdk-reveal__content">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex">
                                                        <a class="card-title" href="{{ $all_course->course_code ? route('frontend.course', ['course_code' => $all_course->course_code]) : '#' }}">{{ $all_course->title }}</a>
                                                        <small class="text-50 font-weight-bold mb-4pt">{{ $all_course->instructor->name }}</small>
                                                    </div>
                                                    <a href="{{ $all_course->course_code ? route('frontend.course', ['course_code' => $all_course->course_code]) : '#' }}" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                    <small class="text-50">{{ $all_course->duration }} months</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popoverContainer d-none">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('uploads/'.$all_course->image) }}" onerror="this.onerror=null;this.src='/assets/images/paths/swift_40x40@2x.png';" width="40" height="40" alt="course" class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="card-title mb-0">{{ $all_course->title}}</div>
                                                <p class="lh-1 mb-0">
                                                    <span class="text-black-50 small">with</span>
                                                    <span class="text-black-50 small font-weight-bold">{{ $all_course->instructor->name }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <p class="my-16pt text-black-70">{!! $all_course->description !!}</p>

                                        <div class="mb-16pt">
                                            @foreach($all_course->lessons as $lessonData)
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small>{{ $lessonData->title}}</small></p>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="d-flex align-items-center mb-4pt">
                                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small>{{ $all_course->duration }} months</small></p>
                                                </div>
                                                <div class="d-flex align-items-center mb-4pt">
                                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small>{{ $all_course->lesson }} lessons</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small>{{ $all_course->difficulty }}</small></p>
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                <a href="{{ $all_course->course_code ? route('frontend.course', ['course_code' => $all_course->course_code]) : '#' }}" class="btn btn-primary">Watch trailer</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                @endforeach

                                @if(count($allCourses) < 4)
                                    @for($i=count($allCourses); $i < 4; $i++)
                                        <div class="col-lg-4 col-xl-3 col-md-6 d-none"></div>
                                    @endfor
                                @endif

                            </div>
                        </div>
                    </div>


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

         @include('frontend.includes.footer')   

        </div>
        <!-- // END Header Layout Content -->
        <script src="{{ asset('assets/lesson/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $('#enrollmentRequest').click(function () {
                    Swal.fire({
                        icon: 'info',
                        title: 'Information',
                        html: 'If you want to enroll this course. Please contact us.<br>( 09402555372 OR facebook page )',
                        confirmButtonText: 'OK'
                    });
                });
            });
        </script>
@endsection
