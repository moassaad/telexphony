<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AccountContactRequest extends FormRequest
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
            'phone_number'  => ['required',Rule::unique('user','phone_number')->ignore(Auth::user()->UserID, 'UserID'),'string','min:6','max:20',],
            'email'         => ['required','email',Rule::unique('user','email')->ignore(Auth::user()->UserID, 'UserID'),'min:5','max:255',],
        ];
    }
}
