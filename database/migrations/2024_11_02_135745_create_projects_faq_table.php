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
        Schema::create('projects_faq', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectID');
            $table->string('question');
            $table->string('answer');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('projectID')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_faq');
    }
};
