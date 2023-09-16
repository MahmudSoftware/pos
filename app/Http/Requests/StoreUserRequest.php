<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'min:11','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['sometimes', 'nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'office_id' => ['required'],
        ];
    }
}
