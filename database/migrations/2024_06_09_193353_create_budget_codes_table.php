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
        Schema::create('budget_codes', function (Blueprint $table) {
            $table->bigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('code')->unique();
            $table->bigInteger('budget');
            $table->string('month');
            $table->string('payment');
            $table->string('m16number');
            $table->string('remittance'); // Hawala
            $table->string('remittance_date'); // Hawala Date
            $table->string('scan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_codes');
    }
};
