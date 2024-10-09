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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pow_id');
            $table->foreign('pow_id')->references('id')->on('program_of_works')->onDelete('cascade');
            $table->integer('item_no');
            $table->integer('quantity');
            $table->string('unit_of_issue');
            $table->text('item_description');
            $table->double('estimated_unit_cost');
            $table->double('estimated_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
