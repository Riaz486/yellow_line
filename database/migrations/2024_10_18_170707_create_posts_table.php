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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('categoryID');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('shares')->default(0);
            $table->boolean('status')->default(1); // 1 for active, 0 for inactive
            $table->string('slug')->unique();
            $table->date('event_date'); 
            $table->unsignedInteger('featured')->default(0);
            $table->unsignedInteger('no_of_days')->default(0);
            $table->string('postType');
            $table->timestamps();
    
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
