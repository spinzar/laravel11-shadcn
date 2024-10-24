<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection'); // The connection the job was attempted on
            $table->text('queue'); // The queue the job was pulled from
            $table->longText('payload'); // The serialized job data
            $table->longText('exception'); // The exception stack trace
            $table->timestamp('failed_at')->useCurrent(); // Timestamp when the job failed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}