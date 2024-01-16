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
            $table->bigInteger('hostel_id')->unsigned()->index()->nullable();
            $table->date('start_duty');
            $table->string('position_code')->unique();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('father_name');
            $table->boolean('gender')->default(1);
            $table->string('emp_number')->nullable()->unique();
            $table->string('appointment_number');
            $table->string('appointment_date');
            $table->string('last_duty')->default('جدیدالشمول');
            $table->bigInteger('birth_year');
            $table->string('education')->nullable();
            $table->enum('prr_npr', ['PRR', 'NPR'])->default('NPR');
            $table->string('prr_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('main_province');
            $table->string('main_district');
            $table->string('current_province');
            $table->string('current_district');
            $table->string('introducer')->nullable();
            $table->string('info')->nullable();
            $table->tinyInteger('on_duty')->default(0);
            $table->string('duty_position')->nullable();
            $table->longText('background')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hostel_id')->references('id')->on('hostels')->onUpdate('cascade')->onDelete('cascade');
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
