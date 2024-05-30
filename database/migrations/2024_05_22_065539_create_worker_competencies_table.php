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
        Schema::create('worker_competencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id');
            $table->foreignId('competency_id');
            $table->string('certification_institute');
            $table->timestamp('effective_date')->useCurrent();
            $table->timestamp('expiration_date')->useCurrent();
            $table->string('update_status');
            $table->string('verification_status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_competencies');
    }
};
