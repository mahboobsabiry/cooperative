<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreEmployeeRequest extends FormRequest
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
            'photo'         => 'nullable|image|mimes:jpg,png,jfif',
            'position'      => 'required|min:3|max:64',
            'name'          => 'required|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'emp_code'      => 'nullable|unique:employees,emp_code',
            'nid_number'    => 'required|unique:employees,nid_number',
            'birth_date'    => 'required',
            'phone'         => 'nullable|unique:employees,phone',
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email',
            'address'       => 'required|min:3|max:255',
            'info'          => 'nullable',
        ];
    }
}
