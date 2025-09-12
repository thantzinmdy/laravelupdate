<?php

namespace Modules\Owner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Table;

class UpdateOwnerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $owner = $this->route('owner');
        $ownerId = is_object($owner) ? $owner->id : $owner;
        
        return [
            'name' => 'required|string|max:255|unique:' . Table::OWNER . ',name,' . $ownerId,
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
        return auth()->user()->can('edit owner');
    }
}
