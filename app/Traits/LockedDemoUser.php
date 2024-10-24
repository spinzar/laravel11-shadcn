<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait LockedDemoUser
{
    /**
     * Check if the current user is a demo user.
     *
     * @return bool
     */
    public function isDemoUser(): bool
    {
        // Assuming demo user email is 'demo@example.com' (adjust this as needed)
        return $this->email === 'demo@example.com';
    }

    /**
     * Prevent modifications on a demo user.
     *
     * @return void
     */
    public function preventDemoUserModification(): void
    {
        if ($this->isDemoUser()) {
            throw new HttpResponseException(response()->json([
                'message' => 'This action is not allowed on a demo user.'
            ], 403));
        }
    }
}