<?php

namespace Modules\BlogCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\BlogCategory\Entities\BlogCategory;
use Modules\BlogCategory\Http\Requests\ManageBlogCategoryRequest;
use Modules\BlogCategory\Http\Requests\CreateBlogCategoryRequest;
use Modules\BlogCategory\Http\Requests\UpdateBlogCategoryRequest;
use Modules\BlogCategory\Http\Requests\ShowBlogCategoryRequest;
use Modules\BlogCategory\Repositories\BlogCategoryRepository;

class BlogCategoryController extends Controller
{
 /**
     * @var BlogCategoryRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blogcategory::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blogcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateBlogCategoryRequest $request)
    {
        $this->blogcategory->create($request->except('_token','_method'));
        return redirect()->route('admin.blogcategory.index')->withFlashSuccess(trans('blogcategory::alerts.backend.blogcategory.created'));
    }

    /**
     * @param BlogCategory              $blogcategory
     * @param ManageBlogCategoryRequest $request
     *
     * @return mixed
     */
    public function edit(BlogCategory $blogcategory, ManageBlogCategoryRequest $request)
    {
        return view('blogcategory::edit')
            ->withBlogCategory($blogcategory);
    }

    /**
     * @param BlogCategory              $blogcategory
     * @param UpdateBlogCategoryRequest $request
     *
     * @return mixed
     */
    public function update(BlogCategory $blogcategory, UpdateBlogCategoryRequest $request)
    {
        $this->blogcategory->updateById($blogcategory->id,$request->except('_token','_method'));

        return redirect()->route('admin.blogcategory.index')->withFlashSuccess(trans('blogcategory::alerts.backend.blogcategory.updated'));
    }

    /**
     * @param BlogCategory              $blogcategory
     * @param ManageBlogCategoryRequest $request
     *
     * @return mixed
     */
    public function show(BlogCategory $blogcategory, ShowBlogCategoryRequest $request)
    {
        return view('blogcategory::show')->withBlogCategory($blogcategory);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(BlogCategory $blogcategory)
    {
        $this->blogcategory->deleteById($blogcategory->id);

        return redirect()->route('admin.blogcategory.index')->withFlashSuccess(trans('blogcategory::alerts.backend.blogcategory.deleted'));
    }
}
