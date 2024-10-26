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
        Schema::create('recomendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicator_id')->constrained()->cascadeOnDelete();
            $table->foreignId('leveling_index_id')->constrained()->cascadeOnDelete();
            $table->foreignId('detail_leveling_index_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('recommend')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendations');
    }
};
