<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesignationRequest extends FormRequest
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
            'name' => ['required','string','max:50','unique:designations','regex:/^[a-zA-Z]+$/u'],
            'office_id' => 'required',
            'status' => 'required|integer',
            'description' => 'sometimes|nullable|string|max:200'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Designation Name is required',
            'name.regex' => 'Please insert valide name',
            'name.unique' => 'Designation Name already been taken',
        ];
    }
}
