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
            // 'document'      => 'nullable|image|mimes:jpg,png,jfif',
            'start_job'     => 'required',
            'name'          => 'required|min:3|max:64',
            'position_code' => 'required|min:3|max:4|unique:employees,position_code',
            'last_name'     => 'nullable|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'emp_number'    => 'nullable|unique:employees,emp_number',
            'appointment_number'    => 'required',
            'appointment_date'      => 'nullable',
            'last_duty'     => 'nullable',
            'birth_year'    => 'required',
            'education'     => 'nullable',
            'prr_npr'       => 'required',
            'prr_date'      => 'nullable',
            'phone'         => 'nullable|unique:employees,phone',
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email',
            'main_province'     => 'required|min:3|max:64',
            'main_district'     => 'required|min:3|max:64',
            'current_province'  => 'required|min:3|max:64',
            'current_district'  => 'required|min:3|max:64',
            'introducer'        => 'nullable|min:3|max:64',
            'info'              => 'nullable',
        ];
    }
}
