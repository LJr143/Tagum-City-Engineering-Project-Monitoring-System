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
        Schema::create('direct_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pow_id')->constrained('program_of_works')->onDelete('cascade');
            $table->string('description');
            $table->decimal('amount', 15, 2);
            $table->double('spent_cost')->default(0);
            $table->double('remaining_cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_costs');
    }
};
