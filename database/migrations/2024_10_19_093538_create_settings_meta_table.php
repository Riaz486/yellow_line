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
        Schema::create('settings_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postID'); // Link to posts table
            $table->string('meta_key'); // Key for the meta data
            $table->text('meta_value'); // Value for the meta data
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
        Schema::dropIfExists('settings_meta');
    }
};
