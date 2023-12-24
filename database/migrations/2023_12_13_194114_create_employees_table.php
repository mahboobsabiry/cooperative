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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('father_name');
            $table->string('grand_f_name');
            $table->string('p2number');
            $table->string('emp_number');
            $table->string('dob');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email')->unique();
            $table->string('province');
            $table->string('info')->nullable();
            $table->tinyInteger('on_duty')->default(0);
            $table->string('main_position')->nullable();
            $table->tinyInteger('is_responsible')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
