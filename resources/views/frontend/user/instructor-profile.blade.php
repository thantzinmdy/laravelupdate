@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            <div class="bg-gradient-primary border-bottom-white py-32pt">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    @if($logged_in_user->instructor->image)
                        <img src="{{asset('uploads/'.$logged_in_user->instructor->image) }}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="instructor">
                    @else
                        <img src="assets/images/illustration/instructor/128/white.svg" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="instructor">
                    @endif
                    <div class="flex mb-32pt mb-md-0">
                        <h2 class="text-white mb-0">{{$logged_in_user->instructor->name}}</h2>
                        <p class="lead text-white-50 d-flex align-items-center">Instructor <span class="ml-16pt d-flex align-items-center"></p>
                    </div>
                    <a href="{{ route('frontend.user.instructor-profile') }}" class="btn btn-outline-white">My Profile</a>
                </div>
            </div>

            <div class="navbar navbar-expand-sm navbar-dark-white bg-gradient-primary p-sm-0 ">
                <div class="container page__container">

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler ml-n16pt" type="button" data-toggle="collapse" data-target="#navbar-submenu2">
                        <span class="material-icons">people_outline</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-submenu2">
                        <div class="navbar-collapse__content pb-16pt pb-sm-0">
                            <ul class="nav navbar-nav">

                                <li class="nav-item">
                                    <a href="{{ route('frontend.user.dashboard') }}" class="nav-link">Dashboard</a>
                                </li>

                            </ul>
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a href="{{ route('frontend.user.instructor-profile') }}" class="nav-link">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
















            <div class="page-section bg-white border-bottom-2">
                <div class="container page__container">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>About me</h4>
                            <p>Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Connect</h4>
                            <p>I’m currently working as a freelance marketing director and always interested in a challenge. Here’s how to reach out and connect.</p>
                            <div class="d-flex align-items-center">
                                <a href="" class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                                <a href="" class="text-accent fab fa-twitter-square font-size-24pt"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container page__container page-section">

                <div class="page-headline text-center">
                    <h2>Level-up Your Career</h2>
                    <p class="lead text-70 col-lg-8 mx-auto">Courses by Elijah</p>
                </div>



                <div class="card-columns card-columns--2">

                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <a href="course.html" class="avatar avatar-4by3 mr-16pt">
                                <img src="assets/images/paths/angular_routing_200x168.png" alt="Angular Routing In-Depth" class="avatar-img rounded">
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="course.html">Angular Routing In-Depth</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>


                                        <span class="rating__item"><span class="material-icons">star_border</span></span>

                                        <span class="rating__item"><span class="material-icons">star_border</span></span>

                                    </div>
                                    <small class="text-muted">3/5</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <a href="course.html" class="avatar avatar-4by3 mr-16pt">
                                <img src="assets/images/paths/angular_testing_200x168.png" alt="Angular Unit Testing" class="avatar-img rounded">
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="course.html">Angular Unit Testing</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>


                                        <span class="rating__item"><span class="material-icons">star_border</span></span>

                                    </div>
                                    <small class="text-muted">4/5</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <a href="course.html" class="avatar avatar-4by3 mr-16pt">
                                <img src="assets/images/paths/typescript_200x168.png" alt="Introduction to TypeScript" class="avatar-img rounded">
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="course.html">Introduction to TypeScript</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>


                                    </div>
                                    <small class="text-muted">5/5</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <a href="course.html" class="avatar avatar-4by3 mr-16pt">
                                <img src="assets/images/paths/angular_200x168.png" alt="Learn Angular Fundamentals" class="avatar-img rounded">
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="course.html">Learn Angular Fundamentals</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>


                                    </div>
                                    <small class="text-muted">5/5</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @include('frontend.includes.footer')

        </div>
        <!-- // END Header Layout Content -->

    
@endsection
