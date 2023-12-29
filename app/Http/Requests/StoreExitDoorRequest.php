<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreExitDoorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('exit_door'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'company_name'  => 'required|min:3|max:124',
            'vp_number'     => 'required|min:2|max:64',
            'vpt_number'    => 'nullable|min:2|max:64',
            'enex'          => 'nullable|unique:exit_type,enex',
            'good_name'     => 'nullable|min:3|max:248',
            'desc'          => 'nullable'
        ];
    }
}
