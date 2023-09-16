<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCenterRequest extends FormRequest
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
            // 'name' => 'unique:table,column,except,id'
            'name' => 'required|max:255|unique:centers,name,' . $this->center->id,
            'status' => 'required|boolean',
            'address' => 'required|string',
            'cart_price' => 'required',
        ];
    }
}
