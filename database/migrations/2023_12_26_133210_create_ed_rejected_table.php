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
        Schema::create('ed_rejected', function (Blueprint $table) {
            $table->id();
            $table->string('c_name'); // Company Name
            $table->string('good_name'); // Good Name
            $table->string('vp_number'); // Vehicle Plate Number
            $table->string('vpt_number'); // Vehicle Plate Trailer Number
            $table->text('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ed_rejected');
    }
};
