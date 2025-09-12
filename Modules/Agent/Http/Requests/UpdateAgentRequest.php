<?php

namespace Modules\Agent\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Table;

class UpdateAgentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $agent = $this->route('agent');
        $agentId = is_object($agent) ? $agent->id : $agent;
        
        return [
            'name' => 'required|string|max:255|unique:' . Table::AGENT . ',name,' . $agentId,
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
        return auth()->user()->can('edit agent');
    }
}
