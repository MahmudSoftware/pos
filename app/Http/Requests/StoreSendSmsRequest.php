<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSendSmsRequest extends FormRequest
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
            'sms_id' => 'required|integer',
            'pass_book_number' => 'required',
            'center_id' => 'required|integer',
            'unit_id' => 'required|integer',
            'from' => 'required|date',
            'to' => 'required|date',
        ];
    }
}
