<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerRequest extends FormRequest
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
            'center_id' => 'required|integer|exists:centers,id',
            'unit_id' => 'required|integer|exists:units,id',
            'first_name' => 'required|string|max:255',
            'bn_first_name' => 'sometimes|nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'bn_last_name' => 'sometimes|nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'bn_father_name' => 'sometimes|nullable|string|max:255',
            'nid' => 'required|string|max:100|unique:farmers,nid,' . $this->farmer->id,
            'phone' => 'required|string|max:11|min:11|unique:farmers,phone,' . $this->farmer->id,
            'pass_book_number' => 'required|string|unique:farmers,pass_book_number,' . $this->farmer->id,
            'phone_status' => 'required|boolean',
            'status' => 'required|boolean',
            'is_loan' => 'required|boolean',
            'loan_amount' => 'sometimes|nullable',
            'remain_loan' => 'sometimes|nullable',
            'invested_loan_amount' => 'sometimes|nullable',
            'remain_cart' => 'sometimes|nullable',
            'total_cane' => 'sometimes|nullable',
            'supplied_cane' => 'sometimes|nullable',
            'supplied_cane_cart' => 'sometimes|nullable',
            'village' => 'sometimes|nullable',
        ];
    }
}
