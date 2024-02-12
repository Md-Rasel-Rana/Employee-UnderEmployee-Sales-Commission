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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('saleprice');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('underemployee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->cascadeOnUpdate()
            ->restrictOnDelete();
            $table->foreign('underemployee_id')->references('id')->on('underemployees')
            ->cascadeOnUpdate()
            ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
