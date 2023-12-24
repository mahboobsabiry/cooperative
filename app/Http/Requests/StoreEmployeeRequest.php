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
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'photo'     => [
                'image',
                'mimes:jpg,png,jfif'
            ],
            'name'     => [
                'required',
            ],
            'last_name'     => [
                'nullable',
            ],
            'father_name'     => [
                'required',
            ],
            'grand_f_name'     => [
                'required',
            ],
            'p2number'     => [
                'required',
                'unique:employees,p2number'
            ],
            'emp_number'     => [
                'required',
                'unique:employees,emp_number'
            ],
            'dob'     => [
                'required',
            ],
            'phone'    => [
                'required',
                'min:8',
                'max:15',
                'unique:employees,phone'
            ],
            'phone2'    => [
                'nullable',
                'min:8',
                'max:15'
            ],
            'email'    => [
                'required',
                'min:10',
                'max:64',
                'unique:employees,email'
            ],
            'province' => [
                'required',
                'min:3',
                'max:124'
            ],
            'main_position' => [
                'nullable',
                'min:3',
                'max:224'
            ],
            'info'  => [
                'nullable'
            ]
        ];
    }
}
