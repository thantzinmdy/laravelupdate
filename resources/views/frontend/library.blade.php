@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content pb-0">

        <div class="navbar navbar-expand navbar-dark bg-dark m-0 ">
            <div class="container-fluid" data-perfect-scrollbar data-perfect-scrollbar-suppress-scroll-y="true">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a href="library.html" class="nav-link">Library</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Featured</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Development</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Design</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Business</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Photography</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mdk-box mdk-box--bg-gradient-primary bg-dark js-mdk-box mb-0" data-effects="parallax-background blend-background">
            <div class="mdk-box__bg">
                <div class="mdk-box__bg-front" style="background-image: url(assets/images/1280_writing-down-goals_4460x4460.jpg);"></div>
            </div>
            <div class="mdk-box__content">
                <div class="hero container page__container py-64pt py-md-112pt text-center text-sm-left">
                    <h1 class="text-white mb-24pt">Library</h1>

                    <p class="lead measure-hero-lead text-white mb-24pt">Business, Technology and Creative Skills taught by industry experts. Explore a wide range of skills with our professional tutorials.</p>

                </div>
            </div>
        </div>

        <div class="navbar navbar-expand-sm navbar-submenu navbar-light h-auto h-sm-64 p-sm-0">
            <div class="container flex-column flex-sm-row">

                <h4 class="mb-0 d-none d-sm-block mr-sm-24pt flex">Featured</h4>
                <div class="d-flex flex-wrap">
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/angular_40x40@2x.png') }}" width="40" height="40" alt="Angular" class="rounded">
                    </a>
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/devops_40x40@2x.png') }}" width="40" height="40" alt="Dev Ops" class="rounded">
                    </a>
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/react_40x40@2x.png') }}" width="40" height="40" alt="React Native" class="rounded">
                    </a>
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/redis_40x40@2x.png') }}" width="40" height="40" alt="Redis" class="rounded">
                    </a>
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/swift_40x40@2x.png') }}" width="40" height="40" alt="Swift" class="rounded">
                    </a>
                    <a href="path.html" class="m-8pt">
                        <img src="{{ asset('assets/images/paths/wordpress_40x40@2x.png') }}" width="40" height="40" alt="WordPress" class="rounded">
                    </a>
                </div>
            </div>
        </div>

        @foreach($courseData as $index => $category)
            <div class="page-section {{ $index > 0 ? 'pt-0' : '' }}">
            <div class="container page__container">
                <div class="page-headline text-center">
                    <h2>{{ $category->category_name}}</h2>
                </div>

                <div class="page-heading">
                    <h4>Top {{ $category->category_name}} Courses</h4>
                    <a href="#" class="ml-sm-auto text-underline">See {{ $category->category_name}} Courses</a>
                </div>
                <div class="row">
                    @foreach($category->courses as $course)
                    <div class="col-lg-4 col-xl-3 col-md-6">
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
                                        <a href="{{ $course->course_code ? route('frontend.course', ['course_code' => $course->course_code]) : '#' }}" class="ml-4pt material-icons text-accent card-course__icon-favorite">favorite</a>
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
            </div>

            <div class="page-separator mt-lg-16pt">
                <a href="" class="page-separator__text">show more <span class="material-icons">keyboard_arrow_down</span></a>
            </div>
            </div>
        @endforeach

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
@endsection
