<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Course\Repositories\CourseRepository;
use Modules\CourseCategory\Repositories\CourseCategoryRepository;
use Modules\Material\Repositories\MaterialRepository;
use Modules\Enrollment\Repositories\EnrollmentRepository;
use Modules\Material\Entities\Material;
use Modules\Material\Entities\MaterialStudentProgress;
use Modules\Achievement\Entities\Achievement;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @var CourseCategoryRepository
     * @var CategoryRepository
     */
    protected $coursecategory;
    protected $course;
    protected $material;
    protected $enrollment;

    /**
     * @param CourseCategoryRepository $coursecategory
     */
    public function __construct(CourseCategoryRepository $coursecategory, CourseRepository $course, MaterialRepository $material, EnrollmentRepository $enrollment)
    {
        $this->coursecategory = $coursecategory;
        $this->course = $course;
        $this->material = $material;
        $this->enrollment = $enrollment;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courseData = $this->coursecategory->getCategoryWithCourseData();
        return view('frontend.index', compact('courseData'));
    }
}
