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
            $table->unsignedBigInteger('position_id');
            $table->string('receiver');
            $table->string('cc')->nullable();
            $table->string('type')->default('normal'); // عاجل - محرم - عادی
            $table->string('subject'); // موضوع
            $table->string('doc_type')->default('document'); // نوع مکتوب - پیشنهاد - درخواستی - مکتوب
            $table->string('doc_number');
            $table->string('doc_date');
            $table->integer('appendices')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->text('info')->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
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
