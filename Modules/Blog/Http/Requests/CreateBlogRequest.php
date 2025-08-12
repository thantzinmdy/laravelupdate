<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'blog_category_id' => 'required',
            'author_name' => 'required',
            'title' => 'required',
            'content' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=850,height=500'
            'image' => 'required'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create blog');
    }
}
