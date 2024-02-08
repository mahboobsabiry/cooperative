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
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('good_name');
            $table->bigInteger('assurance_total');
            $table->string('inquiry_number'); // استعلام
            $table->date('inquiry_date');
            $table->bigInteger('bank_tt_number')->nullable(); // نمبر آویز بانکی
            $table->date('bank_tt_date')->nullable(); // تاریخ آویز بانکی
            $table->date('expire_date')->nullable(); // تاریخ ختم تضمین
            $table->tinyInteger('status')->default(0);
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};
