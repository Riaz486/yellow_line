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
        Schema::create('career_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobID'); // Must match the careers table id type
            $table->string('meta_key');
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_value');
            $table->timestamps();

            $table->foreign('jobID')->references('id')->on('careers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_meta');
    }
};
