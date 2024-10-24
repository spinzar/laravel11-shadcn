<?php

namespace App\Http\Requests\Company\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Assuming that any authenticated user can create a company.
        // Adjust this logic according to your authorization needs.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ];
    }

    /**
     * Customize the error messages for validation failures.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The company name is required.',
            'name.max' => 'The company name must not exceed 255 characters.',
            'email.email' => 'Please provide a valid email address.',
            'phone.max' => 'The phone number must not exceed 15 characters.',
        ];
    }
}
