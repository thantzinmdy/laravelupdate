<!-- Modal -->
<div class="modal courses-modal" id="courses" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-i8-plus bg-body pr-0">
                        <div class="py-16pt pl-16pt menu">
                            <ul class="nav flex-column">
                                @foreach($courseData as $index => $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}" href="#courses-{{ $category->id }}" data-toggle="tab">
                                            {{ $category->category_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-i8-plus-auto tab-content">
                        @foreach($courseData as $index => $category)
                            <div id="courses-{{ $category->id }}" class="tab-pane {{ $index === 0 ? 'show active' : '' }}">
                                <div class="row no-gutters">
                                    @php
                                        $limitedCourses = $category->courses->take(14);
                                        $chunks = $limitedCourses->chunk(7);
                                    @endphp

                                    @foreach($chunks as $chunkIndex => $chunk)
                                        <div class="col-md-6 p-0">
                                            <div class="p-24pt d-flex h-100 flex-column">
                                                <div class="flex">
                                                    @if ($chunkIndex === 0)
                                                    <h5 class="text-black-100">Courses</h5>
                                                    @else
                                                    <div style="height: 40px;"></div>
                                                    @endif
                                                    <ul class="nav flex-column mb-24pt">
                                                        @foreach($chunk as $course)
                                                            <li class="nav-item">
                                                                <a class="nav-link px-0" href="{{ route('frontend.library', ['course' => $course->id]) }}">
                                                                    {{ $course->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @if ($chunkIndex === 0)
                                                <div>
                                                    <a href="{{ route('frontend.library') }}" class="btn btn-block text-center btn-secondary">Library</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>