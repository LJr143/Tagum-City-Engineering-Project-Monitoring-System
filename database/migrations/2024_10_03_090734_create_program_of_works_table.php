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
        Schema::create('program_of_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('reference_number');
            $table->string('description');
//            $table->date('start_date');
//            $table->date('end_date');
//            $table->unsignedBigInteger('engineer_id');
//            $table->foreign('engineer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('total_material_cost');
            $table->string('total_labor_cost');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_of_works');
    }
};
