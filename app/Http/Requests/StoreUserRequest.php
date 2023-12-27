<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
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
            'avatar'     => [
                'image',
                'mimes:jpg,png'
            ],
            'name'     => [
                'required',
            ],
            'phone'    => [
                'nullable',
                'min:8',
                'max:15',
                'unique:users,phone'
            ],
            'email'    => [
                'required',
                'min:10',
                'max:64',
                'unique:users,email'
            ],
            'password' => [
                'required',
            ],
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
            'info'  => [
                'nullable'
            ]
        ];
    }
}
