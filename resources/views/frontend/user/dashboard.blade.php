@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
    {{ style('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ style('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css') }}
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/datatables.min.css"/>
    <style>
        .card-body {
            padding: 0.75rem;
        }
        .dataTables_length {
            float: left;
        }
        div.dt-buttons {
            float: right;
        }
    </style>
@endpush
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
                    <p class="lead text-white-50 d-flex align-items-center">Instructor </p>
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
                                <a href="{{ route('frontend.user.dashboard') }}" class="nav-link active">Dashboard</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('frontend.user.instructor-profile') }}" class="nav-link">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-24pt bg-white border-bottom-2">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="border-1 border-left-3 border-left-accent rounded text-70 text-center mb-lg-0">
                            <div class="card-body">
                                Earnings this month
                                <p class="lead text-body mb-0"><strong>{{$logged_in_user->instructor->total_monthly_sale}} MMK</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border rounded text-70 text-center mb-lg-0">
                            <div class="card-body">
                                Total Sales
                                <p class="lead text-body mb-0"><strong>{{$logged_in_user->instructor->total_sale_amount}} MMK</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container page__container page-section">

            <div class="card mb-4">
                <div class="card-header">
                    Entrollments
                </div>

                <div class="card-body table-responsive" id="transaction_clear">
                    <div class="row mb-4">
                        <div class="col-lg-4 col-xl-4 col-md-6">
                            <input name="end_date" class="form-control date_range" type="text" placeholder="Choose End Date">
                        </div>
                        <div class="col-lg-2 col-xl-2 col-md-3">
                            <button class="btn btn-primary" id="EnrollmentSearch" onclick="searchEnrollmentData()"><i class="fa fa-search"></i>&nbsp;Search</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-condensed table-hover" id="enrollment-table">
                            <thead>
                                <tr>
                                     <th>{{ __('enrollment::labels.backend.enrollment.table.student_name') }}</th>
                                    <th>{{ __('enrollment::labels.backend.enrollment.table.course_name') }}</th>
                                    <th>{{ __('enrollment::labels.backend.enrollment.table.course_price') }}</th>
                                    <th>{{ __('enrollment::labels.backend.enrollment.table.instructor_price') }}</th>
                                    <th>{{ __('enrollment::labels.backend.enrollment.table.enrollment_date') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="1"></th>
                                    <th colspan="2">Total Income </th>
                                    <th colspan="1">
                                        <div class="input-icon">
                                            <input class="form-control total_amount" type="text" disabled="disabled">
                                        </div>
                                    </th>
                                    <th colspan="1"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container page__container page-section">
            <div class="mb-heading d-flex align-items-center">
                <h2 class="flex m-0">{{$logged_in_user->instructor->name}}'s Courses</h2>
            </div>
            @foreach($courseData as $index => $category)
            <div class="page-section {{ $index > 0 ? 'pt-0' : '' }}">
                <div class="container page__container">
                    <div class="page-headline text-center">
                        <h3>{{ $category->category_name}}</h3>
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

        </div>

        <div class="js-fix-footer bg-white border-top-2">
            <div class="container page-section py-lg-48pt">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                <h4 class="text-70">Learn</h4>
                                <nav class="nav nav-links nav--flush flex-column">
                                    <a class="nav-link" href="javascript:;">Library</a>
                                    <a class="nav-link" href="javascript:;">Featured</a>
                                    <a class="nav-link" href="javascript:;">Explore</a>
                                    <a class="nav-link" href="javascript:;">Learning Paths</a>
                                </nav>
                            </div>
                            <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                <h4 class="text-70">Join us</h4>
                                <nav class="nav nav-links nav--flush flex-column">
                                    <a class="nav-link" href="{{route('frontend.auth.login')}}">Login</a>
                                    <a class="nav-link" href="{{route('frontend.auth.register')}}">Sign Up</a>
                                </nav>
                            </div>
                            <div class="col-6 col-md-4 mb-32pt mb-md-0">
                                <h4 class="text-70">Community</h4>
                                <nav class="nav nav-links nav--flush flex-column">
                                    <a class="nav-link" href="javascript:;">Discussions</a>
                                    <a class="nav-link" href="javascript:;">Ask Question</a>
                                   <!--  <a class="nav-link" href="student-profile.html">Student Profile</a>
                                    <a class="nav-link" href="instructor-profile.html">Instructor Profile</a> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="text-70 brand justify-content-md-end">
                            <img class="brand-icon" src="{{ asset('assets/images/logo/black-70@2x.png') }}" width="30" alt="LearingForAll"> LearingForAll
                        </p>
                        <p class="text-muted mb-0 mb-lg-16pt">LearningForAll is an online learning platform that helps anyone achieve their personal and professional goals.</p>
                    </div>
                </div>
            </div>
            <div class="bg-footer page-section py-lg-32pt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                            <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                            <nav class="nav nav-links nav--flush">
                                <a href="#" class="nav-link mr-8pt"><img src="{{ asset('assets/images/icon/footer/facebook-square@2x.png') }}" width="24" height="24" alt="Facebook"></a>
                                <a href="#" class="nav-link"><img src="{{ asset('assets/images/icon/footer/youtube-square@2x.png') }}" width="24" height="24" alt="YouTube"></a>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                            <!-- <a href="" class="btn btn-outline-white">English <span class="icon--right material-icons">arrow_drop_down</span></a> -->
                        </div>
                        <div class="col-md-4 text-md-right">
                            <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                                <a href="" class="text-white-70 text-underline mr-16pt">Terms</a>
                                <a href="" class="text-white-70 text-underline">Privacy policy</a>
                            </p>
                            <p class="text-white-50 mb-0">Copyright 2025 &copy; All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // END Header Layout Content -->

    
@endsection
@push('after-scripts')
    <script src="{{ url('assets/vendor/jquery.min.js') }}"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{ script("js/plugin/jquery.isloading.js") }}
    {{ script('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    {{ script('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js')}}

    {{ script("https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js") }}
    {{ script("https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js") }}
    {{ script("https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js") }}
    {{ script("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js") }}
    {{ script("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js") }}
    {{ script("https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js") }}
    {{ script("https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js ") }}
    {{ script("https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js") }}
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    {{ script('assets/plugins/select2/js/select2.full.min.js')}}
    {{ script("assets/plugins/select2/component/components-select2.js") }}

    <script>
        $(function() {
            console.log('hello');
            $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
                var target = $(e.target).attr("href"); // activated tab
                alert (target);
                $($.fn.dataTable.tables( true ) ).css('width', '100%');
                $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
            } );

            var start = moment().startOf('month');
            var end = moment();
            $('.date_range').daterangepicker({
                "startDate": start,
                "endDate": end,
                "showDropdowns": true,
                "timePicker": true,
                "timePicker24Hour": true,
                locale: {
                      format: 'YYYY-MM-DD HH:mm:ss'
                    },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
            }, function(start, end, label) {
              console.log('New date range selected: ' + start.format('YYYY-MM-DD HH:mm:ss') + ' to ' + end.format('YYYY-MM-DD HH:mm:ss') + ' (predefined range: ' + label + ')');
            }).attr('readOnly','true').css('cursor','pointer');

            var entrollment_table;

            LoadEntrollmentData();

            window.searchEnrollmentData = function (){
                entrollment_table.destroy();
                LoadEntrollmentData();
            }

            function LoadEntrollmentData() {
                var instructorId = '{{Auth::user()->instructor->id}}';
                entrollment_table = $('#enrollment-table').DataTable({
                    language:
                        {
                            processing: "<div class='overlay custom-loader-background'><i class='fa fa-cog fa-spin custom-loader-color'></i></div>"
                        },
                    dom: 'lBfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    processing: true,
                    serverSide: true,
                    searching: false,
                    retrieve:true,
                    ajax: {
                        url: '{!! route("frontend.user.enrollment.get_data") !!}',
                        dataType: "JSON",
                        data: function (d) {
                            d.data = {
                                    instructor_id: instructorId,
                                    enrollment_date_range: $('.date_range').val()
                                };
                            return d;
                        },
                        error: function (xhr, err) {
                            console.log('aa');
                            if (err === 'parsererror')
                                location.reload();
                            else swal(xhr.responseJSON.message);
                        }
                    },
                    columns: [
                        {data: 'student.name', name: 'student.name'},
                        {data: 'course.title', name: 'course.title'},
                        {data: 'course_price', name: 'course_price'},
                        {data: 'instructor_price', name: 'instructor_price'},
                        {data: 'enrollment_date', name: 'enrollment_date'},
                    ],
                    order: [],
                    searchDelay: 500,
                    fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

                        // load_plugins();
                    }
                });

                entrollment_table.on( 'xhr', function () {
                    var json = entrollment_table.ajax.json();
                    $('.total_amount').val(json.total);

                });
            }

        });
    </script>
@endpush