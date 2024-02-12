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
        Schema::create('underemployees', function (Blueprint $table) {
            $table->id();
            $table->string('UnderName1',100);
            $table->string('Designation1',100);
            $table->string('Commission1',50);
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
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
        Schema::dropIfExists('underemployees');
    }
};
