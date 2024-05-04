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
            'name'          => 'required|min:3|max:64',
            'username'      => 'nullable|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'birth_year'    => 'required',
            'education'     => 'nullable',
            'phone'         => 'nullable|unique:employees,phone',
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email',
            'main_address'      => 'required|min:3|max:64',
            'current_address'   => 'required|min:3|max:64',
            'info'              => 'nullable'
        ];
    }
}
