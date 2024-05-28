<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'full_name'     => ['required','string','min:6','max:64',],
            'username'      => ['required','unique:user','string','min:6','max:64',],
            'country'       => ['required','integer','min:1',],
            'state'         => ['required','integer','min:1',],
            'city'          => ['required','integer','min:1',],
            'address'       => ['required','string','min:2','max:255',],
            'phone_number'  => ['required','string','min:6','max:20',],
            'email'         => ['required','email','unique:user','min:5','max:255',],
            'password'      => ['required','string','min:8','max:64',],
            're_password'   => ['required','string','min:8','max:64',],
            'submit'        => ['required','string',],
        ];
    }
}
