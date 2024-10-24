<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // Foreign key to accounts table
            $table->string('name'); // Name of the company
            $table->string('email')->nullable(); // Optional email address for the company
            $table->string('phone')->nullable(); // Optional phone number for the company
            $table->string('address')->nullable(); // Optional address for the company
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
        Schema::dropIfExists('companies');
    }
}