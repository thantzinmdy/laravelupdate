<?php

namespace Modules\Owner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Table;

class CreateOwnerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:' . Table::OWNER . ',name',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create owner');
    }
}
