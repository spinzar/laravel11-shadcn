<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // Foreign key to accounts table
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to companies table
            $table->string('first_name'); // Contact's first name
            $table->string('last_name'); // Contact's last name
            $table->string('email')->nullable(); // Optional email address
            $table->string('phone')->nullable(); // Optional phone number
            $table->string('address')->nullable(); // Optional address
            $table->string('city')->nullable(); // Optional city
            $table->string('region')->nullable(); // Optional region
            $table->string('country')->nullable(); // Optional country
            $table->string('postal_code')->nullable(); // Optional postal code
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}