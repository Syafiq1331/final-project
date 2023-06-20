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
        Schema::create('macro_automation', function (Blueprint $table) {
            $table->id();
            $table->string('time_start');
            $table->string('time_end');
            $table->string('device_id')->nullable()->default(null);
            $table->foreignId('lahan_id')->nullable()->constrained('lahan')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macro_automation');
    }
};
