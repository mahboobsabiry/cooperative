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
        Schema::create('ed_trex', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_tr'); // Is Transit?
            $table->string('c_name'); // Company Name
            $table->string('vp_number'); // Vehicle Plate Number
            $table->string('vpt_number'); // Vehicle Plate Trailer Number
            $table->string('good_name'); // Good Name
            $table->bigInteger('bx_total'); // Total Boxes || Plates
            $table->string('bx_total_tx'); // Total Boxes || Plates Text
            $table->bigInteger('weight'); // Goods Weight
            $table->bigInteger('enex')->unique(); // Enex Number
            $table->text('desc')->nullable();

            $table->boolean('is_returned')->default(0); // Is Vehicle Returned?
            $table->date('return_date')->nullable(); // Vehicle Return Date?
            $table->boolean('exit_again')->default(0); // Vehicle Exit Again
            $table->date('ea_date')->nullable(); // Vehicle Exit Again Date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ed_trex');
    }
};