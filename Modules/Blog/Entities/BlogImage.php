<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Blog;
use App\Enums\Table;

class blogImage extends Model
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::BLOG_IMAGE;

    protected $fillable = ["id","blog_id","file"];

    /**
     * @return mixed
     */
    public function blog()
    {
        return $this->hasOne(Blog::class,'id','blog_id');
    }

}
