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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->string('photo');
            $table->string('name');
            $table->string('active_status');
            $table->string('gender');
            $table->string('phone');
            $table->string('education');
            $table->string('address');
            $table->string('employee_status');
            $table->string('departement');
            $table->string('ssw_status');
            $table->string('mcu_note');
            $table->string('supervisor_name');
            $table->timestamp('starting_date_work')->useCurrent();
            $table->timestamp('end_date_work')->useCurrent();
            $table->string('verified_sshe')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
