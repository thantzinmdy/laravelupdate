<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Blog\Entities\Blog;
use Modules\BlogCategory\Entities\BlogCategory;
use Modules\Blog\Http\Requests\ManageBlogRequest;
use Modules\Blog\Http\Requests\CreateBlogRequest;
use Modules\Blog\Http\Requests\UpdateBlogRequest;
use Modules\Blog\Http\Requests\ShowBlogRequest;
use Modules\Blog\Http\Requests\UploadBlogImageRequest;
use Modules\Blog\Repositories\BlogRepository;
use Modules\Blog\Enums\BlogCategoryType;

class BlogController extends Controller
{
 /**
     * @var BlogRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = BlogCategory::get();
        return view('blog::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateBlogRequest $request)
    {
        $request['is_active'] = $request->is_active ? $request->is_active : 0;
        $input = $request->except('_token','_method');
        $image = uniqid('blogimage-').'.'.$request->image->extension();

        $input['image'] = \Storage::disk('uploads')->putFileAs('blogimage', $request->file('image'),$image);
        $input['user_id'] = auth()->user()->id;
        $this->blog->create($input);
        return redirect()->route('admin.blog.index')->withFlashSuccess(trans('blog::alerts.backend.blog.created'));
    }

    /**
     * @param Blog              $blog
     * @param ManageBlogRequest $request
     *
     * @return mixed
     */
    public function edit(Blog $blog, ManageBlogRequest $request)
    {
        $categories = BlogCategory::get();;
        return view('blog::edit',compact('blog','categories'));
    }

    /**
     * @param Blog              $blog
     * @param UpdateBlogRequest $request
     *
     * @return mixed
     */
    public function update(Blog $blog, UpdateBlogRequest $request)
    {
        $request['is_active'] = $request->is_active ? $request->is_active : 0;
        $input = $request->except('_token','_method');
        if($request->image) {
            \File::delete('uploads/'.$blog->image);
            $image = uniqid('blogimage-').'.'.$request->image->extension();
            $input['image'] = \Storage::disk('uploads')->putFileAs('blogimage', $request->image,$image);
        }
        $input['user_id'] = auth()->user()->id;
        $this->blog->updateById($blog->id,$input);

        return redirect()->route('admin.blog.index')->withFlashSuccess(trans('blog::alerts.backend.blog.updated'));
    }

    /**
     * @param Blog              $blog
     * @param ManageBlogRequest $request
     *
     * @return mixed
     */
    public function show(Blog $blog, ShowBlogRequest $request)
    {
        return view('blog::show')->withBlog($blog);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Blog $blog)
    {
        $this->blog->deleteById($blog->id);

        return redirect()->route('admin.blog.index')->withFlashSuccess(trans('blog::alerts.backend.blog.deleted'));
    }

    public function imageUpload(Blog $blog)
    {   
        return view('blog::upload_image', compact('blog'));
    }

    public function imageUploadFile(UploadBlogImageRequest $request,$id)
    {
        $status = 200;
        switch ($request->method()){
            case 'POST' :
                $this->blog->uploadImage($id,$request->except('_token'));
                $status = 201;
                break;

            case 'DELETE' :
                $this->blog->deleteUploadedImage($id,$request->except('_token'));
                $status = 204;
                break;

            default:
                $blogImages = $this->blog->getUploadedImage($id);
                $count = 0 ;
                $obj = array();
                foreach ($blogImages as $file) {
                    $obj[$count]['id'] = $file->id;
                    $obj[$count]['name'] = 'File - '.$file->id;
                    $obj[$count]['file'] = url('uploads/'.$file->file);
                    $obj[$count]['size'] = \Storage::disk('uploads')->size($file->file);
                    $count++;
                }

                return response()->json($obj,$status);
                break;
        }

    }
}
