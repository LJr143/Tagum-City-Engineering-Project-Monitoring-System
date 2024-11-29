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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pow_id')->constrained('program_of_works')->onDelete('cascade');
            $table->string('purchase_order_number');
            $table->string('supplier');
            $table->foreignId('item_no')->constrained('materials')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('unit_cost');
            $table->double('total_cost');
            $table->string('file_name')->default(' ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
