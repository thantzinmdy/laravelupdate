<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\BlogCategory\Entities\BlogCategory;
use Modules\Blog\Entities\BlogImage;
use App\Enums\Table;
use Carbon\Carbon;

class Blog extends Model
{
    use SoftDeletes,Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::BLOG;

    protected $fillable = ["id","blog_category_id","user_id","author_name","slug","title","content","image","priority","view_count","is_active"];

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->hasOne(BlogCategory::class,'id','blog_category_id');
    }

    /**
     * @return mixed
     */
    public function blogImage()
    {
        return $this->hasMany(BlogImage::class,'blog_id','id');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
    	if(auth()->user()->can('view blog')){
        	return '<a href="'.route('admin.blog.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
        }
       	return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
    	if(auth()->user()->can('edit blog')){
        	return '<a href="'.route('admin.blog.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
       	return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('delete blog')) {
            return '<a href="'.route('admin.blog.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger"><i class="fas fa-trash"></i></a> ';
        }

        return '';
    }

    public function getUploadButtonAttribute()
    {
        if(auth()->user()->can('view blog')){
            return '<a href="'.route('admin.blog.image_upload', $this).'" class="btn btn-info"><i class="fa fa-upload" data-toggle="tooltip" data-placement="top" title="Upload Image"></i></a> ';
        }
        return '';
    }

    public function getStatusLabelAttribute()
    {
        if ($this->is_active == 1) {
            return '<span class="badge badge-success">active</span>';
        }

        return "<span class='badge badge-danger'>".__('labels.general.inactive').'</span>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getUploadButtonAttribute().$this->getShowButtonAttribute().$this->getEditButtonAttribute().$this->getDeleteButtonAttribute();
    }
}
