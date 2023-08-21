<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileVerificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'mobile' => 'required|phone:US,IN'
        ];
    }
    public function messages(): array
    {
        return [
            'mobile.phone' => 'Mobile number should belong to US or IN like 1-541-754-3010 or +919876512345'
        ];
    }
}