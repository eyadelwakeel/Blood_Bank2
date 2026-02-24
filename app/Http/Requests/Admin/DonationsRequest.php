<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DonationsRequest extends FormRequest
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
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:255',
            'hospital_name' => 'required|string|max:255',
            'bags_number' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            
        ];
    }
}
