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
        Schema::create('procurement', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('categoryID');
            $table->string('proposalRequestID');
            $table->string('city');
            $table->string('department');
            $table->string('date_publication');
            $table->string('date_closing');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('shares')->default(0);
            $table->unsignedInteger('featured')->default(0);
            $table->unsignedInteger('no_of_days')->default(0);
            $table->string('slug');
            $table->timestamps();

            $table->foreign('categoryID')->references('id')->on('procurement_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurement');
    }
};
