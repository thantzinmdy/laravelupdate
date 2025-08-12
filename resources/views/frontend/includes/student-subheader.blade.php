<div class="bg-gradient-primary border-bottom-white py-32pt">
    <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
        @if($logged_in_user->student->image)
            <img src="{{asset('uploads/'.$logged_in_user->student->image) }}" width="104" class="mr-md-32pt mb-32pt mb-md-0 rounded-circle" alt="student">
        @else
            <img src="assets/images/illustration/student/128/white.svg" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
        @endif
        <div class="flex mb-32pt mb-md-0">
            <h2 class="text-white mb-0">{{$logged_in_user->student->name}}</h2>
            <p class="lead text-white-50 d-flex align-items-center">Student <span class="ml-16pt d-flex align-items-center"></p>
        </div>
        <a href="{{ route('frontend.user.account') }}" class="btn btn-outline-white">Edit account</a>
    </div>
</div>

<div class="navbar navbar-expand-sm navbar-dark-white bg-gradient-primary p-sm-0 mb-0">
    <div class="container page__container">

        <!-- Navbar toggler -->
        <button class="navbar-toggler ml-n16pt" type="button" data-toggle="collapse" data-target="#navbar-submenu2">
            <span class="material-icons">people_outline</span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-submenu2">
            <div class="navbar-collapse__content pb-16pt pb-sm-0">
                <ul class="nav navbar-nav">

                    <li class="nav-item">
                        <a href="{{route('frontend.user.student-dashboard')}}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Discussions</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>