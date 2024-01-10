<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('user_mgmt'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'avatar'    => 'image|mimes:jpg,png',
            'name'      => 'required|min:2|max:64',
            'phone'     => "nullable|min:8|max:15|unique:users,phone,$this->id,id",
            'email'     => "nullable|min:8|max:128|unique:users,email,$this->id,id",
            'roles.*'   => 'integer',
            'roles'     => 'required|array',
            'info'      => 'nullable'
        ];
    }
}
