<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('agent_mgmt'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo'     => 'nullable|image|mimes:jpg,png,jfif',
            'name'      => 'required|min:3|max:128',
            'phone'     => 'required|min:8|max:15|unique:agents,phone',
            'phone2'    => 'nullable|min:8|max:15',
            'address'   => 'nullable|min:3|max:128',
            'info'      => 'nullable'
        ];
    }
}
