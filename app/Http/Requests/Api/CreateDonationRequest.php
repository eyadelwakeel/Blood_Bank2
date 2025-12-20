<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'city_id' => ['required', 'exists:cities,id'],
            'phone' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'bags_number' => ['required', 'integer', 'min:1'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
