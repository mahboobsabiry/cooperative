<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class COALRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('asycuda_mgmt'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'company_name'  => 'required|unique:coal,company_name',
            'company_tin'   => 'required|unique:coal,company_tin',
            'license_number'=> 'required|unique:coal,license_number',
            'export_date'   => 'required',
            'expire_date'   => 'required',
            'owner_name'    => 'required|min:3|max:128',
            'owner_phone'   => 'required|min:8|max:15|unique:coal,owner_phone',
            'phone'         => 'required|min:8|max:15|unique:coal,phone',
            'address'       => 'required|min:3|max:255',
            'info'          => 'nullable'
        ];
    }
}
