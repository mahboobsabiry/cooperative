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
            $table->boolean('gender')->default(1);
            $table->string('emp_number');
            $table->string('appointment_number');
            $table->date('appointment_date');
            $table->string('last_duty')->default('جدیدالشمول');
            $table->bigInteger('birth_year');
            $table->string('education')->nullable();
            $table->enum('prr_npr', ['PRR', 'NPR']);
            $table->date('prr_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('main_province');
            $table->string('current_province');
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
