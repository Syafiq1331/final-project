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
        Schema::create('lahan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('plantTime')->nullable()->default(null);
            $table->string('harvestTime')->nullable()->default(null);
            $table->foreignId('farm_place_id')->nullable()->constrained('farm_place')->nullOnDelete();
            $table->foreignId('jenisLahan_id')->nullable()->constrained('jenis_lahan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahan');
    }
};
