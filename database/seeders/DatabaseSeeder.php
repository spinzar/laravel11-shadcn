<?php
// Database\Seeders\DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // Add this import to fix the undefined 'Str' error

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the main account
        $account = Account::create(['name' => 'Acme Corporation']);

        // Generate a temporary password
        $temporaryPassword = 'Temp' . Str::random(8); // Now 'Str' is properly imported and used

        // Create a main user for the account with the temporary password
        $user = User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make($temporaryPassword), // Store the hashed temporary password
            'owner' => true,
        ]);

        // Log the temporary password for development use
        Log::info("Temporary Password for User {$user->email}: {$temporaryPassword}");

        // Output the credentials to the console
        $this->command->info("Temporary password for johndoe@example.com: {$temporaryPassword}");

        // Simulate user auto-login using Auth::login
        Auth::login($user);
        $this->command->info("User johndoe@example.com is now logged in.");

        // Create additional users for the account
        User::factory(5)->create(['account_id' => $account->id]);

        // Create 100 companies under the same account
        $companies = Company::factory(100)
            ->create(['account_id' => $account->id]);

        // Create 100 contacts, linking them to random companies from the list
        Contact::factory(100)
            ->create(['account_id' => $account->id])
            ->each(function ($contact) use ($companies) {
                $contact->update(['company_id' => $companies->random()->id]);
            });
    }
}