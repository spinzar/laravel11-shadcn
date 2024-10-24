<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Example: Only allow an admin or the user themselves to delete the account
        // Adjust this based on your authorization logic
        return $this->user()->isAdmin() || $this->user()->id === $this->route('user')->id;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // In most cases, no additional validation is needed for a delete request.
        return [];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'unauthorized' => 'You are not authorized to delete this user.',
        ];
    }
}