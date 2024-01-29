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
        // Companies Activity License
        Schema::create('coal', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->bigInteger('company_tin')->unique();
            $table->bigInteger('license_number')->unique();
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->date('export_date');
            $table->date('expire_date');
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('address');
            $table->tinyInteger('status')->default(1);
            $table->text('info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coal');
    }
};
