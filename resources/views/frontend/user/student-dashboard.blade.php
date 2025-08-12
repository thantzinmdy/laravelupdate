@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            @include('frontend.includes.student-subheader')
            <div class="container page__container">
                <div class="page-section">

                    <div class="page-heading">
                        <h4>Learning Paths</h4>
                        <a href="" class="text-underline ml-sm-auto">All my learning paths</a>
                    </div>
                    <div class="row mb-lg-8pt">
                        <div class="col-sm-6">

                            <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-16pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="assets/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                        <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="card-title text-body mb-0">Angular</div>
                                                    <div class="text-muted d-flex lh-1">24 courses</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="path.html" class="ml-4pt btn btn-link text-secondary">Resume</a>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">Angular</div>
                                        <span class="text-black-50 d-flex lh-1">18 courses</span>
                                    </div>
                                </div>

                                <div class="my-32pt">
                                    <div class="d-flex align-items-center mb-8pt justify-content-center">
                                        <div class="d-flex align-items-center mr-8pt">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                        <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-black-50 mr-8pt">Your rating</small>
                                    <div class="rating mr-8pt">
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                    </div>
                                    <small class="text-black-50">4/5</small>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-16pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="assets/images/paths/swift_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                        <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="card-title text-body mb-0">Swift</div>
                                                    <div class="text-muted d-flex lh-1">24 courses</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="path.html" class="ml-4pt btn btn-link text-secondary border-1 border-secondary">Resume</a>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/paths/swift_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">Swift</div>
                                        <span class="text-black-50 d-flex lh-1">18 courses</span>
                                    </div>
                                </div>

                                <div class="my-32pt">
                                    <div class="d-flex align-items-center mb-8pt justify-content-center">
                                        <div class="d-flex align-items-center mr-8pt">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                        <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-black-50 mr-8pt">Your rating</small>
                                    <div class="rating mr-8pt">
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                    </div>
                                    <small class="text-black-50">4/5</small>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-16pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="assets/images/paths/wordpress_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                        <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="card-title text-body mb-0">WordPress</div>
                                                    <div class="text-muted d-flex lh-1">24 courses</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="path.html" class="ml-4pt btn btn-link text-secondary">Resume</a>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/paths/wordpress_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">WordPress</div>
                                        <span class="text-black-50 d-flex lh-1">18 courses</span>
                                    </div>
                                </div>

                                <div class="my-32pt">
                                    <div class="d-flex align-items-center mb-8pt justify-content-center">
                                        <div class="d-flex align-items-center mr-8pt">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                        <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-black-50 mr-8pt">Your rating</small>
                                    <div class="rating mr-8pt">
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                    </div>
                                    <small class="text-black-50">4/5</small>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-16pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="assets/images/paths/react_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                        <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="card-title text-body mb-0">React Native</div>
                                                    <div class="text-muted d-flex lh-1">24 courses</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="path.html" class="ml-4pt btn btn-link text-secondary">Resume</a>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/paths/react_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">React Native</div>
                                        <span class="text-black-50 d-flex lh-1">18 courses</span>
                                    </div>
                                </div>

                                <div class="my-32pt">
                                    <div class="d-flex align-items-center mb-8pt justify-content-center">
                                        <div class="d-flex align-items-center mr-8pt">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                        <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-black-50 mr-8pt">Your rating</small>
                                    <div class="rating mr-8pt">
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                        <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                    </div>
                                    <small class="text-black-50">4/5</small>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="page-heading">
                        <h4>Courses</h4>
                        <a href="javascript:;" class="text-underline ml-sm-auto">All my courses</a>
                    </div>

                    <div class="mb-lg-8pt">

                        <div class="position-relative carousel-card">
                            <div class="js-mdk-carousel row d-block" id="carousel-courses1">

                                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-courses1" role="button" data-slide="next">
                                    <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <div class="mdk-carousel__content">
                                    @foreach($courseDataForStudent as $course)
                                        <div class="col-lg-4 col-xl-3 col-md-6">
                                            <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                                <a href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}" class="js-image" data-position="">
                                                <img src="{{ asset('uploads/'.$course->image) }}" onerror="this.onerror=null;this.src='/assets/images/paths/swift_430x168.png';" alt="course" width="430" height="168">
                                                <span class="overlay__content">
                                                    <span class="overlay__action d-flex flex-column text-center">
                                                        <i class="material-icons">play_circle_outline</i>
                                                        <small>Resume course</small>
                                                    </span>
                                                </span>
                                                </a>

                                                <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title" href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}">{{ $course->title }}</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">{{ $course->instructor->name }}</small>
                                                        </div>
                                                        <a href="student-take-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">{{ $course->duration }} months</small>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="popoverContainer d-none">
                                                <div class="media">
                                                <div class="media-left">
                                                    <img src="{{ asset('uploads/'.$course->image) }}" onerror="this.onerror=null;this.src='/assets/images/paths/swift_40x40@2x.png';" width="40" height="40" alt="course" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">{{ $course->title}}</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-black-50 small">with</span>
                                                        <span class="text-black-50 small font-weight-bold">{{ $course->instructor->name }}</span>
                                                    </p>
                                                </div>
                                                </div>
                                                <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>{{count($course->lessons)}} lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html" class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                <small class="text-black-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-black-50">4/5</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if(count($courseDataForStudent) < 4)
                                        @for($i=count($courseDataForStudent); $i < 4; $i++)
                                            <div class="col-lg-4 col-xl-3 col-md-6 d-none"></div>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-heading">
                        <h4>Achievements</h4>
                        <a href="javascript:;" class="text-underline ml-sm-auto">My achievements</a>
                    </div>

                    <div class="position-relative carousel-card">
                        <div class="js-mdk-carousel row d-block" id="carousel-achievements">
                            @if(count($achievements) > 1)
                            <a class="carousel-control-next js-mdk-carousel-control" href="#carousel-achievements" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                            @endif
                            <div class="mdk-carousel__content">
                                @foreach($achievements as $achievement)
                                <div class="col-12 col-sm-6">

                                    <a class="card mb-0" href="{{route('frontend.user.show-certificate', ['course_code' => $achievement->course->course_code])}}" target="_blank">
                                        <img src="assets/images/achievements/flinto.png" alt="Flinto" class="card-img" style="max-height: 100%; width: initial;">
                                        <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                        <span class="card-body fullbleed">
                                            <span class="row">
                                                <span class="col-5 text-center">
                                                    <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                    <span class="text-white-60 d-block mb-16pt">{{ \Carbon\Carbon::parse($achievement->enrollment_date)->format('F j, Y') }}</span>
                                                    <img src="assets/images/illustration/achievement/128/white.png" alt="achievement">
                                                </span>
                                                <span class="col-7 d-flex flex-column">
                                                    <span class="text-right flex">
                                                        <img src="{{ asset('uploads/'.$achievement->course->courseCategory->category_image) }}" width="64" alt="Flinto" class="rounded">
                                                    </span>
                                                    <span>
                                                        <span class="h4 text-white m-0 d-block">{{$achievement->course->courseCategory->category_name}}</span>
                                                        <span class="text-white-60">{{$achievement->course->title}}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                                @endforeach
                                @if(count($achievements) < 2)
                                <div class="col-12 col-sm-6">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page-section border-bottom-2">
                <div class="container page__container">
                    <div class="row align-items-end mb-16pt mb-md-20pt">
                        <div class="col-md-auto mb-20pt mb-md-0">
                            <div class="page-headline page-headline--title text-center text-md-left p-0">
                                <h2>Top Courses</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    @php
                        $allCourses = collect($courseData)->flatMap(function($category) {
                            return $category->courses;
                        })->slice(0, 8);
                    @endphp
                        @foreach($allCourses as $course)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                <a href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}" class="js-image" data-position="center">
                                <img src="{{ asset('uploads/'.$course->image) }}" onerror="this.onerror=null;this.src='assets/images/paths/swift_430x168.png';" alt="course" width="430" height="168">
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
                                                <a class="card-title" href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}">{{ $course->title }}</a>
                                                <small class="text-50 font-weight-bold mb-4pt">{{ $course->instructor->name }}</small>
                                            </div>
                                            <a href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                        </div>
                                        <div class="d-flex">
                                            <div class="rating flex">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            </div>
                                            <small class="text-50">{{ $course->duration }} months</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ asset('uploads/'.$course->image) }}" onerror="this.onerror=null;this.src='assets/images/paths/swift_40x40@2x.png';" width="40" height="40" alt="course" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">{{ $course->title}}</div>
                                        <p class="lh-1 mb-0">
                                            <span class="text-black-50 small">with</span>
                                            <span class="text-black-50 small font-weight-bold">{{ $course->instructor->name }}</span>
                                        </p>
                                    </div>
                                </div>

                                <p class="my-16pt text-black-70">{!! $course->description !!}</p>

                                <div class="mb-16pt">
                                    @foreach($course->lessons as $lessonData)
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
                                            <p class="flex text-black-50 lh-1 mb-0"><small>{{ $course->duration }} months</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>{{ $course->lesson }} lessons</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>{{ $course->difficulty }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}" class="btn btn-primary">Watch trailer</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @endforeach
                    </div>
                    <div class="pt-md-16pt text-center">
                        <a href="{{ route('frontend.library') }}" class="btn btn-outline-secondary">Browse Courses</a>
                    </div>
                </div>
            </div>

            <div class="js-fix-footer bg-white border-top-2">
                <div class="container page-section py-lg-48pt">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                    <h4 class="text-70">Learn</h4>
                                    <nav class="nav nav-links nav--flush flex-column">
                                        <a class="nav-link" href="library.html">Library</a>
                                        <a class="nav-link" href="library-featured.html">Featured</a>
                                        <a class="nav-link" href="library-filters.html">Explore</a>
                                        <a class="nav-link" href="paths.html">Learning Paths</a>
                                    </nav>
                                </div>
                                <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                    <h4 class="text-70">Join us</h4>
                                    <nav class="nav nav-links nav--flush flex-column">
                                        <a class="nav-link" href="pricing.html">Pricing</a>
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="signup.html">Sign Up</a>
                                        <a class="nav-link" href="signup-payment.html">Payment</a>
                                    </nav>
                                </div>
                                <div class="col-6 col-md-4 mb-32pt mb-md-0">
                                    <h4 class="text-70">Community</h4>
                                    <nav class="nav nav-links nav--flush flex-column">
                                        <a class="nav-link" href="student-discussions.html">Discussions</a>
                                        <a class="nav-link" href="student-discussions-ask.html">Ask Question</a>
                                        <a class="nav-link" href="student-profile.html">Student Profile</a>
                                        <a class="nav-link" href="instructor-profile.html">Instructor Profile</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-right">
                            <p class="text-70 brand justify-content-md-end">
                                <img class="brand-icon" src="assets/images/logo/black-70@2x.png" width="30" alt="Tutorio"> Tutorio
                            </p>
                            <p class="text-muted mb-0 mb-lg-16pt">Tutorio is an online learning platform that helps anyone achieve their personal and professional goals.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-footer page-section py-lg-32pt">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                                <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                                <nav class="nav nav-links nav--flush">
                                    <a href="#" class="nav-link mr-8pt"><img src="assets/images/icon/footer/facebook-square@2x.png" width="24" height="24" alt="Facebook"></a>
                                    <a href="#" class="nav-link mr-8pt"><img src="assets/images/icon/footer/twitter-square@2x.png" width="24" height="24" alt="Twitter"></a>
                                    <a href="#" class="nav-link mr-8pt"><img src="assets/images/icon/footer/vimeo-square@2x.png" width="24" height="24" alt="Vimeo"></a>
                                    <a href="#" class="nav-link"><img src="assets/images/icon/footer/youtube-square@2x.png" width="24" height="24" alt="YouTube"></a>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                                <a href="" class="btn btn-outline-white">English <span class="icon--right material-icons">arrow_drop_down</span></a>
                            </div>
                            <div class="col-md-4 text-md-right">
                                <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                                    <a href="" class="text-white-70 text-underline mr-16pt">Terms</a>
                                    <a href="" class="text-white-70 text-underline">Privacy policy</a>
                                </p>
                                <p class="text-white-50 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- // END Header Layout Content -->
@endsection
