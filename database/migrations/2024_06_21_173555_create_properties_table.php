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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('doc_number');
            $table->date('doc_date');
            $table->bigInteger('property_name');
            $table->bigInteger('property_code');
            $table->bigInteger('ts_code');
            $table->bigInteger('weight');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('status')->default(1);
            $table->text('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};