<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'sometimes|nullable|email',
            'phone' => ['required','unique:offices','not_regex:/^(000|00|012|011|1-9|)/'],
            'status' => 'integer|required',
            'type' => 'integer|required',
            'address' => 'sometimes|nullable|max:255',
            'description' => 'sometimes|nullable|max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Phone Number required',
            'phone.unique' => 'Phone Number already exist',
            'phone.not_regex' => '00, 000, 012, 011, Are not valide prefix phone number',
            'phone.numeric' => 'Pleser insert valid Phone Number',
        ];
    }
}
