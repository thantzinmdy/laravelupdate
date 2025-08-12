<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Learing For All')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <!-- {{ style(mix('css/frontend.css')) }} -->

        <!-- Perfect Scrollbar -->
        <link type="text/css" href="{{ url('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

        <!-- Fix Footer CSS -->
        <link type="text/css" href="{{ url('assets/vendor/fix-footer.css') }}" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="{{ url('assets/css/material-icons.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/css/material-icons.rtl.css') }}" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css" href="{{ url('assets/css/fontawesome.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/css/fontawesome.rtl.css') }}" rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css" href="{{ url('assets/css/preloader.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/css/preloader.rtl.css') }}" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="{{ url('assets/css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/css/app.rtl.css') }}" rel="stylesheet">

        @stack('after-styles')
    </head>
    <body>
        @include('frontend.includes.loader')
        @include('includes.partials.read-only')
        <div class="mdk-header-layout js-mdk-header-layout">
            @if(request()->path() != 'login' && request()->path() != 'register' && request()->path() != 'dashboard' && request()->path() != 'instructor-profile')
                @include('frontend.includes.header')
            @endif

            @if(request()->path() == 'dashboard' || request()->path() == 'instructor-profile')
                @include('frontend.includes.instructor-header')
            @endif
            @include('includes.partials.logged-in-as')
            <!-- @include('frontend.includes.nav') -->

            <!-- <div class="container"> -->
                
                @yield('content')
            <!-- </div> -->
        </div><!-- #app -->

        @if(request()->path() != 'login' && request()->path() != 'register'&& request()->path() != 'dashboard' && request()->path() != 'instructor-profile')
            @include('frontend.includes.modal')
        @endif

        @if(request()->path() == 'dashboard')
            @include('frontend.includes.instructor-earning-graph')
        @endif

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        <!-- {!! script(mix('js/frontend.js')) !!} -->

        <!-- jQuery -->
        <script src="{{ url('assets/vendor/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ url('assets/vendor/popper.min.js') }}"></script>
        <script src="{{ url('assets/vendor/bootstrap.min.js') }}"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ url('assets/vendor/perfect-scrollbar.min.js') }}"></script>

        <!-- DOM Factory -->
        <script src="{{ url('assets/vendor/dom-factory.js') }}"></script>

        <!-- MDK -->
        <script src="{{ url('assets/vendor/material-design-kit.js') }}"></script>

        <!-- Fix Footer -->
        <script src="{{ url('assets/vendor/fix-footer.js') }}"></script>

        <!-- Chart.js -->
        <script src="{{ url('assets/vendor/Chart.min.js') }}"></script>

        <!-- App JS -->
        <script src="{{ url('assets/js/app.js') }}"></script>

        <!-- Highlight.js -->
        <script src="{{ url('assets/js/hljs.js') }}"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ url('assets/js/app-settings.js') }}"></script>

        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
