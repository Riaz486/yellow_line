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
        Schema::create('projects_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectID'); // Link to posts table
            $table->string('meta_key'); // Key for the meta data
            $table->text('meta_value'); // Value for the meta data
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
        Schema::dropIfExists('projects_meta');
    }
};
