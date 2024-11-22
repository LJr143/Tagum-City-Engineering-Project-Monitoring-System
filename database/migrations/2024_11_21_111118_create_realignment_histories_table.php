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
        Schema::create('realignment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pow_id');
            $table->unsignedBigInteger('source_item_id');
            $table->string('source_type');
            $table->unsignedBigInteger('destination_item_id');
            $table->string('destination_type');
            $table->decimal('amount', 15, 2);
            $table->unsignedBigInteger('realigned_by');
            $table->timestamps();

            $table->foreign('realigned_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pow_id')->references('id')->on('program_of_works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realignment_histories');
    }
};
