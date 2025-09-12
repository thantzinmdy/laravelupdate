<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Client\Enums\TMTypes;
use App\Enums\Table;

class CreateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'main_code' => 'nullable|string|max:255',
            'sub_code' => 'nullable|string|max:255',
            'filling_date' => 'required|date',
            'trademark_name' => 'nullable|string|max:255',
            'owner_id' => 'required|integer|exists:' . Table::OWNER . ',id',
            'tm_types' => 'nullable|in:' . implode(',', TMTypes::getValues()),
            'class' => 'nullable|string|max:255',
            'application_number' => 'required|string|max:255',
            'owner_address' => 'nullable|string',
            'owner_phone' => 'nullable|string|max:255',
            'agent_name' => 'required|string|max:255',
            'local_mark' => 'required|in:Yes,No',
            'foreign_mark' => 'required|in:Yes,No',
            'remark' => 'nullable|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create client');
    }
}
