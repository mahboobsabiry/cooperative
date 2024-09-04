<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_id');
            $table->integer('number');
            $table->char('section')->nullable();
            $table->integer('capacity')->default(5);
            $table->tinyInteger('status')->default(1);
            $table->text('info')->nullable();
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};
