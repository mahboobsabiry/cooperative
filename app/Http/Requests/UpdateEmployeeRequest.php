<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo'         => 'image|mimes:jpg,png,jfif',
            'name'          => 'required|min:3|max:64',
            'last_name'     => 'required|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'gender'        => 'required',
            'emp_number'    => "required|unique:employees,emp_number,$this->id,id",
            'appointment_number'    => "required|unique:employees,appointment_number,$this->id,id",
            'appointment_date'      => 'nullable',
            'last_duty'     => 'nullable',
            'birth_year'    => 'required',
            'education'     => 'nullable',
            'prr_npr'       => 'required',
            'prr_date'      => 'nullable',
            'phone'         => "nullable|unique:employees,phone,$this->id,id",
            'phone2'        => "nullable|unique:employees,phone2,$this->id,id",
            'email'         => "nullable|unique:employees,email,$this->id,id",
            'main_province'     => 'required|min:3|max:64',
            'current_province'  => 'required|min:3|max:64',
            'info'          => 'nullable',
        ];
    }
}
