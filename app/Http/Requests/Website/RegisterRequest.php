<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'birth_date' => 'nullable|date',
            'last_donation_date' => 'nullable|date',
            'phone' => 'required|string|max:20|unique:users',
            'blood_type_id' => 'nullable|exists:blood_types,id',
            'city_id' => 'nullable|exists:cities,id',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
