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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index(); // product_masters.id
            $table->string('attribute');
            $table->string('value_1')->nullable();
            $table->string('value_2')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
