<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreAssuranceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('warehouse_assurance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'good_name'     => 'required|min:3|max:224',
            'assurance_total'   => 'required',
            'inquiry_number'    => 'required',
            'inquiry_date'      => 'required',
            'bank_tt_number'    => 'required',
            'bank_tt_date'      => 'required',
            'reason'            => 'nullable'
        ];
    }
}
