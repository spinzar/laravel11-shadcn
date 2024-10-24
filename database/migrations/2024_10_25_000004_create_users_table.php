<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // Foreign key to accounts table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique(); // Email must be unique
            $table->string('password'); // Store hashed password
            $table->boolean('owner')->default(false); // Whether the user is an account owner
            $table->string('photo')->nullable(); // Optional photo
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->rememberToken(); // Token for "remember me" functionality
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
        Schema::dropIfExists('users');
    }
}