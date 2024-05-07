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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('normal'); // عاجل - محرم - عادی
            $table->string('subject'); // موضوع
            $table->string('doc_type')->default('document'); // نوع مکتوب - پیشنهاد - درخواستی - مکتوب
            $table->string('doc_number'); // نمبر مکتوب
            $table->string('doc_date'); // تاریخ مکتوب
            $table->integer('appendices')->default(0); // ضمایم
            $table->string('transaction_type');
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
