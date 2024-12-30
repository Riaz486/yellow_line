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
        Schema::create('operating_routes_stops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RouteID');
            $table->unsignedBigInteger('busID');
            $table->string('stopName');
            $table->text('address');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();

            $table->foreign('RouteID')->references('id')->on('operating_routes')->onDelete('cascade');
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
        Schema::dropIfExists('operating_routes_stops');
    }
};
