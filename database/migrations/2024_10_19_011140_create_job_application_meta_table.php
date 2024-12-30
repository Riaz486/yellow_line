<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_application_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicationID');
            $table->string('meta_key');
            $table->text('meta_value');
            $table->string('category');
            $table->timestamps();

            $table->foreign('applicationID')->references('id')->on('job_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_application_meta');
    }
};
