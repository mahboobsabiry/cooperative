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
            $table->string('type')->default('normal');
            $table->string('subject');
            $table->string('doc_type')->default('document');
            $table->string('doc_number');
            $table->string('doc_date');
            $table->integer('appendices')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->text('info')->nullable();
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
