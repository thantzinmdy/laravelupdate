<?php

namespace Modules\BlogCategory\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\BlogCategory\Repositories\BlogCategoryRepository;
use Modules\BlogCategory\Http\Requests\ManageBlogCategoryRequest;

class BlogCategoryTableController extends Controller
{
    /**
     * @var BlogCategoryRepository
     */
    protected $blogcategory;

    /**
     * @param BlogCategoryRepository $blogcategory
     */
    public function __construct(BlogCategoryRepository $blogcategory)
    {
        $this->blogcategory = $blogcategory;
    }

    /**
     * @param ManageBlogCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBlogCategoryRequest $request)
    {
        return DataTables::of($this->blogcategory->getForDataTable())
            ->addColumn('actions', function ($blogcategory) {
                return $blogcategory->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
