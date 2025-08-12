@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/flaticon-skillgro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/flaticon-skillgro-new.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/default-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/tg-cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lesson/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

    <div class="mdk-header-layout__content page-content pb-0">
        <!-- lesson-area -->
        <section class="lesson__area section-pb-120">
            <div class="container-fluid p-0">
                <div class="row gx-0">
                    <div class="col-xl-3 col-lg-4">
                        <div class="lesson__content">
                            <h2 class="title">{{ $courseDetail->title }}</h2>
                            <div class="accordion" id="accordionExample">
                                @foreach($courseDetail->lessons as $index => $lesson)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="{{$lesson_code == $lesson->lesson_code ? 'true' : 'false'}}" aria-controls="collapse{{$index}}">
                                            {{ $lesson->title }}
                                                <span>1/{{$lesson->materials->count()}}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{$index}}" class="accordion-collapse collapse {{$lesson_code == $lesson->lesson_code ? 'show' : ''}}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="list-wrap">
                                                    @foreach($lesson->materials as $material)
                                                        <li class="course-item open-item">
                                                            <a href="{{route('frontend.lesson', ['course_code' => $courseDetail->course_code,'lesson_code'=>$lesson->lesson_code,'material_code' => $material->material_code])}}" class="course-item-link @if($material->material_code == $materialDetail->material_code)  active @endif">
                                                                <span class="item-name">{{ $material->title }}</span>
                                                                <div class="course-item-meta">
                                                                    <span class="item-meta duration">{{$material->duration}}</span>
                                                                    <span class="item-meta course-item-status" style="width:1rem">
                                                                        <!-- <img src="{{ asset('assets/lesson/img/icons/lock.svg')}}" alt="icon"> -->
                                                                        @if($material->progress->first() )
                                                                        <img src="{{ asset('assets/lesson/img/icons/true.svg')}}" alt="icon">
      
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        @if($materialDetail->type == 'video')
                        <div class="lesson__video-wrap">
                            <div id="countdown-overlay" style="display:none!important; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); color:#fff; font-size:2rem; display:flex; align-items:center; justify-content:center; z-index:999;">
                                    <div id="countdown-text">Next video in 5</div>
                            </div>
                            <div class="lesson__video-wrap-top">
                                <div class="lesson__video-wrap-top-left">
                                    <a href="#"><i class="flaticon-arrow-right"></i></a>
                                    <span>{{$materialDetail->title}}</span>
                                </div>
                                <div class="lesson__video-wrap-top-right">
                                    <a href="#"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <video id="player" playsinline controls data-poster="{{ asset('assets/lesson/img/bg/video_bg.webp') }}">
                                <source src="{{ asset('uploads/' . $materialDetail->video) }}" type="video/mp4" />
                                <source src="{{ asset('/path/to/video.webm') }}" type="video/webm" />
                            </video>
                            <div class="lesson__next-prev-button">
                                <button class="prev-button" title="Create a Simple React App"><i class="flaticon-arrow-right"></i></button>
                                <button class="next-button" title="React for the Rest of us"><i class="flaticon-arrow-right"></i></button>
                            </div>
                        </div>
                        @endif
                        @if($materialDetail->type == 'quiz' && $materialDetail->content_url)
                        <div class="text-center mt-2">
                            @if($materialDetail->progress->first())
                            <div>
                                <!-- <span class="mr-4">if you have done the below assignment, please click "Mark as completed" button</span> -->
                                <a href="{{ $nextMaterialUrl ?? '#' }}" class="btn btn-primary ml-2 mb-2 mr-2 goNextItem">Go to next item</a>✔ Completed
                            </div>
                            @else
                            <div id="markCompleted">
                                <span class="mr-4">if you have done the below assignment, please click "Mark as completed" button</span>
                                <button id="markCompletedBtn" class="btn btn-primary mb-2">Mark as completed</button>
                            </div>
                            <div id="goNextItem1"  style="display:none;">
                                <!-- <span class="mr-4">if you have done the below assignment, please click "Mark as completed" button</span> -->
                                <a href="{{ $nextMaterialUrl ?? '#' }}" class="btn btn-primary ml-2 mb-2 mr-2 goNextItem">Go to next item</a>✔ Completed
                            </div>
                            @endif
                            
                        </div>
                            <iframe src="{{ $materialDetail->content_url }}" width="100%" height="600px" frameborder="0"></iframe>
                        @endif
                        <div class="courses__details-content lesson__details-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instructors-tab" data-bs-toggle="tab" data-bs-target="#instructors-tab-pane" type="button" role="tab" aria-controls="instructors-tab-pane" aria-selected="false">Instructors</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">reviews</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    <div class="courses__overview-wrap">
                                        <h3 class="title">Course Description</h3>
                                        <p>{!! $courseDetail->description !!}</p>
                                        <h3 class="title">What you'll learn in this course?</h3>
                                        <p>{!! $courseDetail->description !!}</p>
                                        <p>{{ $courseDetail->prerequisites }}</p>
                                        <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Work with color & Gradients & Grids</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">All the useful shortcuts</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Be able to create Flyers, Brochures, Advertisements</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">How to work with Images & Text</p>
                                            </li>
                                        </ul>
                                        <p class="last-info">Morem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel" aria-labelledby="instructors-tab" tabindex="0">
                                    <div class="courses__instructors-wrap">
                                        <div class="courses__instructors-thumb">
                                            <img src="{{ asset('uploads/'.$courseDetail->instructor->image) }}" alt="img">
                                        </div>
                                        <div class="courses__instructors-content">
                                            <h2 class="title">{{ $courseDetail->instructor->name }}</h2>
                                            <span class="designation">{{ $courseDetail->instructor->title }}</span>
                                            <p class="avg-rating"><i class="fas fa-star"></i>(4.8 Ratings)</p>
                                            <p>{{ $courseDetail->instructor->bio }}</p>
                                            <div class="instructor__social">
                                                <ul class="list-wrap justify-content-start">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                    <div class="courses__rating-wrap">
                                        <h2 class="title">Reviews</h2>
                                        <div class="course-rate">
                                            <div class="course-rate__summary">
                                                <div class="course-rate__summary-value">4.8</div>
                                                <div class="course-rate__summary-stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__summary-text">
                                                    12 Ratings
                                                </div>
                                            </div>
                                            <div class="course-rate__details">
                                                <div class="course-rate__details-row">
                                                    <div class="course-rate__details-row-star">
                                                        5
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="course-rate__details-row-value">
                                                        <div class="rating-gray"></div>
                                                        <div class="rating" style="width:80%;" title="80%"></div>
                                                        <span class="rating-count">2</span>
                                                    </div>
                                                </div>
                                                <div class="course-rate__details-row">
                                                    <div class="course-rate__details-row-star">
                                                        4
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="course-rate__details-row-value">
                                                        <div class="rating-gray"></div>
                                                        <div class="rating" style="width:50%;" title="50%"></div>
                                                        <span class="rating-count">1</span>
                                                    </div>
                                                </div>
                                                <div class="course-rate__details-row">
                                                    <div class="course-rate__details-row-star">
                                                        3
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="course-rate__details-row-value">
                                                        <div class="rating-gray"></div>
                                                        <div class="rating" style="width:0%;" title="0%"></div>
                                                        <span class="rating-count">0</span>
                                                    </div>
                                                </div>
                                                <div class="course-rate__details-row">
                                                    <div class="course-rate__details-row-star">
                                                        2
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="course-rate__details-row-value">
                                                        <div class="rating-gray"></div>
                                                        <div class="rating" style="width:0%;" title="0%"></div>
                                                        <span class="rating-count">0</span>
                                                    </div>
                                                </div>
                                                <div class="course-rate__details-row">
                                                    <div class="course-rate__details-row-star">
                                                        1
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="course-rate__details-row-value">
                                                        <div class="rating-gray"></div>
                                                        <div class="rating" style="width:0%;" title="0%"></div>
                                                        <span class="rating-count">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-review-head">
                                            <div class="review-author-thumb">
                                                <img src="{{ asset('assets/lesson/img/courses/review-author.png') }}" alt="img">
                                            </div>
                                            <div class="review-author-content">
                                                <div class="author-name">
                                                    <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                                    <div class="author-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <h4 class="title">The best LMS Design System</h4>
                                                <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante ipsum primis in faucibus.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- lesson-area-end -->
         @include('frontend.includes.footer')   
    </div>
    <!-- JS here -->
    <script src="{{ asset('assets/lesson/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/tween-max.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/tg-cursor.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/vivus.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/svg-inject.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/plyr.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/aos.js') }}"></script>
    <script src="{{ asset('assets/lesson/js/main.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('player'); // Your <video> element
    if(video != null){
        let reached50 = false;
        let reached90 = false;
        const shouldAutoplay = localStorage.getItem('autoplayNextVideo');

        if (shouldAutoplay === 'true') {
            localStorage.removeItem('autoplayNextVideo'); // clean up
            video.play().catch((error) => {
                console.log('Autoplay failed:', error);
            });
        }

        video.addEventListener('timeupdate', function () {
            const currentTime = video.currentTime;
            const duration = video.duration;

            if (!reached50 && currentTime >= duration * 0.99) {
                reached50 = true;
                // unlockNextVideoItem();
            }

            if (!reached90 && currentTime >= duration * 0.9) {
                reached90 = true;
                markCurrentVideoComplete(currentTime);
            }
        });

        // video.addEventListener('ended', function () {

        //     const currentItem = document.querySelector('.course-item-link.active')?.closest('.course-item');
        //     console.log(currentItem);
        //     const nextLink = currentItem?.querySelector('.course-item-link');
        //     console.log(nextLink);
        //     if (nextLink && !nextLink.classList.contains('disabled-link')) {
        //         const overlay = document.getElementById('countdown-overlay');
        //         const countdownText = document.getElementById('countdown-text');

        //         let countdown = 5;
        //         overlay.style.display = 'flex';
        //         countdownText.textContent = `Next video in ${countdown}`;
        //         const interval = setInterval(() => {
        //             countdown--;
        //             if (countdown > 0) {
        //                 countdownText.textContent = `Next video in ${countdown}`;
        //             } else {
        //                 clearInterval(interval);
        //                 localStorage.setItem('autoplayNextVideo', 'true');
        //                 window.location.href = nextLink.href;
        //             }
        //         }, 1000);
        //     }

        // });

        video.addEventListener('ended', function () {
            // const currentItem = document.querySelector('.course-item-link.active')?.closest('.course-item');
            // const allItems = Array.from(document.querySelectorAll('.course-item'));
            // const currentIndex = allItems.indexOf(currentItem);
            // const nextItem = allItems[currentIndex + 1];
            // const nextLink = nextItem?.querySelector('.course-item-link');

            const allLinks = Array.from(document.querySelectorAll('.course-item-link'));
            const currentLink = document.querySelector('.course-item-link.active');
            const currentIndex = allLinks.indexOf(currentLink);
            console.log(currentIndex);
            console.log(allLinks);
            const nextLink = allLinks[currentIndex + 1];
            console.log(nextLink);
            if (nextLink && !nextLink.classList.contains('disabled-link')) {
                const overlay = document.getElementById('countdown-overlay');
                const countdownText = document.getElementById('countdown-text');

                let countdown = 5;
                overlay.style.display = 'flex';
                countdownText.textContent = `Next video in ${countdown}`;
                const interval = setInterval(() => {
                    countdown--;
                    if (countdown > 0) {
                        countdownText.textContent = `Next video in ${countdown}`;
                    } else {
                        clearInterval(interval);
                        localStorage.setItem('autoplayNextVideo', 'true');
                        window.location.href = nextLink.href;
                    }
                }, 1000);
            } else {
                const overlay = document.getElementById('countdown-overlay');
                const countdownText = document.getElementById('countdown-text');
                let countdown = 5;
                overlay.style.display = 'flex';
                countdownText.textContent = `Please wait for certificate in ${countdown}`;
                const interval = setInterval(() => {
                    countdown--;
                    if (countdown > 0) {
                        countdownText.textContent = `Please wait for certificate in ${countdown}`;
                    } else {
                        clearInterval(interval);
                        countdownText.textContent = '';
                        checkCourseComplete();
                    }
                }, 1000);
            }


        });

        function unlockNextVideoItem() {
            const currentItem = document.querySelector('.course-item-link.active')?.closest('.course-item');
            const nextItem = currentItem?.nextElementSibling;

            if (nextItem) {
                // 🔓 Remove lock icon from next video
                const statusSpan = nextItem.querySelector('.course-item-status');
                const lockIcon = statusSpan?.querySelector('img[src*="lock.svg"]');
                if (lockIcon) lockIcon.style.display = 'none';

                // 👇 Update active class
                const currentLink = currentItem.querySelector('.course-item-link');
                const nextLink = nextItem.querySelector('.course-item-link');

                currentLink?.classList.remove('active');
                nextLink?.classList.add('active');
            }
        }

        function markCurrentVideoComplete(time) {
            const currentItem = document.querySelector('.course-item-link.active')?.closest('.course-item');
            const statusSpan = currentItem?.querySelector('.course-item-status');

            if (statusSpan) {
                const lockIcon = statusSpan.querySelector('img[src*="lock.svg"]');
                if (lockIcon) lockIcon.remove(); // remove 🔒 icon

                // ✅ Add check icon if not already present
                if (!statusSpan.querySelector('img[src*="true.svg"]')) {
                    const checkIcon = document.createElement('img');
                    checkIcon.src = "{{ asset('assets/lesson/img/icons/true.svg')}}";
                    checkIcon.alt = 'icon';
                    checkIcon.style.width = '1rem';
                    statusSpan.appendChild(checkIcon);
                }
            }
            updateMaterialProgress(video.currentTime);
        }
    } else {
        console.log('no');
    }
    
    function checkCourseComplete()
    {
        $.ajax({
            url: '/course-data/check-complete-course',
            type: 'POST',
            data: {
                course_id: "{{ $courseDetail->id }}",
                instructor_id: "{{ $courseDetail->instructor_id }}",
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response){
                if(response.status == 'completed'){
                     Swal.fire({
                        title: 'Course Completed!',
                        text: 'Do you want to view your certificate?',
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        console.log(result);
                        if (result.value) {
                            // OK pressed
                            console.log('User confirmed');
                            // Example: Redirect or show certificate
                            // window.location.href = "/certificate/print?course_id={{ $courseDetail->id }}";
                            window.location.href = "{{ url('/student-dashboard') }}";
                        } else {
                            // Cancel pressed
                            console.log('User canceled');
                        }
                    });
                } else {

                }
            },
            error: function(xhr){
                console.log(xhr.responseJSON);
            }
        });
    }

    function updateMaterialProgress(time)
    {
        $.ajax({
            url: '/material_video/progress',
            type: 'POST',
            data: {
                material_id: "{{ $materialDetail->id }}",
                watched_seconds: parseInt(time)
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
            },
            error: function(xhr){
                console.log(xhr.responseJSON);
            }
        });
    }  

    $('#markCompletedBtn').click(function () {
        $("#markCompleted").hide(); // Hide Mark as Completed button
        $('#goNextItem1').show(); // Show Next Item button
        updateMaterialProgress(0);
    });

    $('.goNextItem').click(function () {
        const allLinks = Array.from(document.querySelectorAll('.course-item-link'));
        const currentLink = document.querySelector('.course-item-link.active');
        const currentIndex = allLinks.indexOf(currentLink);
        console.log(currentIndex);
        console.log(allLinks);
        const nextLink = allLinks[currentIndex + 1];
        console.log(nextLink);
        if (nextLink && !nextLink.classList.contains('disabled-link')) {
            window.location.href = nextLink.href;
        } else {
            checkCourseComplete();
        }
    });
});

</script>
@endsection

