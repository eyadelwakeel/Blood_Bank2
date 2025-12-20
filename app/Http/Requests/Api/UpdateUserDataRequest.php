<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserDataRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name'               => 'sometimes|string',
            'email' => [
            'sometimes',
            'email',
            Rule::unique('users', 'email')->ignore($this->user()->id)],
            'blood_type_id' => 'sometimes|exists:blood_types,id',
            'birth_date'         => 'sometimes|date',
            'last_donation_date' => 'sometimes|date',
            'city_id' => 'sometimes|exists:cities,id',
            'phone'              => [
            'sometimes',
            Rule::unique('users', 'phone')->ignore($this->user()->id),
        ],
        ];

        if ($this->has('password')) {
            $rules['password'] = 'min:6|confirmed';
        }

        return $rules;
    }

}
