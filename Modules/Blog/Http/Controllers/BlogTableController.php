<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Blog\Repositories\BlogRepository;
use Modules\Blog\Http\Requests\ManageBlogRequest;

class BlogTableController extends Controller
{
    /**
     * @var BlogRepository
     */
    protected $blog;

    /**
     * @param BlogRepository $blog
     */
    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @param ManageBlogRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBlogRequest $request)
    {
        return DataTables::of($this->blog->getForDataTable())
            ->addColumn('actions', function ($blog) {
                return $blog->action_buttons;
            })
            ->addColumn('status', function ($blog) {
                return $blog->status_label;
            })
            ->rawColumns(['actions','status'])
            ->make(true);
    }
}
