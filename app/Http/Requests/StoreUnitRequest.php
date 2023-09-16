<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'office_id' => 'required|integer',
            'center_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'cic_name' => 'required|string|max:255',
            'cic_number' => 'required|string|max:11|unique:units',
            'cda_name' => 'required|string|max:255',
            'cda_number' => 'required|string|max:11|unique:units',
        ];
    }
}
