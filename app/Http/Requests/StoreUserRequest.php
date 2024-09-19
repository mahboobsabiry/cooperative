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
            'avatar'    => 'image|mimes:jpg,png',
            'name'      => 'required',
            'username'  => 'required|unique:users,username',
            'phone'     => 'nullable|min:8|max:15|unique:users,phone',
            'email'     => 'nullable|min:8|max:64|unique:users,email',
            'password'  => 'required|min:3|max:64',
            'roles.*'   => 'integer',
            'roles'     => 'nullable|array',
            'permissions.*'   => 'integer',
            'permissions'     => 'nullable|array',
            'info'      => 'nullable'
        ];
    }
}
