<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Assuming that any authenticated user or admin can create a user.
        // Adjust this based on your authorization needs.
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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' ensures password confirmation is required
            'role' => 'nullable|string|in:admin,user,manager', // Optional, but must be one of the listed roles
            'photo' => 'nullable|image|max:2048', // Optional photo upload, max 2MB
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
            'email.required' => 'An email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'A password is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.in' => 'The selected role is invalid.',
            'photo.image' => 'The uploaded file must be an image.',
            'photo.max' => 'The photo may not be larger than 2MB.',
        ];
    }
}