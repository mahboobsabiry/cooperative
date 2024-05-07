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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();

            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('doc_number')->nullable();
            $table->string('company_name')->nullable();
            $table->bigInteger('company_tin')->nullable();

            $table->date('from_date2')->nullable();
            $table->date('to_date2')->nullable();
            $table->string('doc_number2')->nullable();
            $table->string('company_name2')->nullable();
            $table->bigInteger('company_tin2')->nullable();

            $table->date('from_date3')->nullable();
            $table->date('to_date3')->nullable();
            $table->string('doc_number3')->nullable();
            $table->string('company_name3')->nullable();
            $table->bigInteger('company_tin3')->nullable();

            $table->text('background')->nullable();
            $table->text('info')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
