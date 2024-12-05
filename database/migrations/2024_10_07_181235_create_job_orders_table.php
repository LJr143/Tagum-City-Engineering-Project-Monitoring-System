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
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pow_id');
            $table->foreign('pow_id')->references('id')->on('program_of_works')->onDelete('cascade');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->double('rate_per_date')->nullable();
            $table->date('job_order_from');
            $table->date('job_order_to');
            $table->double('amount');
            $table->double('balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_orders');
    }
};
