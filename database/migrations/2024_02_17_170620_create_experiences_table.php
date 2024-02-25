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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('position');
            $table->boolean('position_type')->default(0);
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->string('doc_number');
            $table->string('document')->nullable();
            $table->tinyInteger('user_status')->default(0);
            $table->tinyInteger('asy_user_status')->default(0);
            $table->text('info')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
