<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogImage;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogRepository.
 */
class BlogRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    public function getActiveAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->where('is_active',1)
            ->orderBy($orderBy, $sort)
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model
            ->select('*');
    }

    public function uploadImage($id, array $input)
    {
        $blogImage = new BlogImage;
        $blogImage->blog_id = $id;
        $name=uniqid('blogimage-').'.'.$input['file']->extension();
        $blogImage->file = \Storage::disk('uploads')->putFileAs('blogimage', $input['file'],$name);;
        $blogImage->save();

        return true;
    }

    public function deleteUploadedImage($id, array $input)
    {
        $file = BlogImage::find($id)->file;
        \Storage::disk('uploads')->delete($file);
        return BlogImage::find($id)->delete();
    }

    public function getUploadedImage(int $id)
    {
        return BlogImage::where('blog_id',$id)->get();
    }
}
