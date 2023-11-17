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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('part_number', 50);
            $table->string('name', 50);
            $table->string('material', 50)->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->foreignId('type_id')->constrained();
            $table->integer('is_featured');
            $table->integer('is_best_seller');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
