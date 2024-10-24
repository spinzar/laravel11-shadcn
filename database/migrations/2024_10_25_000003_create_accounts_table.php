<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the account
            $table->text('description')->nullable(); // Description of the account (optional)
            $table->string('email')->unique(); // Email associated with the account
            $table->string('phone')->nullable(); // Phone number associated with the account (optional)
            $table->string('address')->nullable(); // Address of the account (optional)
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
        Schema::dropIfExists('accounts');
    }
}