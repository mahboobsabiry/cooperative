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
        Schema::create('agent_colleagues', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('info')->nullable();

            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('doc_number')->nullable();
            $table->text('background')->nullable();
            $table->string('signature')->nullable();

            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_colleagues');
    }
};
