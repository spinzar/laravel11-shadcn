<?php

namespace App\Http\Requests\Contact\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Assuming that any authenticated user can create a contact.
        // Customize this logic if you want different authorization rules.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'company_id' => 'nullable|integer|exists:companies,id', // Relating contact to an existing company
        ];
    }

    /**
     * Customize the error messages for validation failures.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.max' => 'The phone number must not exceed 15 characters.',
            'company_id.exists' => 'The selected company is invalid.',
        ];
    }
}