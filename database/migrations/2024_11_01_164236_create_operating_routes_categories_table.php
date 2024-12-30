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
        Schema::create('operating_routes_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('busID');
            $table->string('name');
            $table->text('file');

            $table->foreign('busID')->references('id')->on('manage_buses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_routes_categories');
    }
};
