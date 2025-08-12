<div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>

            <!-- Navbar toggler -->
            <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Brand -->
            <a href="{{ route('frontend.index') }}" class="navbar-brand">
                <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{asset('assets/images/logo/white-100@2x.png') }}" width="30" alt="LearingForAll">
                <span class="d-none d-md-block">LearingForAll</span>
            </a>

            <!-- Main Navigation -->
            <nav class="nav navbar-nav ml-auto flex-nowrap">
                <div class="nav-item dropdown d-none d-sm-flex ml-16pt">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if($logged_in_user->instructor->image)
                        <img width="32" height="32" class="rounded-circle" src="{{asset('uploads/'.$logged_in_user->instructor->image) }}" alt="instructor" />
                        @else
                            <i class="material-icons" style="font-size: 2rem;">person</i>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">Logout</a>
                    </div>
                </div>

                <!-- Notifications dropdown -->
                <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                    <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                        <i class="material-icons">notifications</i>
                    </button>
                </li>
                <!-- // END Notifications dropdown -->
            </nav>

            <!-- // END Main Navigation -->
        </div>
    </div>
</div>