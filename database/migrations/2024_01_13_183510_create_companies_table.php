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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->unsigned()->index()->nullable();
            $table->string('name')->unique();
            $table->bigInteger('tin')->unique();
            $table->string('type');
            $table->string('activity_sector')->nullable();
            $table->string('address')->nullable();

            // Owner
            $table->string('owner_name')->nullable();
            $table->string('deputy_name')->nullable();
            $table->string('owner_id_number')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('owner_main_add')->nullable();
            $table->string('owner_cur_add')->nullable();

            // Default
            $table->text('background')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
