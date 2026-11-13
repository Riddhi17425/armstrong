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
        Schema::create('spare_part_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_code')->nullable()->unique(); // INQ-2026-0001
            $table->string('purpose_of_inquiry');
            $table->string('full_name');
            $table->string('mobile_number', 20);
            $table->string('email_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('inquiry_type', 50)->default('spare_part');
            $table->unsignedBigInteger('machine_id')->nullable()->index();
            $table->string('machine_name')->nullable();
            $table->unsignedBigInteger('part_id')->nullable()->index();
            $table->string('part_number')->nullable();
            $table->string('part_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_part_inquiries');
    }
};
