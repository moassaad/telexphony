<?php

namespace App\Http\Requests\Phone;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReportPhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'phone_name'     => ['required','string','min:6','max:64',],
            'model'          => ['required','string','min:6','max:64',],
            'status'         => ['required','integer','between:1,3',],
            'imei'           => ['required','unique:phone,imei','unique:phone,imei2','digits:15','min:15','max:15',],
            'imei2'          => ['nullable','digits:15','unique:phone,imei','unique:phone,imei2','min:15','max:15',],
            'serial_number'  => ['required','string','min:6','max:255',],
            'report_text'    => ['required','string','min:6','max:255',],
        ];
    }
}
