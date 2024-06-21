<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('office_employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'company_id'    => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required',
            'property_name' => 'required|min:3|max:148',
            'property_code' => 'required"numeric|max:9999999999',
            'ts_code'       => 'required|numeric|max:9999',
            'weight'        => 'required|numeric|min:11|max:99999999',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'info'          => 'nullable'
        ];
    }
}
