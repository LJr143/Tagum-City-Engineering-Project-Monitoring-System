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
        Schema::create('swa_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pow_id')->constrained('program_of_works')->onDelete('cascade');
            $table->string('item_no');
            $table->string('description');
            $table->double('%_of_total');
            $table->double('quantity');
            $table->string('unit');
            $table->double('unit_cost');
            $table->double('total_cost');
            $table->double('prev_qty')->default(0);
            $table->string('prev_unit')->default('unit');
            $table->double('this_month_qty')->default(0);
            $table->string('this_month_unit')->default('unit');
            $table->double('to_date_qty')->default(0);
            $table->string('to_date_unit')->default('unit');
            $table->double('percent_accomplishment')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swa_reports');
    }
};
