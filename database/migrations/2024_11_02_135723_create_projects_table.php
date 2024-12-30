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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('video_file')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('cta_heading');
            $table->string('cta_description');
            $table->string('cta_file');
            $table->string('banner_title');
            $table->text('banner_description');
            $table->text('map_iframe');
            $table->text('custom_css');
            $table->string('theme', 32);
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
