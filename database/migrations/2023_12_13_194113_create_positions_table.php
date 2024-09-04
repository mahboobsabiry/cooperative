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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('place_id');
            $table->string('title');
            $table->bigInteger('position_number');
            $table->bigInteger('num_of_pos')->default(1);
            $table->text('desc')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
