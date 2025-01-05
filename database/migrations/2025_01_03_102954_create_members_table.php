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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('position')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->double('deposit_amount')->default(0.0);
            $table->tinyInteger('status')->default(0);
            $table->text('info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
